const sendBtn = $("#sendButton");
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
  const name = $("#name").val();
  const lastname = $("#lastname").val();
  const userEmail = $("#userEmail").val();
  const userPassword = $("#userPassword").val();
  if (name == "" || lastname == "" || userEmail == "") {
    alert("Complete todos los campos para poder registrarse");
  } else if (!verifyEmail(userEmail)) {
    alert("Ingrese una direccion de correo electronico correcta");
  } else if (!verifyPass(userPassword)) {
    alert("Su contraseña no cumple con los requisitos explicados en el formulario");
  } else {
    const date = new Date()
    let actualDate = date.getFullYear() + "-" + (date.getMonth()+ 1) + "-" + date.getDate();
    $.ajax({
      url: "./modules/users/registerSend.php",
      data: {
        name: name,
        lastname: lastname,
        email: userEmail,
        pass: userPassword,
        date: actualDate
      },
      method: "POST",
      dataType: "json",
      success: () => {
        alert("Registro realizado con exito")
        location.reload();
      },
    });
  }
});
