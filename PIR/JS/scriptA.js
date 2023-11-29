const userNameField = document.querySelector("[name=usuario]");
const matterField = document.querySelector("[name=asunto]");
const emailField = document.querySelector("[name=email]");
const archivoField = document.querySelector("[name=archivo]");

const setErrors = (message, field, isError = true) => {
    if (isError) {
        field.classList.add("invalid");
        field.nextElementSibling.classList.add("error");
        field.nextElementSibling.innerText = message;
    } else {
        field.classList.remove("invalid");
        field.nextElementSibling.classList.remove("error");
        field.nextElementSibling.innerText = "";
    }
}

const validateEmptyField = (message, e) => {
    const field = e.target;
    const fieldValue = e.target.value;
    if (fieldValue.trim().length === 0) {
        setErrors(message, field);
    } else {
        setErrors("", field, false);
    }
}

const validateEmailFormat = e => {
    const field = e.target;
    const fieldValue = e.target.value;
    const regex = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/);
    if (fieldValue.trim().length > 5 && !regex.test(fieldValue)) {
        setErrors("Por favor introduce un email valido", field);
    } else {
        setErrors("", field, false);
    }
}


userNameField.addEventListener("blur", (e) => validateEmptyField("Registra tu usuario", e));
matterField.addEventListener("blur", (e) => validateEmptyField("Falta añadir titulo", e));
emailField.addEventListener("blur", (e) => validateEmptyField("No se a registrado ningún Email", e));

emailField.addEventListener("input", validateEmailFormat)

archivoField.addEventListener("change", (e) => {
    const field = e.target;
    const fileExt = e.target.files[0].name.split(".").pop().toLowerCase();
    const allowedExt = ["jpg", "jpeg", "png", "pdf", "docx"];
    if (!allowedExt.includes(fileExt)) {
        setErrors(`Archivos con extensiones acordadas ${allowedExt.join(", ")}`, field);
    } else {
        setErrors("", field, false);
    }
});

//    const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
