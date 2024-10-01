
    $(".buttonnav").on("click", function () {
        var parts = $(this).attr("data-page").split('-');

        var module = parts[0];
        var action = parts[1];

        $.ajax({
            method: "GET",
            url: "modules/" + module + "/" + action + ".php",
            // data: {
            //     module: module,
            //     action: action
            // }
        })
            .done(function (html) {
                let url = "modules/" + module + "/" + action + ".php"
                if (url == "modules/users/logOut.php") {
                    document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    location.reload();
                    
                } else{
                    $("#content").html(html);
                }
            });

    });