const data = new Date();
const hora = data.getHours();
const saudacoes = document.querySelectorAll(".msg");

if (hora < 12) saudacoes[1].innerText = "Bom dia";
else if (hora < 18) saudacoes[1].innerText = "Boa tarde";
else if (hora < 6) saudacoes[1].innerText = "Boa noite";

saudacoes.forEach(saudacao => {
    saudacao.addEventListener("click", () => {

        const listRes = document.querySelector(".chat-list");
        const respostas = [
            'Olá! Como posso ajudar?',
            'Bom dia! Como posso ajudar?',
            'Boa tade! Como posso ajudar?',
            'Boa noite! Como posso ajudar?'
        ];

        function typeWrite(elemento) {
            const textoArray = elemento.innerHTML.split('');
            elemento.innerHTML = '';
            let i = 0;
            const interval = setInterval(() => {
                elemento.innerHTML += textoArray[i++];
                if (i === textoArray.length) clearInterval(interval);
            }, 30);
            return interval; // retorna o interval para que possa ser cancelado se necessário
        }

        const resposta = document.createElement('li');
        resposta.classList.add('resposta');

        if (saudacao.innerText == 'Olá') resposta.innerText = respostas[0];
        if (saudacao.innerText == 'Bom dia') resposta.innerText = respostas[1];
        if (saudacao.innerText == 'Boa tarde') resposta.innerText = respostas[2];
        if (saudacao.innerText == 'Boa noite') resposta.innerText = respostas[3];

        listRes.appendChild(resposta);
        typeWrite(resposta);
    });
});

// Seleciona o overlay
var overlay = document.getElementById("loading-overlay");

// Esconde o overlay quando a página estiver carregada
window.addEventListener("load", function () {
    overlay.style.display = "none";
});

// Mostra o overlay quando a página começar a carregar
window.addEventListener("beforeunload", function () {
    overlay.style.display = "flex";
});
