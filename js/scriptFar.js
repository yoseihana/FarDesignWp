(function ($) {
    var $sliderFig = $('#slider-supported figure');
    var $niveau = $('.level');

    //Slider accueil

    // Ajout d'une méthode hasMatched à jQuery, vérifie si il y a ds le sélécteurs jQuery (au moins 1 élément)?
    $.fn.hasMatched = function () {
        return this.length > 0;
    };

    //function self-executed avec comme paramètre le temps du slide en miliseconde
    var slider = (function (delay) {

        //Création de l'object slides
        var slides = {};
        slides.$all = $sliderFig;
        slides.$first = slides.$all.first('figure');
        slides.$last = slides.$all.last('figure');

        //Figure courant visible
        slides.$current = function () {
            var $cur = slides.$all.filter('figure:visible').first();

            //Vérifie que c'est true?
            if (!$cur.hasMatched())
                $cur = slides.$first;

            return $cur;
        };

        //Figure suivante
        slides.$next = function () {
            var $next = slides.$current().next('figure');

            //Vérifie que c'est true?
            if (!$next.hasMatched())
                $next = slides.$first;

            return $next;
        };

        //Figure précédente
        slides.$previous = function () {
            var $prev = slides.$current().prev('figure');

            //Vérifie que c'est true
            if (!$prev.hasMatched())
                $prev = slides.$last;

            return $prev;
        };

        // Hide tous les slides sauf le premier
        slides.$all.not(slides.$current()).hide();

        var nextSlide = function (forward) {
            forward = (typeof forward === "boolean") ? forward : true;
            var $nextFig = (forward) ? slides.$next() : slides.$previous();

            if (slides.$current().add($nextFig).filter(':animated').hasMatched())
                return false; // animation in progress. Cancelling ...

            stopSlider();
            slides.$current().fadeOut('fast', function () {
                $nextFig.fadeIn('fast');
            });
            startSlider();
        };

        //Définition de intervalId avec undefined dedans
        var intervalId = undefined;

        //Lorsque le slider reprend
        var startSlider = function () {
            if (intervalId === undefined) {
                intervalId = setInterval(function () {
                    nextSlide();
                }, delay);

            }
        };

        //Lorsque le slider s'arrête
        var stopSlider = function () {
            if (intervalId !== undefined)
                intervalId = clearInterval(intervalId);
        };

        //Lorsque le slider est en pause
        var pauseSlider = function () {
            if (intervalId !== undefined)
                stopSlider();
            else
                startSlider();
        };

        // Return an API
        return {
            slide: nextSlide,
            start: startSlider,
            pause: pauseSlider
        };

    })(7500); // Slider Interval in ms;

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

    //See website in standard version
    /*var notMobileVersion = function (e) {
        alert('ok');
        $('#styleMobileVersion').attr('disabled', 'disabled');
        $('#jqueryMobileVersion').attr('disabled', 'disabled');
        $('#jqueryMobileScript').attr('disabled', 'disabled');
        $('#defaultStyle').removeAttr('disabled');
        $('html').attr('data-role', 'none');
        $('#mobileVersion').text('Version mobile');


        $('#mobileVersion').on('click', getMobileVersion);
    }

    var getMobileVersion = function(e){
        $('#styleMobileVersion').removeAttr('disabled');
        $('#jqueryMobileVersion').removeAttr('disabled');
        $('#jqueryMobileScript').removeAttr('disabled');
        $('#defaultStyle').attr('disabled', 'disabled');

        $('#mobileVersion').text('Version standard');

        $('#mobileVersion').on('click', notMobileVersion);
    }*/

    //Load de routine
    $(function () {
        // Hereafter use slider.slide, slider.start and slider.pause at will
        slider.start();
        $('.precedent').on('click', function () {
            slider.slide(false)
        });
        $('.suivant').on('click', function () {
            slider.slide();
        });
        $('.pause').on('click', function () {
            slider.pause();
        });

        $niveau.find('.year ol').hide();
        $niveau.find('.subject ul').hide();

        $niveau.find('.year').click(showYear);
        $niveau.find('.subject').click(showThematique);

        $('#slider-not-supported').hide();
        $('#slider-supported').show();

        $('.subject h5:has(em)').addClass('more')


        //Check mobile version
        /*if (jQuery.browser.mobile) {
            //$('.copy p').append(' - <button class="ui-link" id="mobileVersion">Version standard</a>');
            $('.copy p').find('#mobileVersion').on('touchstart click',notMobileVersion);
            $('#defaultStyle').attr('disabled', 'disabled');
        }*/

        //Validation form
        $("#contactForm").validate({
            rules: {
                prenom: {required: true, rangelength: [2, 20]},
                nom: {required: true, rangelength: [2, 20]},
                email: {required: true, email: true, minlength: 8},
                tel: {required: true, rangelength: [8, 15], number: true},
                commentaire: {required: true, rangelength: [10, 300]},
                civilite: {required: true}
            },
            messages: {
                prenom: {required: "Entrez votre prénom", rangelength: "Votre prénom doit avoir minimum 2 lettres et maximum 20 lettres"},
                nom: {required: "Entrez votre nom", rangelength: "Votre prénom doit avoir minimum 2 lettres et maximum 20 lettres"},
                email: {required: "Votre adresse email est necessaire pour vous contacter", email: "Votre adresse email doit être dans ce format nom@domain.com", minlength: "Votre email doit contenir minimum 8 caractères "},
                commentaire: {required: "Entrez un message à nous communiquer", rangelength: "Votre message doit faire minimum 10 caractères et maximum 300 lettres"},
                tel: {required: "Votre numéro de téléphone est nécessaire pour vous rapidement", rangelength: "Le numéro de téléphone doit avoir minimum 8 chiffres et maximum 15 lettres", number: "Le numéro de téléphone doit contenir uniquement des nombres"},
                civilite: {required: 'Votre civilitée est necessaire'},

            },

            submitHandler: function (form) {
                form.submit();
            }
        });

        $("#loginform").validate({
            rules: {
                log: {required: true, minlength: 3},
                pwd: {required: true, minlength: 3},
            },
            messages: {
                log: {required: "Entrez votre identifiant", minlength: "Votre identifiant doit avoir minimum 3 caractères"},
                pwd: {required: "Entrez votre mot de passe", minlength: "Votre mot de passe doit avoir minimum 3 caractères"},
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        //END form validation
    });

})(jQuery);