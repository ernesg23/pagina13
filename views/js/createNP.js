function verifyPass(pass) {
    const hasUpper = /[A-Z]/.test(pass);
    const hasLower = /[a-z]/.test(pass);
    const hasNumber = /\d/.test(pass);
    const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(pass);
    return hasUpper && hasLower && hasNumber && hasSpecialChar;
}

// Funcionalidad para mostrar/ocultar la contraseña
$(".toggle-password").on("click", function () {
    const target = $(this).data("target");
    const input = $(target);
    const type = input.attr("type") === "password" ? "text" : "password";
    input.attr("type", type);
    $(this).html(type === "password" ? "&#128065;" : "&#128065;"); // Opcionalmente cambiar el ícono
});

$("#resetPwdForm").on("submit", function (event) {
    event.preventDefault();
    let password = $("#pwd").val();
    let passwordRep = $("#pwdRep").val();
    if (passwordRep == "" || password == "") {
        let alert = "<p>Complete ambos campos</p>";
        $("#alertbad").html(alert);
    } else if (!verifyPass(password) || !verifyPass(passwordRep)) {
        let alert = "<p>Datos invalidos, verifiquelos e intente nuevamente</p>";
        $("#alertbad").html(alert);
    } else {
        $.ajax({
            url: "./resetPwd.php",
            method: "POST",
            data: $(this).serialize(),
            success: function (response) {
                if (response === "true") {
                    let alert = "<p>Cambios realizados exitosamente</p>";
                    $("#alertgood").html(alert);
                } else {
                    let alert = "<p>Hubo un error, intente nuevamente</p>";
                    $("#alertbad").html(alert);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", status, error);
                let alert = "<p>Hubo un error, intente nuevamente</p>";
                $("#alertbad").html(alert);
            },
        });
    }
});
