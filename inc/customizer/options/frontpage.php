<?php
/**
 * Frontpage Options Panel
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FT_Customizer_Frontpage {

	/**
	 * Register Settings
	 */
	public static function register( $wp_customize ) {
        
        $wp_customize->add_panel( 'ft_frontpage_panel', array(
            'title'       => esc_html__( 'Frontpage Options', 'functionalities-theme' ),
            'panel'       => 'ft_theme_options_panel',
            'priority'    => 20,
        ) );

        // Helper to register simple section controls
        self::register_section_controls( $wp_customize, 'hero', 'Hero Section', 10 );
        self::register_section_controls( $wp_customize, 'features', 'Features / Modules', 20 );
        self::register_section_controls( $wp_customize, 'latest_posts', 'Latest Posts', 30 );
        self::register_section_controls( $wp_customize, 'featured_posts', 'Featured Posts', 40 );
        self::register_section_controls( $wp_customize, 'cta', 'Call to Action', 50 );
        self::register_section_controls( $wp_customize, 'faq', 'FAQ Section', 60 );
        self::register_section_controls( $wp_customize, 'testimonials', 'Testimonial Section', 70 );
        self::register_section_controls( $wp_customize, 'contact', 'Contact Section', 80 );
        self::register_section_controls( $wp_customize, 'custom_html', 'Custom HTML', 90 );

        // Add Specific Content Controls for Hero (Ported from old Customizer)
        self::add_hero_content_controls( $wp_customize );
    }

    /**
     * Reusable registration for a generic frontpage section (Toggle + Priority)
     */
    private static function register_section_controls( $wp_customize, $id, $label, $default_priority ) {
        $section_id = 'ft_frontpage_' . $id;

        $wp_customize->add_section( $section_id, array(
            'title'    => $label,
            'panel'    => 'ft_frontpage_panel',
        ) );

        // Enable Toggle
        $wp_customize->add_setting( "ft_{$id}_enable", array(
            'default'           => true,
            'transport'         => 'refresh',
            'sanitize_callback' => 'ft_sanitize_checkbox',
        ) );

        $wp_customize->add_control( "ft_{$id}_enable", array(
            'label'   => sprintf( esc_html__( 'Enable %s', 'functionalities-theme' ), $label ),
            'section' => $section_id,
            'type'    => 'checkbox',
        ) );

        // Priority Order
        $wp_customize->add_setting( "ft_{$id}_priority", array(
            'default'           => $default_priority,
            'transport'         => 'refresh',
            'sanitize_callback' => 'absint',
        ) );

        $wp_customize->add_control( "ft_{$id}_priority", array(
            'label'       => esc_html__( 'Section Priority (Order)', 'functionalities-theme' ),
            'description' => esc_html__( 'Lower numbers display first.', 'functionalities-theme' ),
            'section'     => $section_id,
            'type'        => 'number',
        ) );
    }

    /**
     * Hero Content Specifics
     */
    private static function add_hero_content_controls( $wp_customize ) {
        // Hero Title
        $wp_customize->add_setting( 'ft_hero_title', array(
            'default'           => get_bloginfo( 'name' ),
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_hero_title', array(
            'label'   => esc_html__( 'Hero Title', 'functionalities-theme' ),
            'section' => 'ft_frontpage_hero',
            'type'    => 'text',
        ) );

        // Hero Description
        $wp_customize->add_setting( 'ft_hero_description', array(
            'default'           => get_bloginfo( 'description' ),
            'transport'         => 'postMessage',
            'sanitize_callback' => 'wp_kses_post',
        ) );
        $wp_customize->add_control( 'ft_hero_description', array(
            'label'   => esc_html__( 'Hero Description', 'functionalities-theme' ),
            'section' => 'ft_frontpage_hero',
            'type'    => 'textarea',
        ) );

        // Background Image Support
        $wp_customize->add_setting( 'ft_hero_bg_image', array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ft_hero_bg_image', array(
            'label'    => esc_html__( 'Background Image', 'functionalities-theme' ),
            'section'  => 'ft_frontpage_hero',
        ) ) );

        // Badge
        $wp_customize->add_setting( 'ft_hero_badge', array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_hero_badge', array(
            'label'   => esc_html__( 'Hero Badge Text', 'functionalities-theme' ),
            'section' => 'ft_frontpage_hero',
            'type'    => 'text',
        ) );

        // Button 1
        $wp_customize->add_setting( 'ft_hero_button_text', array(
            'default'           => __( 'Get Started', 'functionalities-theme' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_hero_button_text', array(
            'label'   => esc_html__( 'Button 1 Text', 'functionalities-theme' ),
            'section' => 'ft_frontpage_hero',
            'type'    => 'text',
        ) );
        
        $wp_customize->add_setting( 'ft_hero_button_url', array(
            'default'           => '#',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'ft_hero_button_url', array(
            'label'   => esc_html__( 'Button 1 URL', 'functionalities-theme' ),
            'section' => 'ft_frontpage_hero',
            'type'    => 'url',
        ) );

        // Button 2
        $wp_customize->add_setting( 'ft_hero_button2_text', array(
            'default'           => __( 'Learn More', 'functionalities-theme' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_hero_button2_text', array(
            'label'   => esc_html__( 'Button 2 Text', 'functionalities-theme' ),
            'section' => 'ft_frontpage_hero',
            'type'    => 'text',
        ) );
        
        $wp_customize->add_setting( 'ft_hero_button2_url', array(
            'default'           => '#',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'ft_hero_button2_url', array(
            'label'   => esc_html__( 'Button 2 URL', 'functionalities-theme' ),
            'section' => 'ft_frontpage_hero',
            'type'    => 'url',
        ) );

        // Stats Toggle
        $wp_customize->add_setting( 'ft_show_stats', array(
            'default'           => true,
            'transport'         => 'refresh',
            'sanitize_callback' => 'ft_sanitize_checkbox',
        ) );
        $wp_customize->add_control( 'ft_show_stats', array(
            'label'   => esc_html__( 'Show Stats Row', 'functionalities-theme' ),
            'section' => 'ft_frontpage_hero',
            'type'    => 'checkbox',
        ) );

        // Stats Repeater (Simulated with 4 fixed stats)
        for ( $i = 1; $i <= 4; $i++ ) {
            $wp_customize->add_setting( "ft_stat_{$i}_value", array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control( "ft_stat_{$i}_value", array(
                'label'   => sprintf( esc_html__( 'Stat %d Value', 'functionalities-theme' ), $i ),
                'section' => 'ft_frontpage_hero',
                'type'    => 'text',
            ) );

            $wp_customize->add_setting( "ft_stat_{$i}_label", array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control( "ft_stat_{$i}_label", array(
                'label'   => sprintf( esc_html__( 'Stat %d Label', 'functionalities-theme' ), $i ),
                'section' => 'ft_frontpage_hero',
                'type'    => 'text',
            ) );
        }
    }

}
