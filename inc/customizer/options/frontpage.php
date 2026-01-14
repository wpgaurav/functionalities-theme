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

        // Add Specific Content Controls
        self::add_hero_content_controls( $wp_customize );
        self::add_features_content_controls( $wp_customize );
        self::add_latest_posts_content_controls( $wp_customize );
        self::add_featured_posts_content_controls( $wp_customize );
        self::add_cta_content_controls( $wp_customize );
        self::add_faq_content_controls( $wp_customize );
        self::add_testimonials_content_controls( $wp_customize );
        self::add_contact_content_controls( $wp_customize );
        self::add_custom_html_content_controls( $wp_customize );
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

    /**
     * Features Content
     */
    private static function add_features_content_controls( $wp_customize ) {
        $section = 'ft_frontpage_features';
        
        $wp_customize->add_setting( 'ft_features_title', array(
            'default' => __( 'Our Features', 'functionalities-theme' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_features_title', array(
            'label' => __( 'Section Title', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );

        for ( $i = 1; $i <= 3; $i++ ) {
            $wp_customize->add_setting( "ft_feature_{$i}_title", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( "ft_feature_{$i}_title", array( 'label' => sprintf( __( 'Feature %d Title', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'text' ) );

            $wp_customize->add_setting( "ft_feature_{$i}_text", array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
            $wp_customize->add_control( "ft_feature_{$i}_text", array( 'label' => sprintf( __( 'Feature %d Text', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'textarea' ) );

            $wp_customize->add_setting( "ft_feature_{$i}_icon", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( "ft_feature_{$i}_icon", array( 'label' => sprintf( __( 'Feature %d Icon (e.g., wordpress)', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'text' ) );
        }
    }

    /**
     * Latest Posts Content
     */
    private static function add_latest_posts_content_controls( $wp_customize ) {
        $section = 'ft_frontpage_latest_posts';
        
        $wp_customize->add_setting( 'ft_latest_posts_title', array(
            'default' => __( 'Latest News', 'functionalities-theme' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_latest_posts_title', array(
            'label' => __( 'Section Title', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );

        $wp_customize->add_setting( 'ft_latest_posts_count', array(
            'default' => 3,
            'sanitize_callback' => 'absint',
        ) );
        $wp_customize->add_control( 'ft_latest_posts_count', array(
            'label' => __( 'Number of Posts', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'number',
        ) );
    }

    /**
     * Featured Posts Content
     */
    private static function add_featured_posts_content_controls( $wp_customize ) {
        $section = 'ft_frontpage_featured_posts';
        
        $wp_customize->add_setting( 'ft_featured_posts_title', array(
            'default' => __( 'Featured Posts', 'functionalities-theme' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_featured_posts_title', array(
            'label' => __( 'Section Title', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );

        $wp_customize->add_setting( 'ft_featured_posts_ids', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_featured_posts_ids', array(
            'label' => __( 'Post IDs (comma separated)', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );
    }

    /**
     * CTA Content
     */
    private static function add_cta_content_controls( $wp_customize ) {
        $section = 'ft_frontpage_cta';
        
        $wp_customize->add_setting( 'ft_cta_title', array(
            'default' => __( 'Ready to get started?', 'functionalities-theme' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_cta_title', array(
            'label' => __( 'Title', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );

        $wp_customize->add_setting( 'ft_cta_text', array(
            'default' => __( 'Join us today.', 'functionalities-theme' ),
            'sanitize_callback' => 'wp_kses_post',
        ) );
        $wp_customize->add_control( 'ft_cta_text', array(
            'label' => __( 'Description', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'textarea',
        ) );

        $wp_customize->add_setting( 'ft_cta_btn_text', array(
            'default' => __( 'Sign Up Now', 'functionalities-theme' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_cta_btn_text', array(
            'label' => __( 'Button Text', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );

        $wp_customize->add_setting( 'ft_cta_btn_url', array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'ft_cta_btn_url', array(
            'label' => __( 'Button URL', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'url',
        ) );
    }

    /**
     * FAQ Content
     */
    private static function add_faq_content_controls( $wp_customize ) {
        $section = 'ft_frontpage_faq';
        
        $wp_customize->add_setting( 'ft_faq_title', array(
            'default' => __( 'Frequently Asked Questions', 'functionalities-theme' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_faq_title', array(
            'label' => __( 'Section Title', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );

        for ( $i = 1; $i <= 5; $i++ ) {
            $wp_customize->add_setting( "ft_faq_{$i}_question", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( "ft_faq_{$i}_question", array( 'label' => sprintf( __( 'Question %d', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'text' ) );

            $wp_customize->add_setting( "ft_faq_{$i}_answer", array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
            $wp_customize->add_control( "ft_faq_{$i}_answer", array( 'label' => sprintf( __( 'Answer %d', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'textarea' ) );
        }
    }

    /**
     * Testimonials Content
     */
    private static function add_testimonials_content_controls( $wp_customize ) {
        $section = 'ft_frontpage_testimonials';
        
        $wp_customize->add_setting( 'ft_testimonials_title', array(
            'default' => __( 'Testimonials', 'functionalities-theme' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_testimonials_title', array(
            'label' => __( 'Section Title', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );

        for ( $i = 1; $i <= 3; $i++ ) {
            $wp_customize->add_setting( "ft_testimonial_{$i}_text", array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
            $wp_customize->add_control( "ft_testimonial_{$i}_text", array( 'label' => sprintf( __( 'Testimonial %d Text', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'textarea' ) );

            $wp_customize->add_setting( "ft_testimonial_{$i}_author", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( "ft_testimonial_{$i}_author", array( 'label' => sprintf( __( 'Testimonial %d Author', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'text' ) );
        }
    }

    /**
     * Contact Content
     */
    private static function add_contact_content_controls( $wp_customize ) {
        $section = 'ft_frontpage_contact';
        
        $wp_customize->add_setting( 'ft_contact_title', array(
            'default' => __( 'Contact Us', 'functionalities-theme' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_contact_title', array(
            'label' => __( 'Section Title', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );

        $wp_customize->add_setting( 'ft_contact_text', array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        ) );
        $wp_customize->add_control( 'ft_contact_text', array(
            'label' => __( 'Description', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'textarea',
        ) );

        $wp_customize->add_setting( 'ft_contact_shortcode', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_contact_shortcode', array(
            'label' => __( 'Form Shortcode', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'text',
        ) );
    }

    /**
     * Custom HTML Content
     */
    private static function add_custom_html_content_controls( $wp_customize ) {
        $section = 'ft_frontpage_custom_html';
        
        $wp_customize->add_setting( 'ft_custom_html_content', array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post', // or custom sanitization for raw html allow
        ) );
        $wp_customize->add_control( 'ft_custom_html_content', array(
            'label' => __( 'HTML Content', 'functionalities-theme' ),
            'section' => $section,
            'type' => 'textarea',
        ) );
    }
}
