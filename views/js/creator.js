let write = document.querySelector("#write");
let writecontainer = document.querySelector("#writecontainer");
let imagesVideos = document.querySelector("#imagesVideos");
let mediaContainer = document.querySelector(".mediaContainer");
let sources = document.querySelector("#source");
let sourcesContainer = document.querySelector(".sourcesContainer");
let selectedCategories = [];
const sendBtn = document.querySelector("#sendButton");
const sendBtnEd = document.querySelector("#sendButtonEdit");
const archiveBtn = document.querySelector("#archiveButton");
const archiveBtnEd = document.querySelector("#archiveButtonEdit");
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
// Add class to the element
write.addEventListener("click", function () {
  write.classList.add("active");
  writecontainer.classList.add("active");
  imagesVideos.classList.remove("active");
  mediaContainer.classList.remove("active");
  // sourcesContainer.classList.remove("active");
  // source.classList.remove("active");
});
imagesVideos.addEventListener("click", function () {
  imagesVideos.classList.add("active");
  mediaContainer.classList.add("active");
  write.classList.remove("active");
  writecontainer.classList.remove("active");
  // sourcesContainer.classList.remove("active");
  // source.classList.remove("active");
});
// sources.addEventListener("click", function () {
//   sourcesContainer.classList.add("active");
//   source.classList.add("active");
//   write.classList.remove("active");
//   writecontainer.classList.remove("active");
//   imagesVideos.classList.remove("active");
//   mediaContainer.classList.remove("active");
// });
document.querySelector("#files").onchange = function () {
  const file = this.files[0];
  const label = document.querySelector(".btnLabel");
  const icon = document.querySelector("#iconPlus");
  const preview = document.querySelector("#preview");

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block"; // Mostrar la imagen de vista previa
      label.style.padding="0";
      icon.style.display = "none"; // Ocultar el ícono
    };
    reader.readAsDataURL(file);
  } else {
    icon.style.display = "block"; // Mostrar el ícono si no hay archivo seleccionado
    preview.style.display = "none"; // Ocultar la imagen de vista previa
    preview.src = "";
  }
};



categoryButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const category = button.dataset.category;

    if (selectedCategories.includes(category)) {
      // Deseleccionar categoría
      selectedCategories = selectedCategories.filter((cat) => cat !== category);
      button.classList.remove("active");
    } else {
      // Seleccionar categoría
      selectedCategories.push(category);
      button.classList.add("active");
    }
  });
});

sendBtn.addEventListener("click", () => {
  let formData = new FormData();
  let file = $("#files")[0].files[0];
  const imagesAndVideos = $(".newImage").val();
  const title = $(".titletextArea").val();
  const subtitle = $(".subtitletextArea").val();
  const description = $(".descriptiontextArea").val();
  // const sources = $("#sources").val();

  if (
    !file ||
    !imagesAndVideos ||
    !title ||
    !subtitle ||
    !description ||
    !selectedCategories.length === 0
  ) {
    $("#alertError").html("Complete todos los campos y seleccione al menos una categoría.");
  } else {
    const author = getCookie("username");
    const authorEmail = getCookie("email");
    formData.append("file", file);
    formData.append("title", title);
    formData.append("subtitle", subtitle);
    formData.append("description", description);
    // formData.append('sources', sources);
    formData.append("author", author);
    formData.append("images", imagesAndVideos);
    formData.append("email", authorEmail);
    formData.append("isArchived", 0);

    selectedCategories.forEach(cat => {
      formData.append("categories[]", cat);  // Enviar categorías como un array
    });

    $.ajax({
      url: "./modules/users/creatorSend.php",
      data: formData,
      method: "POST",
      contentType: false,
      processData: false,
      success: () => {
        $("#alertGood").html("Artículo creado con éxito");
        setTimeout(() => location.reload(), 500);
      },
      error: (jqXHR, textStatus, errorThrown) => {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
});
archiveBtn.addEventListener("click", () => {
  let formData = new FormData();
  let file = $("#files")[0].files[0];
  const imagesAndVideos = $(".newImage").val();
  const title = $(".titletextArea").val();
  const subtitle = $(".subtitletextArea").val();
  const description = $(".descriptiontextArea").val();
  const sources = $("#sources").val();

  if (
    !file ||
    !imagesAndVideos ||
    !title ||
    !subtitle ||
    !description ||
    !selectedCategories.length === 0
  ) {
    $("#alertError").html("Complete todos los campos y seleccione al menos una categoría.");
  } else {
    const author = getCookie("username");
    const authorEmail = getCookie("email");
    formData.append("file", file);
    formData.append("title", title);
    formData.append("subtitle", subtitle);
    formData.append("description", description);
    formData.append('sources', sources);
    formData.append("author", author);
    formData.append("images", imagesAndVideos);
    formData.append("email", authorEmail);
    formData.append("isArchived", 1);

    selectedCategories.forEach(cat => {
      formData.append("categories[]", cat);  // Enviar categorías como un array
    });

    $.ajax({
      url: "./modules/users/creatorSend.php",
      data: formData,
      method: "POST",
      contentType: false,
      processData: false,
      success: () => {
        $("#alertGood").html("Artículo archivado con éxito");
        setTimeout(() => location.reload(), 500);
      },
      error: (jqXHR, textStatus, errorThrown) => {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
});
