(function ($) {
    var $slider = $('#slider-supported figure');
    var $niveau = $('.level');
    var delay = 7000;

    //Slider accueil
    var switchImg = function () {

        var $nextImg = $slider.filter(':visible').next();

        if ($nextImg.size() == 0) {
            $nextImg = $slider.first();
        }

        $slider.filter(':visible').fadeOut('slow', function () {
            $nextImg.fadeIn('slow');
        });
    };

    var previousImg = function (e) {
        var $nextImg = $slider.filter(':visible').prev();

        if ($nextImg.size() == 0) {
            $nextImg = $slider.first();
        }

        $slider.filter(':visible').fadeOut('fast', function () {
            $nextImg.fadeIn('fast')
        });
    };

    //


    //Show Thematique
    var showYear = function (e) {
        e.stopPropagation(); // Prevent parent DOM tree element events to be propagated
        var $thematiques = $(e.target).parents('.year').find('ol');
        $('#listingRoot .year > ol:visible').not($thematiques).hide();
        $thematiques.toggle();
    };

    //Show documents
    var showThematique = function (e) {
        e.stopPropagation(); // Prevent parent DOM tree element events to be propagated
        var $documents = $(e.target).parents('.subject').find('ul');
        $('#listingRoot .subject > ul:visible').not($documents).hide();
        $documents.toggle();

    };

    //Load de routine
    $(function () {
        $slider.not(":first").hide();

        $niveau.find('.year ol').hide();
        $niveau.find('.subject ul').hide();

        $niveau.find('.year').click(showYear);
        $niveau.find('.subject').click(showThematique);

        setInterval(switchImg, delay);
        $('.precedent').on('click', previousImg);
        $('.suivant').on('click', switchImg);

        $('#slider-not-supported').hide();
        $('#slider-supported').show();
    });

})(jQuery);