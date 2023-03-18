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

/* CAROUSEL */

const btnTheme = document.querySelector('#btn-theme');
const carousel = document.querySelector('.carousel');

btnTheme.addEventListener('click', function () {
    if (carousel.classList.contains('theme-light'))
    {
        carousel.classList.remove('theme-light');
        carousel.classList.add('theme-interm');
    } else
    {
        carousel.classList.remove('theme-interm');
        carousel.classList.add('theme-light');
    }

    carousel.querySelectorAll('li').forEach(function (slide) {
        if (slide.classList.contains('theme-light'))
        {
            slide.classList.remove('theme-light');
            slide.classList.add('theme-interm');
        } else
        {
            slide.classList.remove('theme-interm');
            slide.classList.add('theme-light');
        }
    });
});

const btnPrev = document.querySelector('.carousel-prev');
const btnNext = document.querySelector('.carousel-next');
const carouselList = document.querySelector('.carousel ul');
const carouselItems = document.querySelectorAll('.carousel li');
let currentPosition = 0;

btnPrev.addEventListener('click', function () {
    if (currentPosition > 0)
    {
        currentPosition --;
        carouselList.style.transform = `translateX(-${currentPosition * 33.5}%)`;
    }
});

btnNext.addEventListener('click', function () {
    if (currentPosition < carouselItems.length - 1)
    {
        currentPosition ++;
        carouselList.style.transform = `translateX(-${currentPosition * 33.5}%)`;
    }
});
