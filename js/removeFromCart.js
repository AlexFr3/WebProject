const buttons = document.querySelectorAll(".remove-from-cart");
buttons.forEach(button => {
    const idManga = button.previousElementSibling.value;
    button.addEventListener("click", function(e){
        e.preventDefault();
        window.location.href = "removeFromCart.php?idmanga=" + idManga;
    })
});