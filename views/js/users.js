$(document).ready(function () {
    $("#users-create-button").on("click", function () {
        $.ajax({
            method: "POST",
            url: "modules/users/store.php",
            data: $("#users-create-form").serialize()
        })
            .done(function (html) {
                $("#content").html(html);
            });
    });
});