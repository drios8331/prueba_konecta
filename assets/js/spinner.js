$(function() {
    $.post(
        "../../tools/spinner.php", {},
        function(response) {
            $(".sk-circle").html(response);
        }
    );
});