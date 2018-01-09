var lazyimages = (function(){

    var imageTypes = {
        1: "medium",
        2: "large",
        3: "full-quality"
    };

    var initLazyBackground = function(lazyBackgroundContainer) {
            requestAnimationFrame(function() {
                loadImage(lazyBackgroundContainer, 1, 'background')
            });
    };

    var initLazyImage = function(lazyImageContainer) {
            requestAnimationFrame(function() {
                loadImage(lazyImageContainer, 1, 'image')
            });
    };

    var loadImage = function(lazyContainer, imageType, imageFunction) {
        var nextImage = imageType + 1;
        lazyContainer = $(lazyContainer);

        var imageName = imageTypes[imageType];
        if (imageName === undefined) return;

        var imageUrl = lazyContainer.attr('data-' + imageName);
        if (imageUrl === undefined) return;

        if (imageUrl) {
            var img = $('<img src="' + imageUrl + '" />');
            img.load(function() {
                switch (imageFunction) {
                    case 'background':
                        setBackgroundImage(lazyContainer, imageUrl);
                        break;
                    case 'image':
                        setImage(lazyContainer, imageUrl);
                        break;
                }
                    requestAnimationFrame(function() {
                        loadImage(lazyContainer, nextImage, imageFunction)
                    });
            });
        }
    };

    var setImage = function(lazyImageContainer, imageUrl) {
        lazyImageContainer.attr('src', imageUrl);
    };

    var setBackgroundImage = function(lazyBackgroundContainer, imageUrl) {
        lazyBackgroundContainer.css('background-image', 'url("' + imageUrl + '")');
    };

    var publicApi = {
        initAllLazyBackgroundImages: function(){
            var lazyBackgroundImageContainers = $('.lazy-background-image');
            lazyBackgroundImageContainers.each(function(){
                var lazyBackgroundImageContainer = $(this);
                requestAnimationFrame(function() {
                    initLazyBackground(lazyBackgroundImageContainer)
                });
            })
        },
        initAllLazyImages: function(){
            var lazyImageContainers = $('.lazy-image');
            lazyImageContainers.each(function(){
                var lazyImageContainer = $(this);
                requestAnimationFrame(function() {
                    initLazyImage(lazyImageContainer)
                });
            })
        }
    };
    return publicApi;

})();