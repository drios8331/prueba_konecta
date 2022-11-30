$(document).ready(function() {
    title = $(document).attr("title");
    // console.log(title)
    // const spinner = document.querySelector(".sk-circle");
    // spinner.style.display = "flex";
    $.post(
        "../../tools/menuLateral.php", {
            title: title,
        },
        function(response) {
            $("#menuLateral").html(response);
            // spinner.style.display = "none";
        }
    );
});

// const icono = document.querySelector("#iconAlert");

// document.addEventListener("DOMContentLoaded", () => {
//     validarAlertas();
// });

// function validarAlertas() {

//     if (alertaStock.childElementCount > 0) {
//         icono.classList.add('text-danger');
//     } else {
//         icono.classList.add('text-primary');
//     }
// }