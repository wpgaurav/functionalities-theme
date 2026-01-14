<?php
/**
 * Functionalities Theme functions and definitions
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme version and constants
 */
define( 'FT_VERSION', '1.0.0' );
define( 'FT_DIR', get_template_directory() );
define( 'FT_URL', get_template_directory_uri() );

/**
 * Theme setup
 */
function ft_setup() {
    // Add default posts and comments RSS feed links
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 630, true );

    // Custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ) );

    // Block editor support
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'f0f0f1',
    ) );

    // Register menus
    register_nav_menus( array(
        'primary'    => esc_html__( 'Primary Menu', 'functionalities-theme' ),
        'footer'     => esc_html__( 'Footer Menu', 'functionalities-theme' ),
        'footer-2'   => esc_html__( 'Footer Menu 2', 'functionalities-theme' ),
        'footer-3'   => esc_html__( 'Footer Menu 3', 'functionalities-theme' ),
        'topbar'     => esc_html__( 'Top Bar Menu', 'functionalities-theme' ),
    ) );

    // Load text domain
    load_theme_textdomain( 'functionalities-theme', FT_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'ft_setup' );

/**
 * Set content width
 */
function ft_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'ft_content_width', 1200 );
}
add_action( 'after_setup_theme', 'ft_content_width', 0 );

/**
 * Register widget areas
 */
function ft_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'functionalities-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'functionalities-theme' ),
        'before_widget' => '<section id="%1$s" class="ft-widget ft-card %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="ft-widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'functionalities-theme' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'First footer widget area.', 'functionalities-theme' ),
        'before_widget' => '<div id="%1$s" class="ft-footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'functionalities-theme' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Second footer widget area.', 'functionalities-theme' ),
        'before_widget' => '<div id="%1$s" class="ft-footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'functionalities-theme' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Third footer widget area.', 'functionalities-theme' ),
        'before_widget' => '<div id="%1$s" class="ft-footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'ft_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function ft_scripts() {
    // Main stylesheet
    wp_enqueue_style( 'functionalities-theme-style', get_stylesheet_uri(), array(), FT_VERSION );

    // Main script
    wp_enqueue_script( 'functionalities-theme-scripts', FT_URL . '/assets/js/main.js', array(), FT_VERSION, true );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ft_scripts' );

/**
 * Load Customizer settings
 */
require_once FT_DIR . '/inc/customizer.php';

/**
 * Load template functions
 */
require_once FT_DIR . '/inc/template-functions.php';

/**
 * Load template tags
 */
require_once FT_DIR . '/inc/template-tags.php';

/**
 * Add body classes
 */
function ft_body_classes( $classes ) {
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    if ( is_singular() ) {
        $classes[] = 'singular';
    }

    if ( is_front_page() && ! is_home() ) {
        $classes[] = 'front-page';
    }

    return $classes;
}
add_filter( 'body_class', 'ft_body_classes' );

/**
 * Custom excerpt length
 */
function ft_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'ft_excerpt_length' );

/**
 * Custom excerpt more
 */
function ft_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'ft_excerpt_more' );

/**
 * Output custom CSS from Customizer
 */
function ft_customizer_css() {
    $primary_color = get_theme_mod( 'ft_primary_color', '#2271b1' );
    
    if ( $primary_color !== '#2271b1' ) {
        $css = sprintf(
            ':root { --ft-primary: %s; --ft-primary-dark: %s; --ft-primary-light: %s; }',
            esc_attr( $primary_color ),
            esc_attr( ft_adjust_brightness( $primary_color, -20 ) ),
            esc_attr( ft_adjust_brightness( $primary_color, 40 ) )
        );
        
        wp_add_inline_style( 'functionalities-theme-style', $css );
    }
}
add_action( 'wp_enqueue_scripts', 'ft_customizer_css', 20 );

/**
 * Helper function to adjust color brightness
 */
function ft_adjust_brightness( $hex, $steps ) {
    $hex = str_replace( '#', '', $hex );
    
    $r = hexdec( substr( $hex, 0, 2 ) );
    $g = hexdec( substr( $hex, 2, 2 ) );
    $b = hexdec( substr( $hex, 4, 2 ) );
    
    $r = max( 0, min( 255, $r + $steps ) );
    $g = max( 0, min( 255, $g + $steps ) );
    $b = max( 0, min( 255, $b + $steps ) );
    
    return '#' . sprintf( '%02x%02x%02x', $r, $g, $b );
}
