$(function () {
  $(document).on("click", function (e) {
    if (e.target.id === "btn_info_inventario") {
      const id = e.target.value;
      $.post(
        "../controller/ctrlModalInfoInventario.php",
        {
          id: id,
        },
        function (response) {
          $("#respuesta").html(response);
        }
      );
    }
  });
});
