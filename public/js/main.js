/*

Template 2089 Meteor

http://www.tooplate.com/view/2089-meteor

*/

jQuery(document).ready(function($) {
    "use strict";

    $(".counter").each(function() {
        var $this = $(this),
            countTo = $this.attr("data-count");

        $({ countNum: $this.text() }).animate(
            {
                countNum: countTo
            },

            {
                duration: 8000,
                easing: "linear",
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                    //alert('finished');
                }
            }
        );
    });

    $(".blog-item").click(function(e) {
        const $popup = document.querySelector(".pop");
        const text = e.currentTarget.querySelector(".article-content")
            .innerHTML;

        $popup.querySelector("[data-pop-up-content]").innerHTML = text;
        $($popup).fadeIn(300);
    });

    $(".pop > span, .pop").click(function() {
        $(".pop").fadeOut(300);
    });

    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 100) {
            $(".header").addClass("active");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $(".header").removeClass("active");
        }
    });

    /************** Mixitup (Filter Projects) *********************/
    $(".projects-holder").mixitup({
        effects: ["fade", "grayscale"],
        easing: "snap",
        transitionSpeed: 400
    });
});
