const buttons = document.querySelectorAll("body main section input[type='button']");
buttons.forEach(button => {
    const idManga = button.previousElementSibling.value;
    button.addEventListener("click", function(e){
        e.preventDefault();
        window.location.href = "addToCart.php?idmanga=" + idManga;
    })
});