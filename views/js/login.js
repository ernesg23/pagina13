sendBtn = $("#sendBtn");
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
    let alert = `Complete los campos para poder iniciar sesion`
    $("#emailAlert").html(alert)
    alert = ``
  } else if (!verifyEmail(email)) {
    let alert = `Datos invalidos, verifiquelos e intente nuevamente`
    $("#emailAlert").html(alert)
    alert = ``
  } else if (!verifyPass(password)) {
    let alert = `Datos invalidos, verifiquelos e intente nuevamente`
    $("#emailAlert").html(alert)
    alert = ``
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
        $("#emailAlert").html("")
        let alert= `Sesion iniciada con exito`
        $("#alertAllGood").html(alert)
        setTimeout(()=> {
          location.reload();
        }, 900)
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alert("Error en la solicitud: " + textStatus + " - " + errorThrown);
      }
    });
  }
});
account = document.querySelectorAll(".haventCount");
account.forEach(haventCount => {
  haventCount.addEventListener("click", function (e) {
    e.stopPropagation();
    let id = this.id;
    $.ajax({
      url: "./modules/users/register.php",
      data: { Count: id },
      dataType: "html",
      method: "POST",
      success: (data) => {
        console.log("anda");
        $("#content").html(data);
      },
    });
  });
});