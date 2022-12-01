$(document).ready(function() {
    title = $(document).attr("title");
    $.post(
        "../../tools/menuLateral.php", {
            title: title,
        },
        function(response) {
            $("#menuLateral").html(response);
        }
    );
});