jQuery(document).ready(function () {
    "use strict"; var a = jQuery("body").css("direction"); jQuery("#go-up").click(function () { jQuery("body,html").animate({ scrollTop: 0 }, 1e3) }),
        jQuery.custom_bxslider = function () {
            jQuery(".bxslider").bxSlider({ speed: 1e3, pager: !1, mode: "fade", auto: !0, pause: 8e3 })
        }, jQuery.fn.bxSlider && jQuery.custom_bxslider(),
        jQuery.internal_custom_bxslider = function () {
            jQuery(".bxslider-internal").bxSlider({
                pagerCustom: "#bx-pager-internal", speed: 1e3, controls: !1, mode: "fade", auto: !0, pause: 5e3
            })
        }, jQuery.fn.bxSlider && jQuery.internal_custom_bxslider(),
        
        
        jQuery.fn.parsley && jQuery("#contact-form").length !== 0 && jQuery("#contact-form").parsley(),
        jQuery.fn.isMobile && null == isMobile.any() && jQuery("[data-background='parallax']").css("background-size", ""),
        "rtl" === a ?
            jQuery(".datepicker-fields").datepicker({ format: "mm-dd-yyyy", rtl: !0, language: "ar", }) :
            jQuery(".datepicker-fields").datepicker({ format: "mm-dd-yyyy", }),
    //    "rtl" === a ?
    //        jQuery("#booking-tab-contents .booking-dates").datepicker({
    //        format: "mm-dd-yyyy",
    //        rtl: !0, language: "ar",
    //        inputs: jQuery('.booking-date-fields-container')
    //}) :
    //    jQuery("#booking-tab-contents .booking-dates").datepicker({
    //        format: "mm-dd-yyyy",
    //        inputs: jQuery('.booking-date-fields-container')
    //        }),
        jQuery('.event-boxes .book-now, .event-row-container .book-now, #login-form-butt, #register-form-butt').magnificPopup({ type: 'ajax', removalDelay: 600, mainClass: 'mfp-fade' }), jQuery("#style-selector-handle").click(function () { var b = ("rtl" == a) ? "right" : "left"; jQuery(this).hasClass("active") ? (jQuery("#style-selector").css(b, "-165px"), jQuery(this).removeClass("active")) : (jQuery("#style-selector").css(b, "0"), jQuery(this).addClass("active")) }), jQuery('#layout-selector').change(function ()
        { var a = jQuery('#style-selector-box .pattern-selector'); jQuery(this).val() == 2 ? (jQuery('body').addClass('boxed'), a.slideDown()) : (jQuery('body').removeClass('boxed'), a.slideUp()); jQuery('#slider .bx-viewport').css('height', jQuery('#slider .active-slide img').height()); }), jQuery('[id*=pattern_]').click(function ()
        { var a = jQuery(this).css('background-image'); jQuery('body').css({ 'background-image': a }); jQuery('[id*=pattern_]').removeClass('selected'); jQuery(this).addClass('selected'); }); jQuery("#style-selector-box [class*=preset_]").click(function () {
            var b = jQuery(this).attr("data-preset-name"); jQuery("#main-style-file").attr("href"); var d = jQuery("#style-selector-box .selected[class*=preset_]").attr("data-preset-name"); if ("0" === b) { if ("rtl" == a) var e = jQuery("#main-style-file").attr("href").replace("styles-rtl_" + d, "styles-rtl"); else var e = jQuery("#main-style-file").attr("href").replace("styles_" + d, "styles"); jQuery("#main-style-file").attr("href", e) } else {
                if ("0" === d)
                    if ("rtl" == a) var e = jQuery("#main-style-file").attr("href").replace("styles-rtl", "styles-rtl_" + b); else var e = jQuery("#main-style-file").attr("href").replace("styles", "styles_" + b); else if ("rtl" == a) var e = jQuery("#main-style-file").attr("href").replace("styles-rtl_" + d, "styles-rtl_" + b); else var e = jQuery("#main-style-file").attr("href").replace("styles_" + d, "styles_" + b); jQuery("#main-style-file").attr("href", e)
            }
            jQuery("#style-selector-box [class*=preset_]").removeClass("selected"), jQuery(this).addClass("selected")
        })
});