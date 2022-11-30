$(function () {
  $("#btn_ingresar_entrada").on("click", function (e) {
    e.preventDefault();
    const producto = $("#nombreProducto").val();
    const cantidad = $("#cantidadProducto").val();
    const precio = $("#precioProducto").val();
    $.post(
      "../controller/ctrlInsertarEntrada.php",
      {
        producto: producto,
        cantidad: cantidad,
        precio: precio,
      },
      function (response) {
        $("#respuesta").html(response);
      }
    );
  });

  $(document).on("click", function (e) {
    if (e.target.id === "btn_editar_entrada") {
      const id = e.target.value;
      $.post(
        "../controller/ctrlModalEditarEntrada.php",
        {
          id: id,
        },
        function (response) {
          $("#respuesta").html(response);
        }
      );
    } else if (e.target.id === "btn_info_entrada") {
      const id = e.target.value;
      $.post(
        "../controller/ctrlModalInfoEntrada.php",
        {
          id: id,
        },
        function (response) {
          $("#respuesta").html(response);
        }
      );
    } else if (e.target.id === "btn_editar_entrada_ok") {
      e.preventDefault();
      const id = $("#idEntrada").val();
      const producto = $("#productoEntrada").val();
      const cantidad = $("#cantidadProducto").val();
      const precio = $("#precioProducto").val();
      $.post(
        "../controller/ctrlActualizarEntrada.php",
        {
          id: id,
          producto: producto,
          cantidad: cantidad,
          precio: precio,
        },
        function (response) {
          $("#respuesta").html(response);
        }
      );
      // console.log(`${id}, ${producto}, ${cantidad}, ${proveedor}, ${precio}`)
    }
  });
});
