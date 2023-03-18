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
