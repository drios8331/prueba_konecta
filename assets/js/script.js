//Variables
const user = document.querySelector("#documento");
const password = document.querySelector("#password");
const boton = document.querySelector("#btn-ingresar");
const botonView = document.querySelector("#cambiarVista");

//Eventos
cargarEventListeners();
function cargarEventListeners() {
    // boton.addEventListener('click', prueba);
    botonView.addEventListener("click", changeStatePassword);
    document.addEventListener("DOMContentLoaded", () => {
        const state = document.createElement("i");
        state.classList.add("fas", "fa-solid", "fa-eye");
        state.style.pointerEvents = "none";
        botonView.appendChild(state);
    });
}

//Funciones
function changeStatePassword() {
    const state = botonView.firstChild;
    if (password.type === "password") {
        state.classList.remove("fa-eye");
        state.classList.add("fa-eye-slash");
        password.type = "text";
    } else if (password.type === "text") {
        state.classList.remove("fa-eye-slash");
        state.classList.add("fa-eye");
        password.type = "password";
    }
}
