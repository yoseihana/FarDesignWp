(function ($) {
    var $slider = $('.slider figure');
    var $niveau = $('.niveau');
    var $submenu = $('.submenu');
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

    //Show Thematique
    var toggleYear = function (e) {
        e.stopPropagation(); // Prevent parent DOM tree element events to be propagated
        $(e.target).parents('.year').find('ol').toggle();
    };

    //Show documents
    var toggleThematique = function (e) {
        e.stopPropagation(); // Prevent parent DOM tree element events to be propagated
        $(e.target).parents('.thematique').find('ul').toggle();

    };

    //Load de routine
    $(function () {
        $slider.not(":first").hide();

        $niveau.find('.year ol').hide();
        $niveau.find('.thematique ul').hide();

        $niveau.find('.year').click(toggleYear);
        $niveau.find('.thematique').click(toggleThematique);

        setInterval(switchImg, delay);
        $('.precedent').on('click', previousImg);
        $('.suivant').on('click', switchImg);
    });

})(jQuery);