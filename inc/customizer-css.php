<?php
/**
 * Functionalities Theme Customizer CSS Output
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Generate CSS from Customizer Options
 */
function ft_customizer_css_output() {
    $styles = array();

    // =========================================================================
    // Colors
    // =========================================================================
    
    $primary = get_theme_mod( 'ft_primary_color', '#2271b1' );
    $success = get_theme_mod( 'ft_success_color', '#00a32a' );
    $warning = get_theme_mod( 'ft_warning_color', '#dba617' );

    $styles[':root'][] = "--primary: {$primary};";
    $styles[':root'][] = "--primary-dark: " . ft_adjust_brightness( $primary, -20 ) . ";";
    $styles[':root'][] = "--primary-light: " . ft_adjust_brightness( $primary, 40 ) . ";";
    $styles[':root'][] = "--success: {$success};";
    $styles[':root'][] = "--warning: {$warning};";

    // =========================================================================
    // Branding
    // =========================================================================
    
    // Logo Size
    $logo_width = get_theme_mod( 'ft_logo_width', '150' );
    $logo_height = get_theme_mod( 'ft_logo_height', '40' );
    $styles['.custom-logo-link img, .brand img'][] = "max-width: {$logo_width}px; max-height: {$logo_height}px; width: auto; height: auto;";
    
    // Site Title
    $title_color = get_theme_mod( 'ft_site_title_color', '#1d2327' );
    $title_size = get_theme_mod( 'ft_site_title_size', '18' );
    $title_weight = get_theme_mod( 'ft_site_title_weight', '600' );
    
    $styles['.brand a'][] = "color: {$title_color}; font-size: {$title_size}px; font-weight: {$title_weight};";

    // =========================================================================
    // Typography
    // =========================================================================
    
    // Body Font
    $body_font = get_theme_mod( 'ft_body_font_family', 'Inter' );
    $body_stack = ft_get_font_stack( $body_font );
    $styles[':root'][] = "--font-family: {$body_stack};";

    // Headings Font
    $headings_font = get_theme_mod( 'ft_headings_font_family', 'Inter' );
    $headings_stack = ft_get_font_stack( $headings_font );
    $styles[':root'][] = "--font-headings: {$headings_stack};";
    
    // Headings Weight
    $headings_weight = get_theme_mod( 'ft_headings_weight', '600' );
    $styles[':root'][] = "--font-weight-headings: {$headings_weight};";

    // Line Heights
    $body_line_height = get_theme_mod( 'ft_body_line_height', '1.6' );
    $styles['body'][] = "line-height: {$body_line_height};";
    
    $headings_line_height = get_theme_mod( 'ft_headings_line_height', '1.3' );
    $styles['h1, h2, h3, h4, h5, h6'][] = "line-height: {$headings_line_height};";

    // Base Font Size
    $base_size = get_theme_mod( 'ft_base_font_size', '14' );
    $styles['body'][] = "font-size: {$base_size}px;";

    // =========================================================================
    // Global Design
    // =========================================================================
    
    // Buttons
    $btn_radius    = get_theme_mod( 'ft_button_radius', '4' );
    $btn_font_size = get_theme_mod( 'ft_button_font_size', '13' );
    $btn_pad_y     = get_theme_mod( 'ft_button_padding_y', '8' );
    $btn_pad_x     = get_theme_mod( 'ft_button_padding_x', '16' );
    $btn_border    = get_theme_mod( 'ft_button_border_width', '1' );

    $styles['.btn, button, input[type="submit"], input[type="button"], input[type="reset"]'][] = "
        border-radius: {$btn_radius}px;
        font-size: {$btn_font_size}px;
        padding: {$btn_pad_y}px {$btn_pad_x}px;
        border-width: {$btn_border}px;
    ";

    // Inputs
    $input_bg = get_theme_mod( 'ft_input_bg', '#ffffff' );
    $input_radius = get_theme_mod( 'ft_input_radius', '4' );
    $styles['input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="date"], textarea, select'][] = "background-color: {$input_bg}; border-radius: {$input_radius}px;";

    // Icons
    $icon_stroke = get_theme_mod( 'ft_icon_stroke_width', '2' );
    $styles['.icon svg, svg'][] = "stroke-width: {$icon_stroke}px;";
    
    // =========================================================================
    // Layout
    // =========================================================================
    
    // Container Width (If I add this control later, I can use it here)
    // For now, let's assume default 1200px from theme.json, but user might want to override.
    // I haven't added the control yet, but I'll add the CSS logic placeholder.
    /*
    $container_width = get_theme_mod( 'ft_container_width', '1200' );
    $styles[':root'][] = "--container-width: {$container_width}px;";
    */

    // =========================================================================
    // Output CSS
    // =========================================================================
    
    $css = '';
    foreach ( $styles as $selector => $properties ) {
        $css .= $selector . ' { ' . implode( ' ', $properties ) . ' }' . "\n";
    }

    wp_add_inline_style( 'functionalities-theme-style', $css );
}
add_action( 'wp_enqueue_scripts', 'ft_customizer_css_output', 100 );

/**
 * Helper: Get Font Stack
 */
function ft_get_font_stack( $key ) {
    switch ( $key ) {
        case 'Inter':
            return '"Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif';
        case 'System':
            return '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif';
        case 'Serif':
            return 'Constantia, "Lucida Bright", Lucidabright, "Lucida Serif", Lucida, "DejaVu Serif", "Bitstream Vera Serif", "Liberation Serif", Georgia, serif';
        case 'Mono':
            return 'Monaco, Consolas, "Andale Mono", "DejaVu Sans Mono", monospace';
        default:
            return $key;
    }
}
