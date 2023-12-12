function addClassDisplay() {
  document.getElementById("base").classList.add("display");
  document.getElementById("altura").classList.add("display");
}

function deleteClassDisplay() {
  selectedValue = document.getElementById("listaFiguras").value;
  switch (selectedValue) {
    case "cuadrado":
      addClassDisplay();
      document.getElementById("altura").value = "";
      document.getElementById("base").classList.remove("display");
      break;
    case "triangulo":
      addClassDisplay();
      document.getElementById("base").value = "";
      document.getElementById("altura").classList.remove("display");

      break;
    case "rectangulo":
      addClassDisplay();
      document.getElementById("base").classList.remove("display");
      document.getElementById("altura").classList.remove("display");
      break;
    case "rombo":
      addClassDisplay();
      document.getElementById("base").value = "";
      document.getElementById("altura").classList.remove("display");
      break;
    default:
      addClassDisplay();
      document.getElementById("altura").value = "";
      document.getElementById("base").value = "";
  }
}

window.onload = function () {
  document
    .getElementById("listaFiguras")
    .addEventListener("change", deleteClassDisplay);
};
