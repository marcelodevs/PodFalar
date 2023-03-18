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
