document.addEventListener("DOMContentLoaded", function () {
  const closeButton = document.querySelector(".btn-close");
  console.log("Bottone trovato:", closeButton);

  if (closeButton) {
    closeButton.addEventListener("click", function () {
      console.log("cliccato");
      window.location.href = "../index.html";
    });
  } else {
    console.error("Elemento .btn-close non trovato nel DOM.");
  }
});