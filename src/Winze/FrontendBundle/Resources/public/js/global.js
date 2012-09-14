$(function(){
    /* $('.diaporama').slides({
        preload: true,
        preloadImage: 'images/loading.gif',
        effect: 'slide, fade',
        crossfade: true,
        slideSpeed: 350,
        fadeSpeed: 500,
        generateNextPrev: true,
        generatePagination: false
    });*/
    Galleria.loadTheme('/bundles/winzefrontend/galleria/themes/winze/galleria.winze.js');
    Galleria.configure({
        imageCrop: true,
        transition: 'slide',
        autoplay: 5000,
        trueFullscreen: true,
        width: 250,
        height: 250,
        lightbox: true,
        preloads :2
    });
    Galleria.run('.diaporama');
});