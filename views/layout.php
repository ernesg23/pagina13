<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div id="menu">
        <h2>Menu</h2>
        <a href="#" class="menu-item" data-page="home">home</a><br>
        <a href="#" class="menu-item" data-page="users-list">usuarios listado</a><br>
        <a href="#" class="menu-item" data-page="users-create">usuarios alta</a><br>
    </div>

    <hr>

    <h2>Contenido</h2>
    <div id="content">
        <?php include_once "views/home.php"; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $(".menu-item").on("click", function() {
                var parts = $(this).attr("data-page").split('-');

                var module = parts[0];
                var action = parts[1];

                $.ajax({
                        method: "GET",
                        url: "modules/" + module + "/" + action + ".php",
                        data: {
                            module: module,
                            action: action
                        }
                    })
                    .done(function(html) {
                        $("#content").html(html);
                    });

            });
        });
    </script>

</body>

</html>