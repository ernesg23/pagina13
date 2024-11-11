const configSettings = document.querySelector("#users-configSettings");
const configPosts = document.querySelector("#users-configPosts");
const postView = document.querySelector("#contPostW");
const postsClick = document.querySelector(".written");

function addEventListeners() {
  const configSettings = document.querySelector("#users-configSettings");
  const configPosts = document.querySelector("#users-configPosts");
  if (configPosts) {
    configPosts.addEventListener("click", function () {
      $.ajax({
        method: "POST",
        url: "./modules/users/configPostsContent.php",
        success: (html) => {
          $(".contSett").html(html);
        },
      });
    });
  }

  if (configSettings) {
    configSettings.addEventListener("click", function () {
      $.ajax({
        method: "POST",
        url: "./modules/users/configSettingsContent.php",
        success: (html) => {
          $(".contSett").html(html);
        },
      });
    });
  }
  $("#editPostBtn").on("click", function () {
    const id = $(".writtenPosts").attr("id");
    console.log(id);
    $.ajax({
      method: "POST",
      url: "./modules/posts/editArticle.php",
      data: { postId: id },
      dataType: "html",
      success: (data) => {
        console.log("Success:", data);
        $("#content").html(data);
      },
    });
  });
  $("#deletePostBtn").on("click", function () {
    const id = $(".writtenPosts").attr("id");
    $.ajax({
      method: "POST",
      url: "./modules/posts/deleteArticle.php",
      data: { id: id },
      success: (data) => {
        console.log( data, "hola");
        $.ajax({
          method: "GET",
          url: "./modules/posts/profileGetPosts.php",
          success: (data) => {
            console.log(data);
            llmadodeemergencia();
            
            devuelve();
          },

        });
      },
    });
  });
function llmadodeemergencia(){
  $.ajax({
    method: "GET",
    url: "./modules/posts/profileGetPosts.php",
    success: (data) => {
      $("#previewPostsCont").html(data);
      $("#writtenPostsList").html(data);

    },

  });
}
function devuelve(){
  $.ajax({
    method: "POST",
    url: "./modules/users/configPostsReset.php",
    success: (data) => {
      $("#contAllConfigPosts").html(data);
    },

  });
}
  $("#sendBtn").on("click", function () {
    const email = document.querySelector("#newEmail").value;
    const password = document.querySelector("#newPass").value;
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
    if (!verifyEmail(email)) {
      let alert = ``;
      $("#emailAlert").html(alert);
      alert = `<p>Datos invalidos, verifiquelos e intente nuevamente</p>`;
      $("#emailAlert").html(alert);
    } else if (!verifyPass(password) && password != "") {
      let alert = ``;
      $("#emailAlert").html(alert);
      alert = `<p>Datos invalidos, recuerde que la contraseña debe tener: <br>Al menos una mayúscula<br>
        Al menos un número<br>
        Al menos un caracter especial<br>
        Al menos una minúscula<br></p>`;
      $("#emailAlert").html(alert);
    } else {
      let alert = "";
      $("#emailAlert").html(alert);
      alert = "<p>Cambio de datos exitoso</p>";
      $("#alertAllGood").html(alert);
      $.ajax({
        method: "POST",
        url: "./modules/users/configPostsChanges.php",
        data: $("#data").serialize(),
        success: (data) => {
          setTimeout(()=>{
            location.reload();
          }, 600)
        },
      });
    }
  });
}

addEventListeners();

// Create mutation observer
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.type === "childList" || mutation.type === "subtree") {
      addEventListeners();
    }
  });
});

// Setup mutation observer
observer.observe(document.body, { childList: true, subtree: true });
