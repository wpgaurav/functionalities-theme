<?php
/**
 * Global Options Panel
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FT_Customizer_Global {

	/**
	 * Register Settings
	 */
	public static function register( $wp_customize ) {
        
        // =========================================================================
        // Theme Options Panel (Parent Panel)
        // =========================================================================
        $wp_customize->add_panel( 'ft_theme_options_panel', array(
            'title'       => esc_html__( 'Theme Options', 'functionalities-theme' ),
            'priority'    => 20,
        ) );

        // =========================================================================
        // Global Settings Sub-Panel
        // =========================================================================
        $wp_customize->add_panel( 'ft_global_panel', array(
            'title'       => esc_html__( 'Global Options', 'functionalities-theme' ),
            'panel'       => 'ft_theme_options_panel',
            'priority'    => 10,
        ) );

        self::register_branding( $wp_customize );
        self::register_colors( $wp_customize );
        self::register_typography( $wp_customize );
        self::register_design( $wp_customize );
        self::register_header_options( $wp_customize );
        self::register_footer_options( $wp_customize );
        self::register_social_options( $wp_customize );
    }

    /**
     * Branding (Actually usually easier to leave in Site Identity, but I'll add refs here if needed)
     */
    public static function register_branding( $wp_customize ) {
        // We modified Site Identity earlier, we can leave it at root or move here.
        // For now, let's keep the extra branding controls we added to 'title_tagline' 
        // as they are logically best placed there (Site Identity).
    }

    /**
     * Colors
     */
    public static function register_colors( $wp_customize ) {
        $wp_customize->add_section( 'ft_colors', array(
            'title'    => esc_html__( 'Colors', 'functionalities-theme' ),
            'panel'    => 'ft_global_panel',
        ) );
        
        // Primary
        $wp_customize->add_setting( 'ft_primary_color', array(
            'default'           => '#2271b1',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
        
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_primary_color', array(
            'label'   => esc_html__( 'Primary Color', 'functionalities-theme' ),
            'section' => 'ft_colors',
        ) ) );
        
        // Success
        $wp_customize->add_setting( 'ft_success_color', array(
            'default'           => '#00a32a',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
        
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_success_color', array(
            'label'   => esc_html__( 'Success Color', 'functionalities-theme' ),
            'section' => 'ft_colors',
        ) ) );
        
        // Warning
        $wp_customize->add_setting( 'ft_warning_color', array(
            'default'           => '#dba617',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
        
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_warning_color', array(
            'label'   => esc_html__( 'Warning Color', 'functionalities-theme' ),
            'section' => 'ft_colors',
        ) ) );
    }

    /**
     * Typography
     */
    public static function register_typography( $wp_customize ) {
        $wp_customize->add_section( 'ft_typography', array(
            'title'    => esc_html__( 'Typography', 'functionalities-theme' ),
            'panel'    => 'ft_global_panel',
        ) );

        $wp_customize->add_setting( 'ft_body_font_family', array(
            'default'           => 'Inter',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
    
        $wp_customize->add_control( 'ft_body_font_family', array(
            'label'   => esc_html__( 'Body Font Family', 'functionalities-theme' ),
            'section' => 'ft_typography',
            'type'    => 'select',
            'choices' => array(
                'Inter' => 'Inter (Default)',
                'System' => 'System Sans-Serif',
                'Serif'  => 'System Serif',
                'Mono'   => 'Monospace',
            ),
        ) );

        // Headings
        $wp_customize->add_setting( 'ft_headings_font_family', array(
            'default'           => 'Inter',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
    
        $wp_customize->add_control( 'ft_headings_font_family', array(
            'label'   => esc_html__( 'Headings Font Family', 'functionalities-theme' ),
            'section' => 'ft_typography',
            'type'    => 'select',
            'choices' => array(
                'Inter' => 'Inter (Default)',
                'System' => 'System Sans-Serif',
                'Serif'  => 'System Serif',
            ),
        ) );

        // Line Height
        $wp_customize->add_setting( 'ft_body_line_height', array(
            'default'           => '1.6',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
    
        $wp_customize->add_control( 'ft_body_line_height', array(
            'label'       => esc_html__( 'Body Line Height', 'functionalities-theme' ),
            'section'     => 'ft_typography',
            'type'        => 'number',
            'input_attrs' => array( 'min' => 1, 'max' => 3, 'step' => 0.1 ),
        ) );
    }

    /**
     * Design & Layout
     */
    public static function register_design( $wp_customize ) {
        $wp_customize->add_section( 'ft_design', array(
            'title'    => esc_html__( 'Layout & Design', 'functionalities-theme' ),
            'panel'    => 'ft_global_panel',
        ) );

        // Button Radius
        $wp_customize->add_setting( 'ft_button_radius', array(
            'default'           => '4',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint',
        ) );
    
        $wp_customize->add_control( 'ft_button_radius', array(
            'label'       => esc_html__( 'Button Border Radius (px)', 'functionalities-theme' ),
            'section'     => 'ft_design',
            'type'        => 'number',
        ) );

        // Inputs
        $wp_customize->add_setting( 'ft_input_bg', array(
            'default'           => '#ffffff',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_input_bg', array(
            'label'   => esc_html__( 'Input Background', 'functionalities-theme' ),
            'section' => 'ft_design',
        ) ) );

        $wp_customize->add_setting( 'ft_input_radius', array(
            'default'           => '4',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint',
        ) );
    
        $wp_customize->add_control( 'ft_input_radius', array(
            'label'       => esc_html__( 'Input Border Radius (px)', 'functionalities-theme' ),
            'section'     => 'ft_design',
            'type'        => 'number',
        ) );

        $wp_customize->add_control( 'ft_sidebar_layout', array(
            'label'   => esc_html__( 'Default Sidebar Position', 'functionalities-theme' ),
            'section' => 'ft_design',
            'type'    => 'select',
            'choices' => array(
                'right' => 'Right Sidebar',
                'left'  => 'Left Sidebar',
                'none'  => 'No Sidebar',
            ),
        ) );
    }

    /**
     * Header Options
     */
    public static function register_header_options( $wp_customize ) {
        $wp_customize->add_section( 'ft_header', array(
            'title'    => esc_html__( 'Header / Top Bar', 'functionalities-theme' ),
            'panel'    => 'ft_global_panel',
        ) );

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
    }

    /**
     * Footer Options
     */
    public static function register_footer_options( $wp_customize ) {
        $wp_customize->add_section( 'ft_footer', array(
            'title'    => esc_html__( 'Footer', 'functionalities-theme' ),
            'panel'    => 'ft_global_panel',
        ) );

        $wp_customize->add_setting( 'ft_copyright_text', array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'wp_kses_post',
        ) );

        $wp_customize->add_control( 'ft_copyright_text', array(
            'label'       => esc_html__( 'Copyright Text', 'functionalities-theme' ),
            'description' => esc_html__( 'Use {year} for year, {site} for sitename.', 'functionalities-theme' ),
            'section'     => 'ft_footer',
            'type'        => 'textarea',
        ) );
    }

    /**
     * Social Options
     */
    public static function register_social_options( $wp_customize ) {
        $wp_customize->add_section( 'ft_social', array(
            'title'    => esc_html__( 'Social Links', 'functionalities-theme' ),
            'panel'    => 'ft_global_panel',
        ) );

        $social_networks = array( 'github' => 'GitHub', 'twitter' => 'Twitter/X', 'facebook' => 'Facebook', 'linkedin' => 'LinkedIn' );
        
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
    }

}
