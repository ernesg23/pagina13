$("#users-configPosts").click(() => {
    $.ajax({
        method: "POST",
        url: "./modules/users/configPostsContent.php",
        success: (html) => {
            $(".contentPage").html(html);
        }
    })
})
$("#users-configSettings").click(() => {
    $.ajax({
        method: "POST",
        url: "./modules/users/configSettingsContent.php",
        success: (html) => {
            $(".contentPage").html(html);
        }
    })
})
$(document).ready(function () {
    $("#save").off("click");
    $("#save").on("click", function () {
        $.ajax({
            method: "POST",
            url: "./modules/users/configPostsChanges.php",
            data: $("#data").serialize(),
            success: (data) => {
                location.reload();

            }
        })
    });
});