$(function() {
    $("#tableEntradas").DataTable({
        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        //   },
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
        responsive: true,
        order: false,
    });
});