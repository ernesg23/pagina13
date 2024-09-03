
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
                $("#content").html(html);
            });

    });