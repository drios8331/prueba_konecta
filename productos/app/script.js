$(function(){
    $("#btn_insertar_categoria").on("click", function(e) {
        if (e.target.id === "btn_insertar_categoria") {
            $.post(
                "../controller/ctrlModalInsertarCategoria.php", {},
                function(response) {
                    $("#respuesta").html(response);
                }
            );
        }
    });

    $(document).on("click", function(e) {
        if (e.target.id === "btn_insertar_categoria_ok") {
            const nombre = $("#categoria").val();
            $.post(
                "../controller/ctrlInsertCategoria.php", {
                    nombre: nombre,
                },
                function(responseText) {
                    $("#respuesta").html(responseText);
                }
            );
        } 
    });

}); 