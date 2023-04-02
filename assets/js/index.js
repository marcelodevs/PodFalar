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

const menu = document.querySelector('#menu');
const nav = document.querySelector(".link");

window.addEventListener('scroll', () => {
    if (window.scrollY > 0)
    {
        menu.classList.add('scrolled');
        nav.classList.add('scrolled');
    } else
    {
        menu.classList.remove('scrolled');
        nav.classList.remove('scrolled');
    }
});

/* CARROUSEL */


