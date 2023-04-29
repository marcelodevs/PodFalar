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

const btnback = document.querySelector(".voltar");
const menu = document.querySelector('#menu');
const nav = document.querySelector(".link");

window.addEventListener('scroll', () => {
    if (window.scrollY > 0)
    {
        menu.classList.add('scrolled');
        nav.classList.add('scrolled');
        btnback.style.display = "block";
        btnback.classList.add("transition");
    } else
    {
        menu.classList.remove('scrolled');
        nav.classList.remove('scrolled');
        btnback.style.display = "none";
        btnback.classList.add("transition");
    }
});

/* CARROUSEL */

const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
const carouselItems = document.querySelector('.carousel-items');
const carouselItemWidth = document.querySelector('.carousel-item').offsetWidth;

let position = 0;

nextButton.addEventListener('click', () => {
    position -= carouselItemWidth;
    position = Math.max(position, -carouselItemWidth * (carouselItems.children.length - 1));
    carouselItems.style.transform = `translateX(${position}px)`;
});

prevButton.addEventListener('click', () => {
    position += carouselItemWidth;
    position = Math.min(position, 0);
    carouselItems.style.transform = `translateX(${position}px)`;
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

/* USUÁRIO */

const details = document.querySelector('details');
const body = document.querySelector('body');

details.addEventListener('click', () => {
    if (details.open)
    {
        body.classList.add('details-opened');
    } else
    {
        body.classList.remove('details-opened');
    }
});

/* BARRA DE PROGRESSÃO */

// Seleciona o elemento da barra de progresso
const progressBar = document.getElementById("progress-bar");

// Obtém a altura do documento e do viewport
const documentHeight = document.body.scrollHeight;
const viewportHeight = window.innerHeight;

// Atualiza a largura da barra de progresso de acordo com a posição da página
window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;
    const progress = (scrollPosition / (documentHeight - viewportHeight)) * 100;
    progressBar.style.width = `${progress}%`;
});

/* LOADING */

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

