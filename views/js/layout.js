
  $.ajax({
    url: "./modules/users/layoutVerify.php",
    dataType: "html",
    success: (data) => {
      let profile = `<p class='userName'>${data} </p>
      <img src="./views/img/sin perfil.png" class='userImg' alt="${data} profile picture" loading="lazy">`;
      const menu = document.querySelector(".navMenu");
      $(menu).html(profile);
    },
  });

