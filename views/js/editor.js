let write = document.querySelector("#write");
let writecontainer = document.querySelector("#writecontainer");
let imagesVideos = document.querySelector("#imagesVideos");
let mediaContainer = document.querySelector(".mediaContainer");
let sources = document.querySelector("#source");
let sourcesContainer = document.querySelector(".sourcesContainer");
let selectedCategories = []; // Array para almacenar las categorías seleccionadas
const sendBtn = document.querySelector("#sendButton");
const sendBtnEd = document.querySelector("#sendButtonEdit");
const archiveBtn = document.querySelector("#archiveButton");
const archiveBtnEd = document.querySelector("#archiveButtonEdit");
const categoryButtons = document.querySelectorAll(".categoryCreator");
const aiBtn = document.querySelector(".aiBtn");
const aiCont = document.querySelector("#aiMessagesContainer");
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
document.querySelectorAll(".dropdown-item").forEach((item) => {
  item.addEventListener("click", function () {
    const selectedCategory = this.getAttribute("data-category");
    const button = document.querySelector("#dropdownMenuButton");
    button.textContent = selectedCategory;
    button.setAttribute("data-selected-category", selectedCategory); // Save value
  });
});
aiBtn.addEventListener("click", () => {
  $.ajax({
    url: "./modules/users/ai.html",
    method: "post",
    dataType: "html",
    success: (response) => {
      aiCont.classList.add("active");
      aiBtn.classList.remove("active");
      $(aiCont).html(response);
    },
  });
});
// Agregar clases al hacer clic en las secciones
write.addEventListener("click", function () {
  write.classList.add("active");
  writecontainer.classList.add("active");
  imagesVideos.classList.remove("active");
  mediaContainer.classList.remove("active");
});
imagesVideos.addEventListener("click", function () {
  imagesVideos.classList.add("active");
  mediaContainer.classList.add("active");
  write.classList.remove("active");
  writecontainer.classList.remove("active");
});

document.querySelector("#files").onchange = function () {
  const file = this.files[0];
  const label = document.querySelector(".btnLabel");
  const preview = document.querySelector("#preview");
  const icon = document.querySelector("#iconPlus");

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block"; // Mostrar la imagen de vista previa
      label.style.padding = "0"; // Quitar padding del label
    };
    reader.readAsDataURL(file);
  } else {
    icon.style.display = "block"; // Mostrar el ícono si no hay archivo seleccionado
    preview.style.display = "none"; // Ocultar la imagen de vista previa
    preview.src = "";
    label.style.padding = ""; // Restaurar padding del label
  }
};

// Enviar el artículo
sendBtnEd.addEventListener("click", () => {
  let formData = new FormData();
  const id = $(".buttonsContainer").attr("id");
  let file = $("#files")[0].files[0];
  const imagesAndVideos = $("label[for='files']").text(); // Obtener valor del label
  const title = $(".titletextArea").val();
  const subtitle = $(".subtitletextArea").val();
  const description = $(".descriptiontextArea").val();
  const selectedCategory = $("#dropdownMenuButton").data("selected-category");

  if (!title || !subtitle || !description || selectedCategory === "Elige una categoría") {
    $("#alertError").html("Complete todos los campos y seleccione una categoría.");
  } else {
    const author = getCookie("username");
    const authorEmail = getCookie("email");

    if (file) {
      formData.append("file", file);
    } else {
      formData.append("images", imagesAndVideos);
    }
    formData.append("title", title);
    formData.append("subtitle", subtitle);
    formData.append("description", description);
    formData.append("author", author);
    formData.append("email", authorEmail);
    formData.append("isArchived", 0);
    formData.append("categories[]", selectedCategory);
    formData.append("id", id);

    $.ajax({
      url: "./modules/users/editorSend.php",
      data: formData,
      method: "POST",
      contentType: false,
      processData: false,
      success: (response) => {
        $("#alertGood").html(response);  // Mostrar la respuesta del servidor
        setTimeout(() => location.reload(), 500);
      },
      error: (jqXHR, textStatus, errorThrown) => {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
});

// Archivar artículo
archiveBtnEd.addEventListener("click", () => {
  let formData = new FormData();
  let file = $("#files")[0].files[0];
  const id = $(".buttonsContainer").attr("id");
  const imagesAndVideos = $(".newImage").val();
  const title = $(".titletextArea").val();
  const subtitle = $(".subtitletextArea").val();
  const description = $(".descriptiontextArea").val();
  const sources = $("#sources").val();
  const selectedCategory = $("#dropdownMenuButton").data("selected-category");
  if (
    !title ||
    !subtitle ||
    !description ||
    selectedCategory === "Elige una categoría"
  ) {
    let alert = `Complete todos los campos para poder subir un articulo`;
    $("#alertError").html(alert);
  }else {
    const author = getCookie("username");
    const authorEmail = getCookie("email");

    if (file) {
      formData.append("file", file);
    } else {
      formData.append("images", imagesAndVideos);
    }
    formData.append("title", title);
    formData.append("subtitle", subtitle);
    formData.append("description", description);
    formData.append("sources", sources);
    formData.append("author", author);
    formData.append("email", authorEmail);
    formData.append("isArchived", 1);
    formData.append("categories[]", selectedCategory)
    $.ajax({
      url: "./modules/users/editorSend.php",
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