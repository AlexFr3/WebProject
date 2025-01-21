const increaseButtons = document.querySelectorAll(".increase-quantity");
increaseButtons.forEach(button => {
    const idManga = button.previousElementSibling.value;
    button.addEventListener("click", function(e){
        e.preventDefault();
        window.location.href = "modifyQuantityInCart.php?idManga=" + idManga + "&action=increase";
    })
});

const decreaseButtons = document.querySelectorAll(".decrease-quantity");
decreaseButtons.forEach(button => {
    const idManga = button.previousElementSibling.value;
    button.addEventListener("click", function(e){
        e.preventDefault();
        window.location.href = "modifyQuantityInCart.php?idManga=" + idManga + "&action=decrease";
    })
});