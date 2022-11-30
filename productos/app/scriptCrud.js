$(function () {
    $("#btn_insertar_productos").on("click", function (e) {
        e.preventDefault();
        const referencia = $("#refProducto").val();
        const nombre = $("#nomProducto").val();
        const categoria = $("#catProducto").val();
        const unidadMedida = $("#uMProducto").val();
        const medida = $("#cantMedidaProducto").val();
        $.post(
            "../controller/ctrlInsertarProducto.php",
            {
                referencia: referencia,
                nombre: nombre,
                categoria: categoria,
                unidadMedida: unidadMedida,
                medida: medida,
            },
            function (response) {
                $("#respuesta").html(response);
            }
        );
        // console.log(`${referencia}, ${nombre}, ${categoria}, ${unidadMedida}, ${medida}`)
    });

    $(document).on("click", function (e) {
        if (e.target.id === "btn_editar_producto") {
            const id = e.target.value;
            $.post(
                "../controller/ctrlModalEditarProducto.php",
                {
                    id: id,
                },
                function (response) {
                    $("#respuesta").html(response);
                }
            );
            // console.log(id);
        } else if (e.target.id === "btn_info_producto") {
            const id = e.target.value;
            $.post(
                "../controller/ctrlModalInfoProducto.php",
                {
                    id: id,
                },
                function (response) {
                    $("#respuesta").html(response);
                }
            );
            // console.log(id);
        } else if (e.target.id === "btn_editar_entrada_ok") {
            const id = $("#idProducto").val();
            const referencia = $("#idProducto").val();
            const nombre = $("#nomProducto").val();
            const categoria = $("#catProducto").val();
            const unidadMedida = $("#uMProducto").val();
            const medida = $("#cantMedidaProducto").val();
            $.post(
                "../controller/ctrlInsertarProducto.php",
                {
                    id: id,
                    referencia: referencia,
                    nombre: nombre,
                    categoria: categoria,
                    unidadMedida: unidadMedida,
                    medida: medida,
                },
                function (response) {
                    $("#respuesta").html(response);
                }
            );
        }
    });
});
