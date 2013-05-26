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
                email: {required: "Votre adresse email est necessaire pour vous contacter", email: "Votre adresse email doit être dans ce format nom@domain.com", minlength: jQuery.format("Votre email doit avoir minimum 8 caractères ")},
                commentaire: {required: "Entrez un message à nous communiquer", rangelength: "Votre message doit faire minimum 10 caractères et maximum 300 lettres"},
                tel: {required: "Votre numéro de téléphone est nécessaire pour vous rapidement", rangelength: "Le numéro de téléphone doit avoir minimum 8 chiffres et maximum 15 lettres", number: "Le numéro de téléphone doit contenir uniquement des nombres"},
                civilite: {required: 'Votre civilitée est necessaire'},

                submitHandler: function (e) {
                    $("#contactForm").find(".legend").
                        text("Merci, votre message a été envoyé. Celui-ci sera traité par le secrétariat. Une secrétaire vous recontacteras dans les plus bref délais.")
                }
            }
        });


        //END
    });

})(jQuery);