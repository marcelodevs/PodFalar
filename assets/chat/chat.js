/* CHAT */

const listRes = document.querySelector(".msg-text-bot");
const userRes = document.querySelector(".msg-text-user");
const btnEnviar = document.querySelector(".enviar");
const inputPergunta = document.querySelector(".msg-pergunta");

const main = document.querySelector(".msger-chat");

const respostas = [
    'Eu sou um assistente virtual.',
    'Meu nome é HelpChat.',
    'Eu estou aqui para responder às suas perguntas.',
    'Olá! Como posso ajudar?',
    'Bom dia! Como posso ajudar?',
    'Boa tade! Como posso ajudar?',
    'Boa noite! Como posso ajudar?'
];

const criarNovaMensagemUsuario = (mensagem) => {
    const novaMsg = document.createElement('div');
    novaMsg.classList.add('msg', 'right-msg');

    const msgImg = document.createElement('div');
    msgImg.classList.add('msg-img');
    msgImg.style.backgroundImage = "url('../img/user.png')";

    const msgBubble = document.createElement('div');
    msgBubble.classList.add('msg-bubble');

    const msgInfo = document.createElement('div');
    msgInfo.classList.add('msg-info');

    const nomeUsuario = '<?php echo $dadosUser["nome"];?>';
    const msgInfoNameUser = document.createElement('div');
    msgInfoNameUser.classList.add('msg-info-name-user');
    msgInfoNameUser.innerHTML = nomeUsuario;

    const msgInfoTimeUser = document.createElement('div');
    msgInfoTimeUser.classList.add('msg-info-time-user');

    const msgTextUser = document.createElement('div');
    msgTextUser.classList.add('msg-text-user');
    msgTextUser.innerText = mensagem;

    msgInfo.appendChild(msgInfoNameUser);
    msgInfo.appendChild(msgInfoTimeUser);
    msgBubble.appendChild(msgInfo);
    msgBubble.appendChild(msgTextUser);
    novaMsg.appendChild(msgImg);
    novaMsg.appendChild(msgBubble);

    main.appendChild(novaMsg);
}

const criarNovaMensagemBot = (mensagem) => {
    const novaMsg = document.createElement('div');
    novaMsg.classList.add('msg', 'left-msg');

    const msgImg = document.createElement('div');
    msgImg.classList.add('msg-img');
    msgImg.style.backgroundImage = "url('../img/user.png')";

    const msgBubble = document.createElement('div');
    msgBubble.classList.add('msg-bubble');

    const msgInfo = document.createElement('div');
    msgInfo.classList.add('msg-info');

    const msgInfoName = document.createElement('div');
    msgInfoName.classList.add('msg-info-name');
    msgInfoName.innerText = 'HelpChat';

    const msgTextBot = document.createElement('div');
    msgTextBot.classList.add('msg-text-bot');
    msgTextBot.innerText = mensagem;

    msgInfo.appendChild(msgInfoName);
    msgBubble.appendChild(msgInfo);
    msgBubble.appendChild(msgTextBot);
    novaMsg.appendChild(msgImg);
    novaMsg.appendChild(msgBubble);

    main.appendChild(novaMsg);

    function typeWrite(elemento) {
        const textoArray = elemento.innerHTML.split('');
        elemento.innerHTML = '';
        textoArray.forEach((letra, i) => {
            setTimeout(() => elemento.innerHTML += letra, 30 * i)
        });
    }

    const novaMsgBot = document.querySelector('.left-msg:last-child');
    const texto = novaMsgBot.querySelector('.msg-text-bot');
    typeWrite(texto);
}

btnEnviar.addEventListener('click', () => {
    const pergunta = inputPergunta.value.toLowerCase();

    if (pergunta.includes('quem') && (pergunta.includes('você') || pergunta.includes('voce') || pergunta.includes('vc')))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[0]);
        inputPergunta.value = '';
    } else if (pergunta.includes('qual') && pergunta.includes('seu nome'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[1]);
        inputPergunta.value = '';
    } else if (pergunta.includes('o que') && (pergunta.includes('você faz') || pergunta.includes('voce faz') || pergunta.includes('vc faz')))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[2]);
        inputPergunta.value = '';
    } else if (pergunta.includes('ola') || pergunta.includes('olá') || pergunta.includes('oi'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[3]);
        inputPergunta.value = '';
    } else if (pergunta.includes('bom dia'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[4]);
        inputPergunta.value = '';
    } else if (pergunta.includes('boa tarde'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[5]);
        inputPergunta.value = '';
    } else if (pergunta.includes('boa noite'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[6]);
        inputPergunta.value = '';
    } else
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot('Desculpe, não entendi sua pergunta');
        inputPergunta.value = '';
    }
});

window.addEventListener("keypress", (event) => {
    if (event.key === "Enter")
    {
        event.preventDefault();
        btnEnviar.click();
    }
});

/* CARREGAMENTO */

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
