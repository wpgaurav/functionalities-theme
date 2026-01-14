<?php
/**
 * Blog Options Panel
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FT_Customizer_Blog {

	/**
	 * Register Settings
	 */
	public static function register( $wp_customize ) {
        
        $wp_customize->add_panel( 'ft_blog_panel', array(
            'title'       => esc_html__( 'Blog (Archive) Options', 'functionalities-theme' ),
            'panel'       => 'ft_theme_options_panel',
            'priority'    => 30,
        ) );

        self::register_section_controls( $wp_customize, 'blog_hero', 'Blog Hero', 10 );
        self::register_section_controls( $wp_customize, 'blog_featured', 'Featured Posts', 20 );
        self::register_section_controls( $wp_customize, 'blog_filters', 'Category Filters', 30 );
        self::register_section_controls( $wp_customize, 'blog_html', 'Custom HTML', 90 );

        // Specific Content Controls
        self::add_general_blog_controls( $wp_customize );
        self::add_blog_hero_controls( $wp_customize );
        self::add_blog_featured_controls( $wp_customize );
        self::add_blog_filters_controls( $wp_customize );
        self::add_blog_html_controls( $wp_customize );
    }

    private static function register_section_controls( $wp_customize, $id, $label, $default_priority ) {
        $section_id = 'ft_' . $id;

        $wp_customize->add_section( $section_id, array(
            'title'    => $label,
            'panel'    => 'ft_blog_panel',
        ) );

        $wp_customize->add_setting( "{$section_id}_enable", array(
            'default'           => true,
            'transport'         => 'refresh',
            'sanitize_callback' => 'ft_sanitize_checkbox',
        ) );

        $wp_customize->add_control( "{$section_id}_enable", array(
            'label'   => sprintf( esc_html__( 'Enable %s', 'functionalities-theme' ), $label ),
            'section' => $section_id,
            'type'    => 'checkbox',
        ) );

        $wp_customize->add_setting( "{$section_id}_priority", array(
            'default'           => $default_priority,
            'transport'         => 'refresh',
            'sanitize_callback' => 'absint',
        ) );

        $wp_customize->add_control( "{$section_id}_priority", array(
            'label'       => esc_html__( 'Order Priority', 'functionalities-theme' ),
            'section'     => $section_id,
            'type'        => 'number',
        ) );
    }

    /**
     * General Blog Settings
     */
    private static function add_general_blog_controls( $wp_customize ) {
        $section_id = 'ft_blog_general';

        $wp_customize->add_section( $section_id, array(
            'title'    => esc_html__( 'General Blog Settings', 'functionalities-theme' ),
            'panel'    => 'ft_blog_panel',
            'priority' => 5,
        ) );

        // Layout
        $wp_customize->add_setting( 'ft_blog_layout', array(
            'default'           => 'grid',
            'sanitize_callback' => 'sanitize_key',
        ) );
        $wp_customize->add_control( 'ft_blog_layout', array(
            'label'    => esc_html__( 'Blog Layout', 'functionalities-theme' ),
            'section'  => $section_id,
            'type'     => 'select',
            'choices'  => array(
                'grid' => esc_html__( 'Grid Layout', 'functionalities-theme' ),
                'list' => esc_html__( 'List Layout', 'functionalities-theme' ),
            ),
        ) );

        // Columns
        $wp_customize->add_setting( 'ft_blog_columns', array(
            'default'           => '3',
            'sanitize_callback' => 'absint',
        ) );
        $wp_customize->add_control( 'ft_blog_columns', array(
            'label'    => esc_html__( 'Grid Columns', 'functionalities-theme' ),
            'section'  => $section_id,
            'type'     => 'select',
            'choices'  => array(
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'active_callback' => function() { return get_theme_mod( 'ft_blog_layout', 'grid' ) === 'grid'; }
        ) );

        // Sidebar
        $wp_customize->add_setting( 'ft_blog_show_sidebar', array(
            'default'           => true,
            'sanitize_callback' => 'ft_sanitize_checkbox',
        ) );
        $wp_customize->add_control( 'ft_blog_show_sidebar', array(
            'label'   => esc_html__( 'Show Sidebar', 'functionalities-theme' ),
            'section' => $section_id,
            'type'    => 'checkbox',
        ) );

        // Excerpt Length
        $wp_customize->add_setting( 'ft_blog_excerpt_length', array(
            'default'           => 25,
            'sanitize_callback' => 'absint',
        ) );
        $wp_customize->add_control( 'ft_blog_excerpt_length', array(
            'label'   => esc_html__( 'Excerpt Length (Words)', 'functionalities-theme' ),
            'section' => $section_id,
            'type'    => 'number',
        ) );
    }

    /**
     * Blog Hero Controls
     */
    private static function add_blog_hero_controls( $wp_customize ) {
        $section_id = 'ft_blog_hero';

        // Hero Title
        $wp_customize->add_setting( 'ft_blog_hero_title', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_blog_hero_title', array(
            'label'       => esc_html__( 'Hero Title', 'functionalities-theme' ),
            'description' => esc_html__( 'If empty, archive title will be used.', 'functionalities-theme' ),
            'section'     => $section_id,
            'type'        => 'text',
        ) );

        // Hero Description
        $wp_customize->add_setting( 'ft_blog_hero_desc', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ) );
        $wp_customize->add_control( 'ft_blog_hero_desc', array(
            'label'       => esc_html__( 'Hero Description', 'functionalities-theme' ),
            'description' => esc_html__( 'If empty, archive description will be used.', 'functionalities-theme' ),
            'section'     => $section_id,
            'type'        => 'textarea',
        ) );
    }

    /**
     * Featured Posts Controls
     */
    private static function add_blog_featured_controls( $wp_customize ) {
        $section_id = 'ft_blog_featured';

        $wp_customize->add_setting( 'ft_blog_featured_ids', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'ft_blog_featured_ids', array(
            'label'       => esc_html__( 'Featured Post IDs', 'functionalities-theme' ),
            'description' => esc_html__( 'Comma separated IDs of posts to feature.', 'functionalities-theme' ),
            'section'     => $section_id,
            'type'        => 'text',
        ) );
    }

    /**
     * Blog Filters Controls
     */
    private static function add_blog_filters_controls( $wp_customize ) {
        $section_id = 'ft_blog_filters';

        $wp_customize->add_setting( 'ft_blog_filter_type', array(
            'default'           => 'categories',
            'sanitize_callback' => 'sanitize_key',
        ) );
        $wp_customize->add_control( 'ft_blog_filter_type', array(
            'label'    => esc_html__( 'Filter Type', 'functionalities-theme' ),
            'section'  => $section_id,
            'type'     => 'select',
            'choices'  => array(
                'categories' => 'Categories',
                'tags'       => 'Tags',
            ),
        ) );
    }

    /**
     * Custom HTML Controls
     */
    private static function add_blog_html_controls( $wp_customize ) {
        $section_id = 'ft_blog_html';

        $wp_customize->add_setting( 'ft_blog_custom_html', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ) );
        $wp_customize->add_control( 'ft_blog_custom_html', array(
            'label'       => esc_html__( 'Custom HTML', 'functionalities-theme' ),
            'description' => esc_html__( 'Add custom HTML or shortcodes here.', 'functionalities-theme' ),
            'section'     => $section_id,
            'type'        => 'textarea',
        ) );
    }
}
