/* SCROLL DE VOLTAR PARA CIMA */

function voltar() {
    window.scroll({
        top: 0, // Volta para o topo
        behavior: 'smooth' // Deixa a "subida" mais suave
    });
}

/* REVELAR AO ROLAR PARA BAIXO */

function reveal() {
    // Pega todas as tags que tenha a classe "reveal"
    var reveals = document.querySelectorAll(".reveal");

    reveals.forEach((reveal) => {

        // Pega a altura em que o usuário está
        var windowleight = window.innerHeight;
        // Pega a "localização" do usuário na página
        var elementTop = reveal.getBoundingClientRect().top;
        var elementVisible = 100;

        // Verifica se o usuário está descendo a página
        if (elementTop < windowleight - elementVisible)
        {
            // Adiciona a classe "active"
            reveal.classList.add("active");
        }
        else
        {
            // Remove a classe "active"
            reveal.classList.remove("active");
        }
    });
}

// Adiciona o evento "scroll" e chama a função "reveal"
window.addEventListener("scroll", reveal);

/* NAVBAR RESPONSIVO */

const toggleMenu = () => {
    document.body.classList.toggle("open");
}

/* MENU MUDANDO DE COR */

const btnback = document.querySelector(".voltar"); //Botão que volta para cima, descrita na função voltar()
const menu = document.querySelector('#menu');

// Adiciona o evento de scroll na janela da página
window.addEventListener('scroll', () => {
    if (window.scrollY > 0) // verifica se a posição atual do scroll vertical da página é maior que 0
    {
        menu.classList.add('scrolled'); // Adiciona a classe scrolled, para aparecer o fundo do menu
        btnback.style.display = "block";
    } else
    {
        menu.classList.remove('scrolled'); // Remove a classe scrolled
        btnback.style.display = "none"; // Faz o botão desaparecer
    }
});

/* BARRA DE PROGRESSÃO */

// Seleciona o elemento da barra de progresso
const progressBar = document.getElementById("progress-bar");

// Obtém a altura do documento e do viewport
const documentHeight = document.body.scrollHeight; // a altura total do documento
const viewportHeight = window.innerHeight; // viwerport é a área visível pelo usuário

// Atualiza a largura da barra de progresso de acordo com a posição da página
window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY; // Pego a posição Y do scroll da janela (window)

    //calcula a proporção da distância percorrida em relação à distância total que ainda precisa ser percorrida.
    const progress = (scrollPosition / (documentHeight - viewportHeight)) * 100; // a multiplicação por 100 é para deixar em %
    progressBar.style.width = `${progress}%`;
});

/* LOADING */

// Seleciona o overlay
var overlay = document.getElementById("loading-overlay");

// Esconde o overlay quando a página estiver carregada
window.addEventListener("load", function () {
    overlay.style.display = "none";
    console.log("Carregado!");
});

// Mostra o overlay quando a página começar a carregar
window.addEventListener("beforeunload", function () {
    overlay.style.display = "flex";
    console.log("Carregando...");
});

/* USUÁRIO */

const details = document.querySelector("#details-user");
const backgroundOverlay = document.querySelector("#background-overlay");

details.addEventListener("toggle", () => {
    if (details.open)
    {
        document.body.classList.add("details-active");
    } else
    {
        document.body.classList.remove("details-active");
    }
});

/* MÚSICA DE FUNDO */

var music = document.getElementById('background-music');
var musicIcon = document.getElementById('music-button');

function toggleMusic() {
    if (music.paused)
    {
        music.play();
        musicIcon.innerText = '🎵'
    } else
    {
        music.pause();
        musicIcon.innerText = '🎵'
    }
}
