//variables
const menu = document.querySelector(".sidebar");
const boton = document.querySelector("#hamburguesa");

// eventos;
eventListeners();

function eventListeners() {
    document.addEventListener("DOMContentLoaded", menuPersiste);
    boton.addEventListener("click", ocultarSidebar);
}


//funciones
function ocultarSidebar() {
    const estado = document.querySelector(".sidebar").classList.contains("false");
    if (estado === true) {
        menu.classList.add("d-none");
        menu.classList.remove("false");
        localStorage.setItem("menu", "true");
    } else {
        menu.classList.remove("d-none");
        menu.classList.add("false");
        localStorage.setItem("menu", "false");
    }
}


function menuPersiste() {
    const dato = localStorage.getItem("menu");

    if (dato === null) {
        localStorage.setItem("menu", "false");
    } else {
        if (dato === "true") {
            menu.classList.add("d-none");
            menu.classList.remove("false");
        }
    }
}