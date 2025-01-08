let file; // Declare the variable file in the global scope of the script

function addEventListeners() {
  const configSettings = document.querySelector("#users-configSettings");
  const configPosts = document.querySelector("#users-configPosts");

  // Add event listener for configPosts
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

  // Add event listener for configSettings
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

  // Edit post button click event
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

  // Delete post button click event
  $("#deletePostBtn").on("click", function () {
    const id = $(".writtenPosts").attr("id");
    $.ajax({
      method: "POST",
      url: "./modules/posts/deleteArticle.php",
      data: { id: id },
      success: (data) => {
        console.log(data, "hola");
        // Refresh posts after deletion
        $.ajax({
          method: "GET",
          url: "./modules/posts/profileGetPosts.php",
          success: (data) => {
            console.log(data);
            callEmergency();
            resetPosts();
          },
        });
      },
    });
  });

  // Function to call emergency post retrieval
  function callEmergency() {
    $.ajax({
      method: "GET",
      url: "./modules/posts/profileGetPosts.php",
      success: (data) => {},
    });
  }

  // Function to reset posts
  function resetPosts() {
    $.ajax({
      method: "POST",
      url: "./modules/users/configPostsReset.php",
      success: (data) => {
        $("#contAllConfigPosts").html(data);
      },
    });
  }

  // File input change event
  document.querySelector("#files").onchange = function () {
    file = this.files[0];
    const label = document.querySelector(".btnLabel");
    const preview = document.querySelector("#preview");

    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = "block"; // Show the preview image
        label.style.padding = "0"; // Remove padding from the label
      };
      reader.readAsDataURL(file);
    } else {
      preview.style.display = "none"; // Hide the preview image
      preview.src = "";
      label.style.padding = ""; // Restore padding to the label
    }
  };

  // Send button click event
  document.querySelector("#sendBtn").addEventListener("click", function () {
    const email = document.querySelector("#newEmail").value;
    const password = document.querySelector("#newPass").value;

    // Function to verify password requirements
    function verifyPass(pass) {
      const hasUpper = /[A-Z]/.test(pass);
      const hasLower = /[a-z]/.test(pass);
      const hasNumber = /\d/.test(pass);
      const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(pass);
      return hasUpper && hasLower && hasNumber && hasSpecialChar;
    }

    // Function to verify email format
    function verifyEmail(email) {
      const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      return regex.test(email);
    }

    // Check email and password validity
    if (!verifyEmail(email) || (!verifyPass(password) && password !== "")) {
      let alert = `<p>Datos invalidos, verifiquelos e intente nuevamente <br> 
            recuerde que la contraseña debe tener: <br>Al menos una mayúscula<br>
            Al menos un número<br>
            Al menos un caracter especial<br>
            Al menos una minúscula<br></p>`;
      document.querySelector("#emailAlert").innerHTML = alert;
    } else {
      const formData = new FormData(document.querySelector("#data")); // Create a FormData object
      formData.append("file", file); // Attach the image file

      // AJAX request to send data
      $.ajax({
        method: "POST",
        url: "./modules/users/configPostsChanges.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          console.log(data);
          if (data == "True") {
            let alert = "<p>Cambio de datos exitoso</p>";
            document.querySelector("#alertAllGood").innerHTML = alert;
            document.querySelector("#emailAlert").innerHTML = "";
            setTimeout(() => location.reload(), 600);
          } else {
            let alert = "<p>Hubo un error, intente nuevamente</p>";
            document.querySelector("#alertAllGood").innerHTML = "";
            document.querySelector("#emailAlert").innerHTML = alert;
          }
        },
      });
    }
  });
}

addEventListeners();

// Create mutation observer to re-add event listeners if the DOM changes
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.type === "childList" || mutation.type === "subtree") {
      addEventListeners();
    }
  });
});

// Setup mutation observer to observe the entire body
observer.observe(document.body, { childList: true, subtree: true });
