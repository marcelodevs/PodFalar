// Pega todas os inputs do tipo rádio
const inputs = document.querySelectorAll('input[type="radio"]');
const body = document.querySelector('body');

// Uso o método forEach para fazer um loop e sempre ficar ativo
inputs.forEach(input => {
    input.addEventListener("change", function () {
        if (this.checked)
        {
            body.style.background = this.value;
            // Adiciona a classe transition
            body.classList.add('transition');
        }
    });
});

/* TELA DE LOGIN */

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});
