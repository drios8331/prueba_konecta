$(function() {
    $("#btn_ingresar").on("click", function() {
        const user = $("#documento").val();
        const password = $("#password").val();

        $.ajax({
            url: "sesion/controller/ctrlIniciarSesion.php",
            type: "POST",
            data: { user: user, password: password },
            dataType: "json",
            success: function(respuesta) {
                if (respuesta.status === 200) {
                    const { id, nombre, rol, documento } = respuesta.response;
                    sessionStorage.setItem("id", id);
                    sessionStorage.setItem("nombre", nombre);
                    sessionStorage.setItem("rol", rol);
                    sessionStorage.setItem("documento", documento);
                } else {
                    $("#respuesta").html(respuesta["response"]);
                }
            },
        });
    });

    $("#btn_ingresar").on("click", function() {
        // e.preventDefault();
        const user = $("#documento").val();
        const password = $("#password").val();
        $.post(
            "sesion/controller/ctrlValidarSesion.php", {
                user: user,
                password: password,
            },
            function(response) {
                $("#respuesta").html(response);
            }
        );
    });
});