
jQuery( document ).ready(function( $ ) {

    requestAnimationFrame(function() {
        lazyimages.initAllLazyBackgroundImages();
        lazyimages.initAllLazyImages();
        initThumbnailSliders();
    });
});
