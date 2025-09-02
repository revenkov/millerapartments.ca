/**
 * jQuery Validation Custom methods
 */
jQuery.validator && jQuery.validator.setDefaults({
    ignore: [],
    errorElement: "span",
    // any other default options and/or rules
    errorPlacement: function(error, element) {
        error.appendTo( element.parents('.fieldBlock') );
    }
});


jQuery.ajaxSetup({
    url: selectrum.ajax_url,
    //global: false, //disables global handlers
    type: "POST",
    //dataType: 'json',
    error: function(jqXHR, textStatus, errorThrown) {
        //jQuery.fancybox.open( 'Something went wrong. Please try again later or contact the website administrator.' )
        /*if(textStatus==="timeout") {
            //do something on timeout
        }*/
    }
});


jQuery(document).ready( function($) {
    var $window = $(window);
    var $document = $(document);
    var windowWidth = $window.width();
    var windowHeight = $window.height();
    var $body = $('body');
    var $header = $('#header');
    var $mainNav = $('#mainNav');
    var headerHeight = $header.outerHeight();

    $window.resize(function () {
        windowWidth = $window.width();
        windowHeight = $window.height();
        headerHeight = $header.outerHeight();
    });


    /**
     * Process Scroll event
     */
    var previousScrollTop = 0;
    $window.on("load scroll", function () {
        var scrollTop = $document.scrollTop();
        if (scrollTop > 0) {
            $body.addClass('scrolled');
            $header.addClass('siteHeader--sticky');
            $('#btnMenu').addClass('btnMenu--sticky');

        } else {
            $body.removeClass('scrolled');
            $header.removeClass('siteHeader--sticky');
            $('#btnMenu').removeClass('btnMenu--sticky');
            $mainNav.removeClass('mainNav--sticky');
        }
/*
        $mainNav.toggleClass('mainNav--sticky', scrollTop > 400);
        $mainNav.toggleClass('mainNav--show', scrollTop > $('.heroSection').offset().top + $('.heroSection').outerHeight());

        $('.btnMenu').toggleClass('btnMenu--sticky', scrollTop > 400);
        $('.btnMenu').toggleClass('btnMenu--show', scrollTop > $('.heroSection').offset().top + $('.heroSection').outerHeight());
*/
        previousScrollTop = scrollTop;
    });


    /**
     * Process hash links
     */
    $body.on('click', 'a[href*=\\#]', function (e) {

        if ( $(this).hasClass('ui-tabs-anchor') )
            return false;

        var url = $(this).attr('href');
        var hash = url.substring(url.indexOf('#'));
        if ($(hash).length) {
            e.preventDefault();
            processHash(hash);
        }
    });

    function processHash(hash) {
        var $element = $(hash);
        var hashValue = hash.substr(1);

        if ($element.length) {
            var elementOffset = $element.offset().top;
            var elementHeight = $element.outerHeight();
            var elementCenter = elementOffset + elementHeight/2;

            $('html, body').animate({
                scrollTop: elementHeight > windowHeight ? elementOffset - 50 : elementCenter - windowHeight/2 - 50
            }, 'normal');
        }
    }

    $window.on("load", function () {
        if (window.location.hash) {
            processHash(window.location.hash);
        }
    });


    /**
     * Menu
     */
    var $menu = {
        list: $mainNav,
        btn: $('#btnMenu'),
        btnClose: $('#btnCloseMenu'),
        overlay: $('#navOverlay'),
        init: function () {
            //$menu.list.css('max-height', windowHeight);
            $document.on('scroll', function () {
                //$menu.list.css('max-height', windowHeight);
            });
            //$menu.list.on('click', 'a', $menu.close);
            $menu.btn.on('click', $menu.toggle);
            $menu.btnClose.on('click', $menu.close);
            $menu.list.on('click', '.menu-item-has-children > a', function (e) {
                e.preventDefault();
                if ( windowWidth < 1260 ) {
                    $(this).parents('li').toggleClass('open');
                    $(this).next('ul').slideToggle();
                }
            });

        },
        toggle: function (e) {
            $menu.isOpen() ? $menu.close(e) : $menu.open(e);
        },
        open: function (e) {
            e.stopPropagation();
            $header.addClass('siteHeader--navVisible');
            $menu.btn.addClass('close');
            $menu.btn.find('.btnMenu__text').text( $menu.btn.data('text-close') );
            $menu.list.addClass('mainNav--visible');
            $menu.overlay.addClass('navOverlay--visible');
            //$body.css('overflow', 'hidden');
        },
        close: function (e) {
            $header.removeClass('siteHeader--navVisible');
            $menu.btn.removeClass('close');
            $menu.btn.find('.btnMenu__text').text( $menu.btn.data('text-default') );
            $menu.list.removeClass('mainNav--visible');
            $menu.overlay.removeClass('navOverlay--visible');
            //$body.css('overflow', '');
        },
        isOpen: function () {
            return $menu.list.hasClass('mainNav--visible');
        }
    };
    $menu.init();


    function matchHeightFloorPlans() {
        var height = 0;
        var $items = $('.floorPlans__itemContainer');
        $items.each(function (index, element) {
            $(element).css('height', 'auto');
            height = $(element).outerHeight() > height ? $(element).outerHeight() : height;
        });
        $items.each(function (index, element) {
            $(element).css('height', windowWidth < 1260 ? 'auto' : height + 'px');
        })
    }
    matchHeightFloorPlans();
    $window.resize(matchHeightFloorPlans);



    $('.gallerySlider__slider').owlCarousel({
        items: 1,
        nav: true,
        navText: [],
        dots: true,
        loop: true,
        autoplay: true
    });


    /**
     * Parallax
     */
    $window.on("load scroll", function () {
        if ( windowWidth >= 768 ) {
            var scrollTop = $document.scrollTop();
            var centerScreen = scrollTop + windowHeight/2;
            $('.parallax').each(function (index, element) {
                var elementTop = $(element).offset().top;
                var elementOffset = elementTop < scrollTop + windowHeight ? (-scrollTop - windowHeight/2 + elementTop) / (windowWidth<1260?15:10) : 0;
                $(element).css('margin-top', elementOffset);
            });
        }
    });


    $(":file").jfilestyle({
        text: "Attach resume",
        onChange: function (files) {
            $('.fieldBlock--fileName').text(files[0].name);
        }
    });


    $document.on('click', '.accordion__item', function () {
        $(this).toggleClass('active');
        $(this).find('.accordion__content').slideToggle();
    });
    $('.accordion__content').on('click', function (e) {
        e.stopPropagation();
    });


    $.fancybox.defaults.closeExisting = true;
    $.fancybox.defaults.hideScrollbar = false;


    var gallerySlider;
    $('[data-fancybox]').fancybox({
        btnTpl: {
            smallBtn:
                '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">CLOSE&nbsp;&nbsp;X</button>'
        },
        touch: false,
        afterShow: function ( instance, slide ) {
            gallerySlider = tns({
                container: slide.$slide.find('.popupGallery__slides')[0],
                startIndex: slide.opts.$orig.data('fancybox-index'),
                loop: true,
                gutter: 150,
                autoplay: false,
                autoplayButtonOutput: false,
                nav: true,
                navPosition: 'bottom',
                //navContainer: '.propertyGallery__nav',
                //navAsThumbnails: true,
                controls: true,
                controlsPosition: 'bottom',
                controlsText: [
                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.57 39.02">' +
                    '   <polyline fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1.5px" points="20.04 38.49 1.06 19.51 20.04 .53"/>' +
                    '</svg>',
                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.57 39.02">' +
                    '   <polyline fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1.5px" points=".53 .53 19.51 19.51 .53 38.49"/>' +
                    '</svg>'
                ],
                items: 1
            });

            slide.$slide.find('.popupGallery').addClass('visible');
        },
        afterClose: function ( instance, slide ) {
            gallerySlider.destroy();
            $('.popupGallery').removeClass('visible');
        }
    });


    $document.on('click', '.suites__item', function () {
        var id = $(this).data('id');
        if ( windowWidth < 1260 ) {
            $(this).toggleClass('active');
            $('.suites__detail[data-id="'+id+'"]').slideToggle();
        } else {
            $('.suites__item').not(this).removeClass('active');
            $('.suites__detail').removeClass('active');
            $(this).addClass('active');
            $('.suites__detail[data-id="'+id+'"]').addClass('active');
        }
    });
    if ( windowWidth > 1260 ) {
        $('.suites__item:first-child').trigger('click');
    }


    /**
     * Highlight nav items on scroll
     */
    $window.on("load scroll", function() {
        var scrollTop = $document.scrollTop();
        var scrollMiddle = scrollTop + windowHeight/2;
        $('.section').each(function (index, element) {
            var sectionTop = $(element).offset().top;
            var sectionBottom = sectionTop + windowHeight;
            var id = $(element).attr('id');
            var $menuItem = $('.primaryMenu > li > a[href*="#'+id+'"]');
            if ( sectionTop < scrollMiddle && sectionBottom > scrollMiddle && $menuItem.length ) {
                var left = $menuItem.offset().left + $menuItem.outerWidth()/2;
                $('.mainNav__pointer').css('left', left);
            }
        });
    });

    /**
     * Select2
     */
    $('[name="suiteType"]').select2({
        placeholder: 'Desired Suite Type',
        minimumResultsForSearch: Infinity,
        width: '100%'
    });
    $('[name="timeframe"]').select2({
        placeholder: 'Desired Move-in Timeframe',
        minimumResultsForSearch: Infinity,
        width: '100%'
    });
    $('[name="select1"]').select2({
        placeholder: 'For whom are you inquiring? *',
        minimumResultsForSearch: Infinity,
        width: '100%'
    });
    $('[name="select2"]').select2({
        placeholder: 'How did you hear about us? *',
        minimumResultsForSearch: Infinity,
        width: '100%'
    });

	$('[name="preferred-time"]').select2({
        placeholder: 'Preferred Time *',
        minimumResultsForSearch: Infinity,
        width: '100%'
    });
    
    $document.on('wpcf7mailsent', function () {
        $('[name="suiteType"], [name="timeframe"], [name="select1"], [name="select2"]').val('').trigger('change');
    });


    if ( $('.testimonials__carousel').length ) {
        var slider = tns({
            container: '.testimonials__carousel',
            loop: true,
            gutter: 150,
            autoplay: false,
            autoplayButtonOutput: false,
            nav: false,
            navPosition: 'bottom',
            //navContainer: '.propertyGallery__nav',
            //navAsThumbnails: true,
            controls: true,
            controlsPosition: 'bottom',
            controlsText: [
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.57 39.02">' +
                '   <polyline fill="none" stroke="#0b7cab" stroke-miterlimit="10" stroke-width="1.5px" points="20.04 38.49 1.06 19.51 20.04 .53"/>' +
                '</svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.57 39.02">' +
                '   <polyline fill="none" stroke="#0b7cab" stroke-miterlimit="10" stroke-width="1.5px" points=".53 .53 19.51 19.51 .53 38.49"/>' +
                '</svg>'
            ],
            responsive: {
                0: {
                    items: 1,
                    autoHeight: true
                },
                768: {
                    autoHeight: false
                },
                1260: {
                    items: 2
                },
                1700: {
                    items: 3
                }
            }
        });
    }


    //Newsletter form
    var $newsletterForm = $('#newsletterForm');
    $newsletterForm.validate({
        ignore: [],
        rules: {
            'phone': {
                minlength: 10
            },
            'tags[]': {
                required: true
            }
        },
        messages: {
            'tags[]': {
                required: "You must check at least one checkbox",
            }
        },
        submitHandler: function (form) {
            var $form = $(form);
            var $fancybox;
            $.ajax({
                method: 'POST',
                url: selectrum.ajax_url,
                data: $form.serialize(),
                beforeSend: function() {
                    $fancybox = $.fancybox.open('<div class="fancybox-loading"></div>', {
                        touch: false,
                        autoFocus: false,
                        smallBtn: false,
                        toolbar: false,
                        modal: true
                    });
                },
                success: function(response) {
                    $newsletterForm.validate().resetForm();
                    form.reset();
                    $.fancybox.open( response.data.message );
                }
            });
        }
    });


    //Listing pagination
    function initPostsListing() {
        var $listing = $('.postsListing');
        $listing.each(function (index, element) {
            var teasersPerPage = 9;
            var $this = $(element);
            var $teasers = $this.find('.postsListing__teasers');
            var $pagination = $this.find('.postsListing__pagination');
            var responsive = $listing.data('responsive');
            if ( !responsive ) return false;
            for (const key in responsive) {
                var breakpoint = Number.parseInt( key );
                if ( windowWidth >= breakpoint ) {
                    teasersPerPage = responsive[breakpoint];
                }
            }
            var numVisibleTeasers = teasersPerPage;
            $teasers.children().each((index, element) => $(element).toggle( index+1 <= numVisibleTeasers ));
            $pagination.toggle( Boolean( $teasers.find('*:hidden').length ) );
            $pagination.on('click', '.btn', function () {
                numVisibleTeasers += teasersPerPage;
                $teasers.children().each((index, element) => $(element).toggle( index+1 <= numVisibleTeasers ));
                $pagination.toggle( Boolean( $teasers.find('*:hidden').length ) );
            });
        });
    }
    initPostsListing();
});