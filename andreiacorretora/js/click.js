
    var creciLink = document.getElementById("clicklink");
    var clickCount = 0;

    creciLink.addEventListener("click", function () {
    clickCount++;

    if (clickCount === 5) {
    window.location.href = "login.php";
}
});

