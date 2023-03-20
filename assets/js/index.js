/* TEXTO APARECENDO */

function typeWrite(elemento) {
    // O método .split() é usado para fragmentar o texto e aplicar as propriedades
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    // A cada instante, o forEach vai "atualizar" e vai mostrar uma nova palavra
    textoArray.forEach((letra, i) => {
        /* O método setTimeout é um temporizador, o innerHTML vai ser responsável pelo
        aparecimento das letras*/
        setTimeout(() => elemento.innerHTML += letra, 50 * i)
    });
}

// Seleciona a tag do texto principal do site
const texto = document.querySelector('.podfalar-txt-main');
typeWrite(texto); //Chama a função

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

/* MENU */

var menu = document.getElementById('menu');
var threshold = 50;

window.addEventListener('scroll', function () {
    if (window.pageYOffset > threshold)
    {
        menu.classList.add('scrolled');
    } else
    {
        menu.classList.remove('scrolled');
    }
});

/* NAVBAR RESPONSIVO */

function openNav() {
    alert("TESTE");
}
