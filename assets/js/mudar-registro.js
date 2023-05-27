// var form = document.querySelector(" .myForm"); var btnUpdate = document.querySelector(".update").addEventListener('click', () => {
//     form.action = "assets/php/update.php";
// });

// var btnDel = document.querySelector(".del").addEventListener('click', () => {
//     form.action = "assets/php/delete.php";
// });

const inputSenha = document.querySelector(".senhaUpdate");
document.querySelector(".show-senha").addEventListener("click", () => {
    if (inputSenha.type === "text")
    {
        inputSenha.type = 'password';
    } else if (inputSenha.type === "password")
    {
        inputSenha.type = 'text';
    }
});

document.addEventListener("DOMContentLoaded", function () {
    var profileImage = document.querySelector(".profile-image img");
    var overlay = document.querySelector(".overlay");
    var overlayImage = document.querySelector(".overlay img");

    profileImage.addEventListener("click", function () {
        overlayImage.src = this.src;
        overlay.style.display = "flex";
    });

    overlay.addEventListener("click", function () {
        this.style.display = "none";
    });
});

console.log("wksdjshkfuki");
