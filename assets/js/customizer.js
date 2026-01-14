/**
 * Customizer Live Preview
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

(function ($) {
    'use strict';

    // Primary Color
    wp.customize('ft_primary_color', function (value) {
        value.bind(function (to) {
            document.documentElement.style.setProperty('--ft-primary', to);
        });
    });

    // Site Title
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.ft-brand span, .ft-footer-brand').text(to);
        });
    });

    // Site Description
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.ft-hero p').first().text(to);
        });
    });

    // Hero Title
    wp.customize('ft_hero_title', function (value) {
        value.bind(function (to) {
            $('.ft-hero h1').text(to);
        });
    });

    // Hero Description
    wp.customize('ft_hero_description', function (value) {
        value.bind(function (to) {
            $('.ft-hero p').first().text(to);
        });
    });

    // Top Bar Text
    wp.customize('ft_topbar_text', function (value) {
        value.bind(function (to) {
            $('.ft-topbar-title').text(to);
        });
    });

})(jQuery);
