"use strict";
jQuery(document).ready(function(o) {
    var e = window.location.pathname.split("/").pop();
    function s() {
        if (o(window).width() < 991) {
            if (o(".has-submenu i").length === 0) {
                o("header .has-submenu").append('<i role="button" class="fa fa-angle-down"></i>');
                o("header .has-submenu i").addClass("hide-drop");
            }
    
            o("header .has-submenu i").on("click", function() {
                if (!o(this).hasClass("animation")) {
                    o(this).parent().toggleClass("is-open");
                    o(this).addClass("animation");
                    o(this).parent().siblings().removeClass("is-open").find(".fa").removeClass("hide-drop").prev(".sub-menu").slideUp(250);
    
                    if (o(this).hasClass("hide-drop")) {
                        if (!o(this).closest(".sub-menu").length) {
                            o(".has-submenu i").addClass("hide-drop").next(".sub-menu").hide(250);
                        }
                        o(this).removeClass("hide-drop").prev(".sub-menu").slideToggle(250);
                    } else {
                        o(this).addClass("hide-drop").prev(".sub-menu").hide(100).find(".has-submenu a").addClass("hide-drop").prev(".sub-menu").hide(250);
                    }
    
                    setTimeout(function() {
                        o("header .codeboxr-main-menu i").removeClass("animation");
                    }, 250);
                }
            });
        } else {
            o("header .has-submenu i").remove();
        }
    }
    
    // Call s() when the document is ready
    $(document).ready(function() {
        s(); // Call the function when the document is ready
    });
    
    // Call s() on window resize
    $(window).resize(function() {
        s(); // Call the function when window is resized
    });
    

    o('.codeboxr-main-menu li a[href="' + (e = "" == e ? "index.html" : e) + '"]').parent().addClass("current-menu-item"), o(".burger-menu").on("click", function() {
        o(".canvas-menu-wrapper").toggleClass("open-menu"), o("body").toggleClass("no-scroll")
    }), o(".close-menu").on("click", function() {
        o(".canvas-menu-wrapper").removeClass("open-menu"), o("body").removeClass("no-scroll")
    }), o(".canvas-menu-content ul li a").on("click", function() {
        o(".canvas-menu-wrapper").removeClass("open-menu")
    }), o(window).on("load", function() {
        s()
    }), window.addEventListener("orientationchange", function() {
        s()
    }, !1), o(window).on("resize", function() {
        s()
    }), o(window).on("scroll", function() {
        o(window).scrollTop() < 150 ? o(".header-fixed").removeClass("showed") : o(".header-fixed").addClass("showed")
    });
    var e = o(".slider-active-wrap");

    e.on("initialized.owl.carousel", function(e) {
        o("#upcoming-area").show();
        o(".upcoming-event-content").owlCarousel({
            nav: true,
            loop: true,
            items: 1,
            dots: false,
            autoplay: true, // Enable autoplay for this carousel
            autoplayTimeout: 4000, // Adjust autoplay speed if needed
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"]
        });
        
    });
    
    
    e.owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000, // Adjust the autoplay speed here (in milliseconds)
        // animateOut: "fadeOut", // Animation style for item transition
        // animateIn: "fadeIn" // If needed, specify the animation style for item entrance
    });
    e.owlCarousel({
        callbacks: !0
    }), o(".social-networks-icon").addClass("social-networks-icon-display"), o(".upcoming-event-content").owlCarousel({
        nav: !0,
        loop: !0,
        items: 1,
        dots: !1,
        autoPlay: !1,
        navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"]
    }), o(".funfact-count").counterUp({
        delay: 50,
        time: 1e3
    }), o(".gallery-gird").isotope(), o(".gallery-menu span").on("click", function() {
        o(".gallery-menu span").removeClass("active"), o(this).addClass("active");
        var e = o(this).attr("data-filter");
        return o(".gallery-gird").isotope({
            filter: e
        }), !1
    }), o(".single-gallery-item").magnificPopup({
        delegate: "a",
        type: "image",
        mainClass: "mfp-fade",
        removalDelay: 300,
        gallery: {
            enabled: !0
        }
    }), o(".video-popup").magnificPopup({
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 300
    }), o(".smooth-scroll").smoothScroll({
        speed: 1e3,
        easing: "swing"
    }), o(".people-to-say-wrapper").owlCarousel({
        nav: !1,
        loop: !0,
        items: 3,
        dots: !1,
        autoPlay: !0,
        margin: 30,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    }), o("select").niceSelect(), o(".event-thumbnail-carousel").owlCarousel({
        items: 1,
        loop: !0,
        dots: !1,
        nav: !0,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    }), o(".scroll-top").on("click", function() {
        return o("html").animate({
            scrollTop: 0
        }, 2e3), !1
    }), o(".event-countdown-counter").each(function(e, s) {
        var a = o(s),
            s = a.data("date");
        a.countdown(s, function(e) {
            o(this).html(e.strftime('<div class="counter-item"><span class="counter-label">Days</span><span class="single-cont">%D</span></div><div class="counter-item"><span class="counter-label">Hr</span><span class="single-cont">%H</span></div><div class="counter-item"><span class="counter-label">Min</span><span class="single-cont">%M</span></div><div class="counter-item"><span class="counter-label">Sec</span><span class="single-cont">%S</span></div>'))
        })
    }), o(window).scroll(function() {
        500 <= o(window).scrollTop() ? o(".scroll-top").fadeIn() : o(".scroll-top").fadeOut()
    });
    for (var r = window.location.protocol + "//" + window.location.host, a = window.location.pathname.split("/"), n = 1; n < a.length - 1; n++) r += "/", r += a[n];
    o("form#cbx-contact-form").validate({
        submitHandler: function(e) {
            var a = o(e);
            return o.ajax({
                url: r + "/php/contact.php",
                type: "post",
                data: a.serialize(),
                success: function(s) {
                    try {
                        (s = o.parseJSON(s)).validation_error ? o.each(s.error_field, function(e) {
                            0 == o("label#" + s.error_field[e] + "-error").length && o("#" + s.error_field[e]).after('<label class="error" for="' + s.error_field[e] + '" id="' + s.error_field[e] + '-error"></label>'), o("label#" + s.error_field[e] + "-error").text(s.message[s.error_field[e]])
                        }) : (s.error ? (o("#cbx-formalert").addClass("alert alert-danger").html(s.successmessage), (new AWN).alert("Something is wrong. Message sending failed!", {
                            durations: {
                                success: 0
                            }
                        })) : (o("#cbx-formalert").addClass("alert alert-success").html(s.successmessage), (new AWN).success("Message sent successfully", {
                            durations: {
                                success: 0
                            }
                        })), a[0].reset())
                    } catch (e) {
                        a[0].reset()
                    }
                },
                error: function(e) {
                    a[0].reset()
                }
            }), !1
        },
        rules: {
            cbxname: {
                required: !0
            },
            cbxemail: {
                required: !0,
                email: !0
            },
            cbxmessage: {
                required: !0
            },
            cbxsubject: {
                required: !0
            }
        }
    }), o("form#cbx-subscribe-form").validate({
        submitHandler: function(e) {
            var s = o(e);
            return o.ajax({
                url: r + "/php/subscribe.php",
                type: "post",
                data: s.serialize(),
                success: function(e) {
                    s.find("cbx-subscribe-form-error").html("");
                    try {
                        (e = o.parseJSON(e)).validation_error ? s.find("#cbx-subscribe-form-error").html('<label id="subscribe-error" class="error" for="subscribe">' + e.message.email + "</label>") : (e.error ? s.find("#cbx-subscribe-form-error").html('<label id="subscribe-error" class="error" for="subscribe">' + e.successmessage + "</label>") : s.find("#cbx-subscribe-form-error").html('<label id="subscribe-success" class="success" for="subscribe">' + e.successmessage + "</label>"), s[0].reset())
                    } catch (e) {
                        s[0].reset()
                    }
                },
                error: function(e) {
                    s[0].reset()
                }
            }), !1
        },
        errorPlacement: function(e, s) {
            console.log("dd", s.attr("name")), "email" == s.attr("name") ? o("#cbx-subscribe-form-error").html(e) : e.insertAfter(s)
        },
        rules: {
            email: {
                required: !0,
                email: !0
            }
        }
    }), o(document).ready(function() {
        o(".dropdown-menu a.dropdown-toggle").on("click", function(e) {
            var s = o(this),
                a = o(this).offsetParent(".dropdown-menu");
            return o(this).next().hasClass("show") || o(this).parents(".dropdown-menu").first().find(".show").removeClass("show"), o(this).next(".dropdown-menu").toggleClass("show"), o(this).parent("li").toggleClass("show"), o(this).parents("li.nav-item.dropdown.show").on("hidden.bs.dropdown", function(e) {
                o(".dropdown-menu .show").removeClass("show")
            }), a.parent().hasClass("navbar-nav") || s.next().css({
                top: s[0].offsetTop,
                left: a.outerWidth() - 4
            }), !1
        })
    })
});