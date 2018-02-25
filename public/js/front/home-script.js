 // Background image by Html data
        var pageSections = document.querySelectorAll('.slide-bg-image, .bg-image');

        Array.from(pageSections).forEach(function(pageSection) {
            if (pageSection.getAttribute('data-background-img') !== null) {
                pageSection.style.backgroundImage = "url(" + pageSection.getAttribute('data-background-img') + ")";
            }
            if (pageSection.getAttribute('data-bg-position-x') !== null) {
                pageSection.style.backgroundPosition = pageSection.getAttribute('data-bg-position-x');
            }
        });

        // Carousels
        tns({
            container: '#new-trending',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            edgePadding: '20px',
            controls: false,
            touch: true,
            mouseDrag: true,
            controlsContainer: ".customize-nav",
            responsive: {
                0: { items: 2 },
                480: { items: 4 },
                1170: { items: 5 }
            },
            nav: true,
        });

        tns({
            container: '#testimonial-container',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            edgePadding: '20px',
            controls: false,
            touch: true,
            mouseDrag: true,
            controlsContainer: ".customize-nav",
            items: 1,
            nav: true,
        });
        tns({
            container: '#brand-logo',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            edgePadding: '20px',
            controls: false,
            touch: true,
            mouseDrag: true,
            controlsContainer: ".customize-nav",
            responsive: {
                480: { items: 3 },
                775: { items: 3 },
                991: { items: 5 },
                1170: { items: 5 }
            },
            nav: false,
        });

        // Slider
        jssor_1_slider_init = function() {
        var jssor_1_SlideoTransitions = [
            [{b:-1,d:1,o:-0.7}],
            [{b:900,d:2000,x:-379,e:{x:7}}],
            [{b:900,d:2000,x:-379,e:{x:7}}],
            [
                {b:-1,d:1,o:-1,sX:2,sY:2},
                {b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},
                {b:900,d:1600,x:-283,o:-1,e:{x:16}}
            ]
        ];
        var jssor_1_options = {
            $AutoPlay: 0,
            $SlideDuration: 800,
            $SlideEasing: $Jease$.$OutQuint,
            $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
        };
        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        var MAX_WIDTH = 3000;

        function ScaleSlider() {
            var bodyWidth = document.body.clientWidth;
            if (bodyWidth)
            jssor_1_slider.$ScaleWidth(Math.min(bodyWidth, 1920));
            else
            $Jssor$.$Delay(ScaleSlider, 30);
        }
        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    };

    jssor_1_slider_init();