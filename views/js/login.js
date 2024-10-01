const sendBtn = $("#sendBtn");
function verifyPass(pass) {
  const hasUpper = /[A-Z]/.test(pass);
  const hasLower = /[a-z]/.test(pass);
  const hasNumber = /\d/.test(pass);
  const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(pass);
  return hasUpper && hasLower && hasNumber && hasSpecialChar;
}
function verifyEmail(email) {
  const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  return regex.test(email);
}
$(sendBtn).click(() => {
  const email = $("#email").val();
  const password = $("#password").val();
  if (email == "" || password == "") {
    alert("Complete los campos para poder iniciar sesion");
  } else if (!verifyEmail(email)) {
    alert("Ingrese una direccion de correo electronico valida");
  } else if (!verifyPass(password)) {
    alert("Contraseña invalida, no cumple con los requisitos especificados al registrarse");
  } else {
    $.ajax({
      url: "./modules/users/loginSend.php",
      data: {
        email: email,
        pass: password,
      },
      method: "POST",
      dataType: "json",
      success: () => {
        alert("Sesion iniciada con exito")
        location.reload();
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alert("Error en la solicitud: " + textStatus + " - " + errorThrown);
      }
    });
  }
});