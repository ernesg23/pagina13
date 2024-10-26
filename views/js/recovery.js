function verifyEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
  }
  
  const recBtn = document.querySelector("#recoveryButton");
  
  recBtn.addEventListener("click", () => {
    const email = $("#recoveryEmail").val();
    
    if (!verifyEmail(email)) {
      const alert = "<p>Ingrese un email válido</p>";
      $("#alertbad").html(alert);
    } else {
      $.ajax({
        url: "./forgottenSend.php",
        method: "POST", // Corrección: "merhod" a "method"
        data: { email: email },
        success: (data) => {
          console.log(data);
          let alert = "";
          if (data === "true") {
            $("#alertbad").html(alert);
            alert = "<p>Email enviado, revise su correo electrónico</p>";
            $("#alertgood").html(alert);
            setTimeout(()=> {
                location.replace("../../index.php")
            }, 500)
          } else {
            alert = "<p>Hubo un error al enviar el correo, intente nuevamente</p>";
            $("#alertbad").html(alert);
          }
        },
        error: (jqXHR, textStatus, errorThrown) => {
          console.error("Error:", textStatus, errorThrown);
          const alert = "<p>Hubo un error al enviar el correo, intente nuevamente</p>";
          $("#alertbad").html(alert);
        },
      });
    }
  });
  
