// Seleciona o formulário e adiciona um evento de clique ao botão de atualizar
var form = document.querySelector(".myForm");
var btnUpdate = document.querySelector(".update").addEventListener('click', () => {
    // Muda para onde os dados do formulário vão
    form.action = "assets/php/update.php";
});

// Adiciona um evento de clique ao botão de exclusão
var btnDel = document.querySelector(".del").addEventListener('click', () => {
    form.action = "assets/php/delete.php";
});

// Adiciona um evento de clique ao ícone de mostrar senha
const inputSenha = document.querySelector(".senhaUpdate");
document.querySelector(".show-senha").addEventListener("click", () => {
    // Verifica se o tipo do input é texto, se for, muda para o tipo senha
    if (inputSenha.type === "text")
    {
        inputSenha.type = 'password';
    } else if (inputSenha.type === "password") // Mesma lógica, mas ao contrário
    {
        inputSenha.type = 'text';
    }
});

// Adiciona eventos para mostrar e fechar a imagem em um overlay
document.addEventListener("DOMContentLoaded", function () {
    var profileImage = document.querySelector(".profile-image img");
    var overlay = document.querySelector(".overlay");
    var overlayImage = document.querySelector(".overlay img");

    // Abre o overlay ao clicar na imagem do perfil
    profileImage.addEventListener("click", function () {
        overlayImage.src = this.src;
        overlay.style.display = "flex";
    });

    // Fecha o overlay ao clicar fora da imagem
    overlay.addEventListener("click", function () {
        this.style.display = "none";
    });
});
