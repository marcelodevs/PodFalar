$(document).ready(function () {
    // Função para verificar o slide atual e atualizar o background da div do carrossel
    function updateCarouselBackground() {
        var activeSlideIndex = $('.carousel-item.active').index();
        var carousel = $('#carouselExampleControls');

        // Remover todas as classes relacionadas ao background do carousel
        carousel.removeClass('slide-1 slide-2 slide-3');

        // Adicionar a classe correta de acordo com o slide atual
        if (activeSlideIndex === 0)
        {
            carousel.addClass('slide-1');
        } else if (activeSlideIndex === 1)
        {
            carousel.addClass('slide-2');
        } else if (activeSlideIndex === 2)
        {
            carousel.addClass('slide-3');
        }
    }

    // Atualizar o background quando o slide mudar
    $('#carouselExampleControls').on('slid.bs.carousel', function () {
        updateCarouselBackground();
    });

    // Chamar a função inicialmente para definir o background do slide ativo
    updateCarouselBackground();
});
