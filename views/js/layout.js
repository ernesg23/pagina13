
  $.ajax({
    url: "./modules/users/layoutVerify.php",
    dataType: "html",
    success: (data) => {
      if(data != false) {
          let profile = `<p class='userName userActionsClick'>${data} </p>
          <img src="./views/img/sin perfil.png" class='userImg userActionsClick' alt="${data} profile picture" loading="lazy">`;
          const menu = document.querySelector(".navMenu");
          $(menu).html(profile);
          $(".userActionsClick").click (()=> {
            const menu = document.querySelector(".actionsMenu");
            menu.classList.toggle("active")
            document.addEventListener('click', (event) => {
                const menuActions = document.querySelector(".actionsMenu");
                if (menuActions.classList.contains("active") && !menuActions.contains(event.target) && !event.target.classList.contains("userActionsClick")) {
                  menuActions.classList.remove("active");
                }
              });
          })
      }
    },
  });
  const navigationMenu = document.querySelector(".navigationMenu");
            const navMenu = document.querySelector(".navmenu");

            navigationMenu.addEventListener("click", () => {
                navigationMenu.classList.toggle("active");
                navMenu.classList.toggle("active");
            })
            document.querySelectorAll(".navlink").forEach(n => n.addEventListener("click", () => {
                navigationMenu.classList.remove("active");
                navMenu.classList.remove("active");
            }))
