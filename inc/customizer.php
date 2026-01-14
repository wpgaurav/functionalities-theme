<?php
/**
 * Customizer settings for Functionalities Theme
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Customizer settings
 */
function ft_customize_register( $wp_customize ) {
    
    // =========================================================================
    // Theme Options Panel
    // =========================================================================
    
    $wp_customize->add_panel( 'ft_theme_options', array(
        'title'       => esc_html__( 'Theme Options', 'functionalities-theme' ),
        'description' => esc_html__( 'Customize the Functionalities Theme appearance.', 'functionalities-theme' ),
        'priority'    => 30,
    ) );
    
    // =========================================================================
    // Branding / Identity (Extending Built-in 'title_tagline')
    // =========================================================================

    // Logo Width
    $wp_customize->add_setting( 'ft_logo_width', array(
        'default'           => '150',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'ft_logo_width', array(
        'label'       => esc_html__( 'Logo Max Width (px)', 'functionalities-theme' ),
        'section'     => 'title_tagline',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 20, 'max' => 500, 'step' => 5 ),
    ) );
    
    // Logo Height (optional constraint)
    $wp_customize->add_setting( 'ft_logo_height', array(
        'default'           => '40',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'ft_logo_height', array(
        'label'       => esc_html__( 'Logo Max Height (px)', 'functionalities-theme' ),
        'section'     => 'title_tagline',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 20, 'max' => 200, 'step' => 5 ),
    ) );

    // Show Title
    $wp_customize->add_setting( 'ft_show_site_title', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'ft_show_site_title', array(
        'label'   => esc_html__( 'Show Site Title', 'functionalities-theme' ),
        'section' => 'title_tagline',
        'type'    => 'checkbox',
    ) );

    // Show Tagline
    $wp_customize->add_setting( 'ft_show_site_tagline', array(
        'default'           => false,
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'ft_show_site_tagline', array(
        'label'   => esc_html__( 'Show Tagline', 'functionalities-theme' ),
        'section' => 'title_tagline',
        'type'    => 'checkbox',
    ) );

    // Site Title Color
    $wp_customize->add_setting( 'ft_site_title_color', array(
        'default'           => '#1d2327',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_site_title_color', array(
        'label'   => esc_html__( 'Site Title Color', 'functionalities-theme' ),
        'section' => 'title_tagline',
    ) ) );

    // Site Title Font Size
    $wp_customize->add_setting( 'ft_site_title_size', array(
        'default'           => '18',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'ft_site_title_size', array(
        'label'       => esc_html__( 'Title Font Size (px)', 'functionalities-theme' ),
        'section'     => 'title_tagline',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 12, 'max' => 48 ),
    ) );

    // Site Title Weight
    $wp_customize->add_setting( 'ft_site_title_weight', array(
        'default'           => '600',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ft_site_title_weight', array(
        'label'   => esc_html__( 'Title Font Weight', 'functionalities-theme' ),
        'section' => 'title_tagline',
        'type'    => 'select',
        'choices' => array(
            '400' => 'Regular',
            '500' => 'Medium',
            '600' => 'Semi-Bold',
            '700' => 'Bold',
            '800' => 'Extra-Bold',
        ),
    ) );
    
    // =========================================================================
    // Colors Section
    
    // =========================================================================
    // Colors Section
    // =========================================================================
    
    $wp_customize->add_section( 'ft_colors', array(
        'title'    => esc_html__( 'Theme Colors', 'functionalities-theme' ),
        'panel'    => 'ft_theme_options',
        'priority' => 10,
    ) );
    
    // Primary Color
    $wp_customize->add_setting( 'ft_primary_color', array(
        'default'           => '#2271b1',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_primary_color', array(
        'label'   => esc_html__( 'Primary Color', 'functionalities-theme' ),
        'section' => 'ft_colors',
    ) ) );
    
    // Success Color
    $wp_customize->add_setting( 'ft_success_color', array(
        'default'           => '#00a32a',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_success_color', array(
        'label'   => esc_html__( 'Success Color', 'functionalities-theme' ),
        'section' => 'ft_colors',
    ) ) );
    
    // Warning Color
    $wp_customize->add_setting( 'ft_warning_color', array(
        'default'           => '#dba617',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_warning_color', array(
        'label'   => esc_html__( 'Warning Color', 'functionalities-theme' ),
        'section' => 'ft_colors',
    ) ) );

    // =========================================================================
    // Typography Panel
    // =========================================================================
    
    $wp_customize->add_panel( 'ft_typography_panel', array(
        'title'    => esc_html__( 'Typography', 'functionalities-theme' ),
        'priority' => 15,
    ) );

    // Base Typography
    $wp_customize->add_section( 'ft_typography_base', array(
        'title'    => esc_html__( 'Base Typography', 'functionalities-theme' ),
        'panel'    => 'ft_typography_panel',
    ) );

    $wp_customize->add_setting( 'ft_body_font_family', array(
        'default'           => 'Inter',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ft_body_font_family', array(
        'label'   => esc_html__( 'Body Font Family', 'functionalities-theme' ),
        'section' => 'ft_typography_base',
        'type'    => 'select',
        'choices' => array(
            'Inter' => 'Inter (Default)',
            'System' => 'System Sans-Serif',
            'Serif'  => 'System Serif',
            'Mono'   => 'Monospace',
        ),
    ) );

    $wp_customize->add_setting( 'ft_base_font_size', array(
        'default'           => '14',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'ft_base_font_size', array(
        'label'       => esc_html__( 'Base Font Size (px)', 'functionalities-theme' ),
        'section'     => 'ft_typography_base',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 12, 'max' => 24 ),
    ) );

    $wp_customize->add_setting( 'ft_body_line_height', array(
        'default'           => '1.6',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ft_body_line_height', array(
        'label'       => esc_html__( 'Line Height', 'functionalities-theme' ),
        'section'     => 'ft_typography_base',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 1, 'max' => 3, 'step' => 0.1 ),
    ) );

    // Headings Typography
    $wp_customize->add_section( 'ft_typography_headings', array(
        'title'    => esc_html__( 'Headings', 'functionalities-theme' ),
        'panel'    => 'ft_typography_panel',
    ) );

    $wp_customize->add_setting( 'ft_headings_font_family', array(
        'default'           => 'Inter',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ft_headings_font_family', array(
        'label'   => esc_html__( 'Headings Font Family', 'functionalities-theme' ),
        'section' => 'ft_typography_headings',
        'type'    => 'select',
        'choices' => array(
            'Inter' => 'Inter (Default)',
            'System' => 'System Sans-Serif',
            'Serif'  => 'System Serif',
        ),
    ) );

    $wp_customize->add_setting( 'ft_headings_weight', array(
        'default'           => '600',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ft_headings_weight', array(
        'label'   => esc_html__( 'Headings Font Weight', 'functionalities-theme' ),
        'section' => 'ft_typography_headings',
        'type'    => 'select',
        'choices' => array(
            '400' => 'Regular (400)',
            '500' => 'Medium (500)',
            '600' => 'Semi-Bold (600)',
            '700' => 'Bold (700)',
            '800' => 'Extra-Bold (800)',
        ),
    ) );

    // =========================================================================
    // Global Design Panel
    // =========================================================================

    $wp_customize->add_panel( 'ft_design_panel', array(
        'title'    => esc_html__( 'Results & Global Design', 'functionalities-theme' ),
        'priority' => 16,
    ) );

    // Buttons
    $wp_customize->add_section( 'ft_design_buttons', array(
        'title'    => esc_html__( 'Buttons', 'functionalities-theme' ),
        'panel'    => 'ft_design_panel',
    ) );

    $wp_customize->add_setting( 'ft_button_radius', array(
        'default'           => '4',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'ft_button_radius', array(
        'label'       => esc_html__( 'Border Radius (px)', 'functionalities-theme' ),
        'section'     => 'ft_design_buttons',
        'type'        => 'number',
    ) );

    // Icons
    $wp_customize->add_section( 'ft_design_icons', array(
        'title'    => esc_html__( 'Icons', 'functionalities-theme' ),
        'panel'    => 'ft_design_panel',
    ) );

    $wp_customize->add_setting( 'ft_icon_stroke_width', array(
        'default'           => '2',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'ft_icon_stroke_width', array(
        'label'       => esc_html__( 'Icon Stroke Width', 'functionalities-theme' ),
        'description' => esc_html__( 'For line icons (px).', 'functionalities-theme' ),
        'section'     => 'ft_design_icons',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 1, 'max' => 4, 'step' => 0.5 ),
    ) );

    // Inputs
    $wp_customize->add_section( 'ft_design_inputs', array(
        'title'    => esc_html__( 'Inputs & Forms', 'functionalities-theme' ),
        'panel'    => 'ft_design_panel',
    ) );

    $wp_customize->add_setting( 'ft_input_bg', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_input_bg', array(
        'label'   => esc_html__( 'Input Background', 'functionalities-theme' ),
        'section' => 'ft_design_inputs',
    ) ) );

    $wp_customize->add_setting( 'ft_input_radius', array(
        'default'           => '4',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'ft_input_radius', array(
        'label'       => esc_html__( 'Input Border Radius (px)', 'functionalities-theme' ),
        'section'     => 'ft_design_inputs',
        'type'        => 'number',
    ) );

    
    // =========================================================================
    // Header Section
    // =========================================================================
    
    $wp_customize->add_section( 'ft_header', array(
        'title'    => esc_html__( 'Header Options', 'functionalities-theme' ),
        'panel'    => 'ft_theme_options',
        'priority' => 20,
    ) );
    
    // Show Top Bar
    $wp_customize->add_setting( 'ft_show_topbar', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control( 'ft_show_topbar', array(
        'label'   => esc_html__( 'Show Top Bar', 'functionalities-theme' ),
        'section' => 'ft_header',
        'type'    => 'checkbox',
    ) );
    
    // Top Bar Text
    $wp_customize->add_setting( 'ft_topbar_text', array(
        'default'           => esc_html__( 'For WordPress', 'functionalities-theme' ),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'ft_topbar_text', array(
        'label'   => esc_html__( 'Top Bar Text', 'functionalities-theme' ),
        'section' => 'ft_header',
        'type'    => 'text',
    ) );
    
    // Sticky Header
    $wp_customize->add_setting( 'ft_sticky_header', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control( 'ft_sticky_header', array(
        'label'   => esc_html__( 'Sticky Header', 'functionalities-theme' ),
        'section' => 'ft_header',
        'type'    => 'checkbox',
    ) );
    
    // =========================================================================
    // Hero Section
    // =========================================================================
    
    $wp_customize->add_section( 'ft_hero', array(
        'title'       => esc_html__( 'Hero Section', 'functionalities-theme' ),
        'description' => esc_html__( 'Settings for the homepage hero section.', 'functionalities-theme' ),
        'panel'       => 'ft_theme_options',
        'priority'    => 30,
    ) );
    
    // Show Hero
    $wp_customize->add_setting( 'ft_show_hero', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control( 'ft_show_hero', array(
        'label'   => esc_html__( 'Show Hero Section on Homepage', 'functionalities-theme' ),
        'section' => 'ft_hero',
        'type'    => 'checkbox',
    ) );
    
    // Hero Badge Text
    $wp_customize->add_setting( 'ft_hero_badge', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'ft_hero_badge', array(
        'label'       => esc_html__( 'Badge Text', 'functionalities-theme' ),
        'description' => esc_html__( 'Small text above the title (e.g., "v1.0 Release")', 'functionalities-theme' ),
        'section'     => 'ft_hero',
        'type'        => 'text',
    ) );
    
    // Hero Title
    $wp_customize->add_setting( 'ft_hero_title', array(
        'default'           => get_bloginfo( 'name' ),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'ft_hero_title', array(
        'label'   => esc_html__( 'Hero Title', 'functionalities-theme' ),
        'section' => 'ft_hero',
        'type'    => 'text',
    ) );
    
    // Hero Description
    $wp_customize->add_setting( 'ft_hero_description', array(
        'default'           => get_bloginfo( 'description' ),
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    $wp_customize->add_control( 'ft_hero_description', array(
        'label'   => esc_html__( 'Hero Description', 'functionalities-theme' ),
        'section' => 'ft_hero',
        'type'    => 'textarea',
    ) );
    
    // Primary Button Text
    $wp_customize->add_setting( 'ft_hero_button_text', array(
        'default'           => esc_html__( 'Get Started', 'functionalities-theme' ),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'ft_hero_button_text', array(
        'label'   => esc_html__( 'Primary Button Text', 'functionalities-theme' ),
        'section' => 'ft_hero',
        'type'    => 'text',
    ) );
    
    // Primary Button URL
    $wp_customize->add_setting( 'ft_hero_button_url', array(
        'default'           => '#',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'ft_hero_button_url', array(
        'label'   => esc_html__( 'Primary Button URL', 'functionalities-theme' ),
        'section' => 'ft_hero',
        'type'    => 'url',
    ) );
    
    // Secondary Button Text
    $wp_customize->add_setting( 'ft_hero_button2_text', array(
        'default'           => esc_html__( 'Learn More', 'functionalities-theme' ),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'ft_hero_button2_text', array(
        'label'   => esc_html__( 'Secondary Button Text', 'functionalities-theme' ),
        'section' => 'ft_hero',
        'type'    => 'text',
    ) );
    
    // Secondary Button URL
    $wp_customize->add_setting( 'ft_hero_button2_url', array(
        'default'           => '#',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'ft_hero_button2_url', array(
        'label'   => esc_html__( 'Secondary Button URL', 'functionalities-theme' ),
        'section' => 'ft_hero',
        'type'    => 'url',
    ) );
    
    // =========================================================================
    // Stats Section
    // =========================================================================
    
    $wp_customize->add_section( 'ft_stats', array(
        'title'       => esc_html__( 'Stats Section', 'functionalities-theme' ),
        'description' => esc_html__( 'Configure the stats displayed in the hero section.', 'functionalities-theme' ),
        'panel'       => 'ft_theme_options',
        'priority'    => 35,
    ) );
    
    // Show Stats
    $wp_customize->add_setting( 'ft_show_stats', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control( 'ft_show_stats', array(
        'label'   => esc_html__( 'Show Stats in Hero', 'functionalities-theme' ),
        'section' => 'ft_stats',
        'type'    => 'checkbox',
    ) );
    
    // Stats (up to 4)
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "ft_stat_{$i}_value", array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        
        $wp_customize->add_control( "ft_stat_{$i}_value", array(
            'label'   => sprintf( esc_html__( 'Stat %d Value', 'functionalities-theme' ), $i ),
            'section' => 'ft_stats',
            'type'    => 'text',
        ) );
        
        $wp_customize->add_setting( "ft_stat_{$i}_label", array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        
        $wp_customize->add_control( "ft_stat_{$i}_label", array(
            'label'   => sprintf( esc_html__( 'Stat %d Label', 'functionalities-theme' ), $i ),
            'section' => 'ft_stats',
            'type'    => 'text',
        ) );
    }
    
    // =========================================================================
    // Footer Section
    // =========================================================================
    
    $wp_customize->add_section( 'ft_footer', array(
        'title'    => esc_html__( 'Footer Options', 'functionalities-theme' ),
        'panel'    => 'ft_theme_options',
        'priority' => 50,
    ) );
    
    // Footer Description
    $wp_customize->add_setting( 'ft_footer_description', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    $wp_customize->add_control( 'ft_footer_description', array(
        'label'   => esc_html__( 'Footer Description', 'functionalities-theme' ),
        'section' => 'ft_footer',
        'type'    => 'textarea',
    ) );
    
    // Copyright Text
    $wp_customize->add_setting( 'ft_copyright_text', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    $wp_customize->add_control( 'ft_copyright_text', array(
        'label'       => esc_html__( 'Copyright Text', 'functionalities-theme' ),
        'description' => esc_html__( 'Use {year} for current year, {site} for site name.', 'functionalities-theme' ),
        'section'     => 'ft_footer',
        'type'        => 'textarea',
    ) );
    
    // =========================================================================
    // Social Links Section
    // =========================================================================
    
    $wp_customize->add_section( 'ft_social', array(
        'title'    => esc_html__( 'Social Links', 'functionalities-theme' ),
        'panel'    => 'ft_theme_options',
        'priority' => 60,
    ) );
    
    $social_networks = array(
        'github'   => 'GitHub',
        'twitter'  => 'Twitter/X',
        'facebook' => 'Facebook',
        'linkedin' => 'LinkedIn',
        'youtube'  => 'YouTube',
    );
    
    foreach ( $social_networks as $network => $label ) {
        $wp_customize->add_setting( "ft_social_{$network}", array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        
        $wp_customize->add_control( "ft_social_{$network}", array(
            'label'   => $label . ' URL',
            'section' => 'ft_social',
            'type'    => 'url',
        ) );
    }
    
    // =========================================================================
    // Layout Section
    // =========================================================================
    
    $wp_customize->add_section( 'ft_layout', array(
        'title'    => esc_html__( 'Layout Options', 'functionalities-theme' ),
        'panel'    => 'ft_theme_options',
        'priority' => 70,
    ) );
    
    // Blog Layout
    $wp_customize->add_setting( 'ft_blog_layout', array(
        'default'           => 'grid',
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'ft_blog_layout', array(
        'label'   => esc_html__( 'Blog Layout', 'functionalities-theme' ),
        'section' => 'ft_layout',
        'type'    => 'select',
        'choices' => array(
            'grid'     => esc_html__( 'Grid', 'functionalities-theme' ),
            'list'     => esc_html__( 'List', 'functionalities-theme' ),
            'cards'    => esc_html__( 'Cards', 'functionalities-theme' ),
        ),
    ) );
    
    // Sidebar Position
    $wp_customize->add_setting( 'ft_sidebar_position', array(
        'default'           => 'right',
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'ft_sidebar_position', array(
        'label'   => esc_html__( 'Sidebar Position', 'functionalities-theme' ),
        'section' => 'ft_layout',
        'type'    => 'select',
        'choices' => array(
            'right' => esc_html__( 'Right', 'functionalities-theme' ),
            'left'  => esc_html__( 'Left', 'functionalities-theme' ),
            'none'  => esc_html__( 'No Sidebar', 'functionalities-theme' ),
        ),
    ) );
}
add_action( 'customize_register', 'ft_customize_register' );

/**
 * Sanitize checkbox
 */
function ft_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Sanitize select
 */
function ft_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Customizer live preview
 */
function ft_customize_preview_js() {
    wp_enqueue_script( 'ft-customizer', FT_URL . '/assets/js/customizer.js', array( 'customize-preview' ), FT_VERSION, true );
}
add_action( 'customize_preview_init', 'ft_customize_preview_js' );

/**
 * Register generic Controls for a Header Section
 */
function ft_register_header_controls( $wp_customize, $section_id, $label ) {
    
    $wp_customize->add_section( $section_id, array(
        'title'    => $label,
        'panel'    => 'ft_layout_panel',
    ) );

    // Show Header
    $wp_customize->add_setting( "{$section_id}_show", array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'ft_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control( "{$section_id}_show", array(
        'label'   => sprintf( esc_html__( 'Show Header on %s', 'functionalities-theme' ), $label ),
        'section' => $section_id,
        'type'    => 'checkbox',
    ) );

    // Custom Title (Optional override)
    $wp_customize->add_setting( "{$section_id}_title", array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( "{$section_id}_title", array(
        'label'       => esc_html__( 'Custom Title Override', 'functionalities-theme' ),
        'description' => esc_html__( 'Leave empty to use the default Page/Post title.', 'functionalities-theme' ),
        'section'     => $section_id,
        'type'        => 'text',
    ) );

    // Custom Description
    $wp_customize->add_setting( "{$section_id}_desc", array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    $wp_customize->add_control( "{$section_id}_desc", array(
        'label'   => esc_html__( 'Description Text', 'functionalities-theme' ),
        'section' => $section_id,
        'type'    => 'textarea',
    ) );

    // Background Color specifically for this header
    $wp_customize->add_setting( "{$section_id}_bg_color", array(
        'default'           => '',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "{$section_id}_bg_color", array(
        'label'   => esc_html__( 'Header Background Color', 'functionalities-theme' ),
        'description' => esc_html__( 'Override global hero color.', 'functionalities-theme' ),
        'section' => $section_id,
    ) ) );
}
