// Configura el calendario con la fecha actual
$(document).ready(function () {
    var date = new Date();
    var today = date.getDate();
    // Set click handlers for DOM elements
    $(".right-button").click({ date: date }, next_year);
    $(".left-button").click({ date: date }, prev_year);
    $(".month").click({ date: date }, month_click);
    $("#add-button").click({ date: date }, new_event);
    // Set current month as active
    $(".months-row").children().eq(date.getMonth()).addClass("active-month");
    init_calendar(date);
    var events = check_events(today, date.getMonth() + 1, date.getFullYear());
    show_events(events, months[date.getMonth()], today);
});

// Inicializa el calendario añadiendo las fechas HTML
function init_calendar(date) {
    $(".tbody").empty();
    $(".events-container").empty();
    var calendar_days = $(".tbody");
    var month = date.getMonth();
    var year = date.getFullYear();
    var day_count = days_in_month(month, year);
    var row = $("<tr class='table-row'></tr>");
    var today = date.getDate();

    // Establece la fecha en 1 para encontrar el primer día del mes
    date.setDate(1);
    var first_day = date.getDay();
    // 35+primer dia es el número de elementos de fecha que se agregarán a la tabla de fechas
    // 35 es de (7 días de la semana) * (hasta 5 filas de fechas en un mes)
    for (var i = 0; i < 35 + first_day; i++) {
        // Dado que algunos de los elementos estarán en blanco,
        // es necesario calcular la fecha real a partir del índice
        var day = i - first_day + 1;
        // Si es domingo, haz una nueva fila
        if (i % 7 === 0) {
            calendar_days.append(row);
            row = $("<tr class='table-row'></tr>");
        }
        // si el índice actual no es un día de este mes, déjalo en blanco
        if (i < first_day || day > day_count) {
            var curr_date = $("<td class='table-date nil'>" + "</td>");
            row.append(curr_date);
        }
        else {
            var curr_date = $("<td class='table-date'>" + day + "</td>");
            var events = check_events(day, month + 1, year);
            if (today === day && $(".active-date").length === 0) {
                curr_date.addClass("active-date");
                show_events(events, months[month], day);
            }
            // Si esta fecha tiene algún evento, le damos estilo con .event-date
            if (events.length !== 0) {
                curr_date.addClass("event-date");
            }
            // Establece el controlador onClick para hacer clic en una fecha
            curr_date.click({ events: events, month: months[month], day: day }, date_click);
            row.append(curr_date);
        }
    }
    // Agrega la última fila y establece el año actual
    calendar_days.append(row);
    $(".year").text(year);
}

// Obtener el número de días de un mes/año determinado
function days_in_month(month, year) {
    var monthStart = new Date(year, month, 1);
    var monthEnd = new Date(year, month + 1, 1);
    return (monthEnd - monthStart) / (1000 * 60 * 60 * 24);
}

// Manejador de eventos para cuando se hace clic en una fecha
function date_click(event) {
    $(".events-container").show(250);
    $("#dialog").hide(250);
    $(".active-date").removeClass("active-date");
    $(this).addClass("active-date");
    show_events(event.data.events, event.data.month, event.data.day);
};

// Manejador de eventos para cuando se hace clic en un mes
function month_click(event) {
    $(".events-container").show(250);
    $("#dialog").hide(250);
    var date = event.data.date;
    $(".active-month").removeClass("active-month");
    $(this).addClass("active-month");
    var new_month = $(".month").index(this);
    date.setMonth(new_month);
    init_calendar(date);
}

// Manejador de eventos para cuando se hace clic en el botón derecho del año
function next_year(event) {
    $("#dialog").hide(250);
    var date = event.data.date;
    var new_year = date.getFullYear() + 1;
    $("year").html(new_year);
    date.setFullYear(new_year);
    init_calendar(date);
}

// Manejador de eventos para cuando se hace clic en el botón izquierdo del año
function prev_year(event) {
    $("#dialog").hide(250);
    var date = event.data.date;
    var new_year = date.getFullYear() - 1;
    $("year").html(new_year);
    date.setFullYear(new_year);
    init_calendar(date);
}

// Controlador de eventos para hacer clic en el botón de nuevo evento
function new_event(event) {
    // si no se selecciona una fecha entonces no hagas nada
    if ($(".active-date").length === 0)
        return;
    // elimina la entrada de error roja al hacer clic
    $("input").click(function () {
        $(this).removeClass("error-input");
    })
    // vaciar entradas y ocultar eventos
    $("#dialog input[type=text]").val('');
    $("#dialog input[type=number]").val('');
    $(".events-container").hide(250);
    $("#dialog").show(250);
    // Manejador de eventos para el botón cancelar
    $("#cancel-button").click(function () {
        $("#name").removeClass("error-input");
        $("#count").removeClass("error-input");
        $("#dialog").hide(250);
        $(".events-container").show(250);
    });
    // Manejador de eventos para el botón Aceptar
    $("#ok-button").unbind().click({ date: event.data.date }, function () {
        var date = event.data.date;
        var name = $("#name").val().trim();
        var count = parseInt($("#count").val().trim());
        var day = parseInt($(".active-date").html());
        // Validación de formulario básico
        if (name.length === 0) {
            $("#name").addClass("error-input");
        }
        else if (isNaN(count)) {
            $("#count").addClass("error-input");
        }
        else {
            $("#dialog").hide(250);
            console.log("new event");
            new_event_json(name, count, date, day);
            date.setDate(day);
            init_calendar(date);
        }
    });
}

// Agrega un evento json a event_data
function new_event_json(name, count, date, day) {
    var event = {
        "occasion": name,
        "invited_count": count,
        "year": date.getFullYear(),
        "month": date.getMonth() + 1,
        "day": day
    };
    event_data["events"].push(event);
}

// Muestra todos los eventos de la fecha seleccionada en vistas de tarjetas
function show_events(events, month, day) {
    // Limpiar el contenedor de fechas
    $(".events-container").empty();
    $(".events-container").show(250);
    console.log(event_data["events"]);
    // Si no hay eventos para esta fecha, notifica al usuario
    if (events.length === 0) {
        var event_card = $("<div class='event-card'></div>");
        var event_name = $("<div class='event-name'>No hay tareas planeadas para el dia " + day + " " + 'de ' + " " + month + ".</div>");
        $(event_card).css({ "border-left": "10px solid #FF1744" });
        $(event_card).append(event_name);
        $(".events-container").append(event_card);
    }
    else {
        // Revisa y agrega cada evento como una tarjeta al contenedor de eventos
        for (var i = 0; i < events.length; i++) {
            var event_card = $("<div class='event-card'></div>");
            var event_name = $("<div class='event-name'>" + events[i]["occasion"] + ":</div>");
            var event_count = $("<div class='event-count'>" + events[i]["invited_count"] + "Horas</div>");
            if (events[i]["cancelled"] === true) {
                $(event_card).css({
                    "border-left": "10px solid #FF1744"
                });
                event_count = $("<div class='event-cancelled'>Cancelled</div>");
            }
            $(event_card).append(event_name).append(event_count);
            $(".events-container").append(event_card);
        }
    }
}

// Comprueba si una fecha específica tiene algún evento
function check_events(day, month, year) {
    var events = [];
    for (var i = 0; i < event_data["events"].length; i++) {
        var event = event_data["events"][i];
        if (event["day"] === day &&
            event["month"] === month &&
            event["year"] === year) {
            events.push(event);
        }
    }
    return events;
}

// Datos dados para eventos en formato JSON
var event_data = {
    "events": [
        {
            "occasion": " Test Event",
            "invited_count": 12,
            "year": 2023,
            "month": 10,
            "day": 6,
        }
    ]
};

const months = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
];