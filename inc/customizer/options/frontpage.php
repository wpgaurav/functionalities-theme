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
        $stat_defaults = array(
            1 => array( 'value' => '1.0k+', 'label' => 'Active Users' ),
            2 => array( 'value' => '99.9%', 'label' => 'Uptime' ),
            3 => array( 'value' => '24/7', 'label' => 'Support' ),
            4 => array( 'value' => '5.0', 'label' => 'Rating' ),
        );

        for ( $i = 1; $i <= 4; $i++ ) {
            $wp_customize->add_setting( "ft_stat_{$i}_value", array(
                'default'           => $stat_defaults[$i]['value'],
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control( "ft_stat_{$i}_value", array(
                'label'   => sprintf( esc_html__( 'Stat %d Value', 'functionalities-theme' ), $i ),
                'section' => 'ft_frontpage_hero',
                'type'    => 'text',
            ) );

            $wp_customize->add_setting( "ft_stat_{$i}_label", array(
                'default'           => $stat_defaults[$i]['label'],
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

        $feature_defaults = array(
            1 => array( 'title' => __( 'Fast Performance', 'functionalities-theme' ), 'text' => __( 'Optimized for speed and efficiency to give your users the best experience.', 'functionalities-theme' ), 'icon' => 'zap' ),
            2 => array( 'title' => __( 'Secure by Design', 'functionalities-theme' ), 'text' => __( 'Built with WordPress best practices to keep your site safe and secure.', 'functionalities-theme' ), 'icon' => 'lock' ),
            3 => array( 'title' => __( 'Fully Responsive', 'functionalities-theme' ), 'text' => __( 'Looks great on all devices, from high-res desktops to mobile phones.', 'functionalities-theme' ), 'icon' => 'layout' ),
        );

        for ( $i = 1; $i <= 3; $i++ ) {
            $wp_customize->add_setting( "ft_feature_{$i}_title", array( 'default' => $feature_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( "ft_feature_{$i}_title", array( 'label' => sprintf( __( 'Feature %d Title', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'text' ) );

            $wp_customize->add_setting( "ft_feature_{$i}_text", array( 'default' => $feature_defaults[$i]['text'], 'sanitize_callback' => 'wp_kses_post' ) );
            $wp_customize->add_control( "ft_feature_{$i}_text", array( 'label' => sprintf( __( 'Feature %d Text', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'textarea' ) );

            $wp_customize->add_setting( "ft_feature_{$i}_icon", array( 'default' => $feature_defaults[$i]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
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

        $faq_defaults = array(
            1 => array( 'q' => __( 'What is this theme?', 'functionalities-theme' ), 'a' => __( 'This is a modern WordPress theme inspired by the WP Dashboard UI, designed for developers.', 'functionalities-theme' ) ),
            2 => array( 'q' => __( 'Is it customizable?', 'functionalities-theme' ), 'a' => __( 'Yes! You can change almost everything via the WordPress Customizer.', 'functionalities-theme' ) ),
            3 => array( 'q' => __( 'How do I get support?', 'functionalities-theme' ), 'a' => __( 'You can find documentation and support on our official website.', 'functionalities-theme' ) ),
            4 => array( 'q' => '', 'a' => '' ),
            5 => array( 'q' => '', 'a' => '' ),
        );

        for ( $i = 1; $i <= 5; $i++ ) {
            $wp_customize->add_setting( "ft_faq_{$i}_question", array( 'default' => $faq_defaults[$i]['q'], 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( "ft_faq_{$i}_question", array( 'label' => sprintf( __( 'Question %d', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'text' ) );

            $wp_customize->add_setting( "ft_faq_{$i}_answer", array( 'default' => $faq_defaults[$i]['a'], 'sanitize_callback' => 'wp_kses_post' ) );
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

        $testimonial_defaults = array(
            1 => array( 'text' => __( 'The best theme I\'ve ever used. Clean code and beautiful design.', 'functionalities-theme' ), 'author' => 'John Doe' ),
            2 => array( 'text' => __( 'A game changer for my development workflow. Highly recommended!', 'functionalities-theme' ), 'author' => 'Jane Smith' ),
            3 => array( 'text' => '', 'author' => '' ),
        );

        for ( $i = 1; $i <= 3; $i++ ) {
            $wp_customize->add_setting( "ft_testimonial_{$i}_text", array( 'default' => $testimonial_defaults[$i]['text'], 'sanitize_callback' => 'wp_kses_post' ) );
            $wp_customize->add_control( "ft_testimonial_{$i}_text", array( 'label' => sprintf( __( 'Testimonial %d Text', 'functionalities-theme' ), $i ), 'section' => $section, 'type' => 'textarea' ) );

            $wp_customize->add_setting( "ft_testimonial_{$i}_author", array( 'default' => $testimonial_defaults[$i]['author'], 'sanitize_callback' => 'sanitize_text_field' ) );
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
            'default' => __( 'Have questions? We\'d love to hear from you. Fill out the form below and we\'ll get back to you as soon as possible.', 'functionalities-theme' ),
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
