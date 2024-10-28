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
    let alert= `Complete todos los campos para poder registrarse`
    $("#alertAll").html(alert)
  } else if (!verifyEmail(userEmail)) {
    let alert = `Ingrese una direccion de correo electronico valida`
    $("#emailAlert").html(alert)
  } else if (!verifyPass(userPassword)) {
    let alert = `Su contraseña no cumple con los requisitos explicados en el formulario`
    $("#passwordAlert").html(alert)
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
        let alert = `Registro realizado con exito`
        $("#alertAllGood").html(alert)
        setTimeout(()=> {
          location.reload();
        }, 900)
      },
    });
  }
});

const account = document.querySelectorAll(".haveCount");
account.forEach(haveCount => {
  haveCount.addEventListener("click", function (e) {
    e.stopPropagation();
    let id = this.id;
    $.ajax({
      url: "./modules/users/login.php",
      data: { articleId: id },
      dataType: "html",
      method: "POST",
      success: (data) => {
        console.log("anda");
        $("#content").html(data);
      },
    });
  });
});
