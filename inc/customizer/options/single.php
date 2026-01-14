<?php
/**
 * Single Post/Page Options Panel
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FT_Customizer_Single {

	/**
	 * Register Settings
	 */
	public static function register( $wp_customize ) {
        
        $wp_customize->add_panel( 'ft_single_panel', array(
            'title'       => esc_html__( 'Single Post/Page Options', 'functionalities-theme' ),
            'panel'       => 'ft_theme_options_panel',
            'priority'    => 40,
        ) );

        self::register_post_type_options( $wp_customize, 'post', 'Single Post' );
        self::register_post_type_options( $wp_customize, 'page', 'Single Page' );
        // Future: CPTs can be added here dynamically
    }

    /**
     * Register Generic Single Options for a Post Type
     */
    private static function register_post_type_options( $wp_customize, $type, $label ) {
        
        // Section for this Post Type
        $section_id = "ft_single_{$type}_settings";
        $wp_customize->add_section( $section_id, array(
            'title'    => $label,
            'panel'    => 'ft_single_panel',
        ) );

        // Hero Layout
        $wp_customize->add_setting( "ft_{$type}_hero_layout", array(
            'default'           => 'top',
            'transport'         => 'refresh',
            'sanitize_callback' => 'ft_sanitize_select',
        ) );

        $wp_customize->add_control( "ft_{$type}_hero_layout", array(
            'label'   => esc_html__( 'Hero / Featured Image Layout', 'functionalities-theme' ),
            'section' => $section_id,
            'type'    => 'select',
            'choices' => array(
                'none'    => 'No Featured Image',
                'top'     => 'Top (Above Title)',
                'bottom'  => 'Bottom (Below Title)',
                'left'    => 'Left (Split)',
                'right'   => 'Right (Split)',
                'overlay' => 'Background Overlay',
            ),
        ) );

        // Meta Toggle
        $wp_customize->add_setting( "ft_{$type}_show_meta", array(
            'default'           => true,
            'transport'         => 'refresh',
            'sanitize_callback' => 'ft_sanitize_checkbox',
        ) );

        $wp_customize->add_control( "ft_{$type}_show_meta", array(
            'label'   => esc_html__( 'Show Meta Data', 'functionalities-theme' ),
            'section' => $section_id,
            'type'    => 'checkbox',
        ) );

        // Sidebar
        $wp_customize->add_setting( "ft_{$type}_show_sidebar", array(
            'default'           => true,
            'transport'         => 'refresh',
            'sanitize_callback' => 'ft_sanitize_checkbox',
        ) );

        $wp_customize->add_control( "ft_{$type}_show_sidebar", array(
            'label'   => esc_html__( 'Show Sidebar', 'functionalities-theme' ),
            'section' => $section_id,
            'type'    => 'checkbox',
        ) );

        // Section Toggles & Priorities (Content, Author, Related)
        self::add_section_toggles( $wp_customize, $section_id, $type );
    }

    private static function add_section_toggles( $wp_customize, $section, $type ) {
        // Content
        $wp_customize->add_setting( "ft_{$type}_content_priority", array(
            'default' => 10,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control( "ft_{$type}_content_priority", array(
            'label' => 'Content Priority',
            'section' => $section,
            'type' => 'number'
        ) );

        // Author Box
        $wp_customize->add_setting( "ft_{$type}_author_enable", array(
            'default' => true,
            'transport' => 'refresh',
            'sanitize_callback' => 'ft_sanitize_checkbox'
        ) );
        $wp_customize->add_control( "ft_{$type}_author_enable", array(
            'label' => 'Show Author Box',
            'section' => $section,
            'type' => 'checkbox'
        ) );

        // Related Posts
        $wp_customize->add_setting( "ft_{$type}_related_enable", array(
            'default' => true,
            'transport' => 'refresh',
            'sanitize_callback' => 'ft_sanitize_checkbox'
        ) );
        $wp_customize->add_control( "ft_{$type}_related_enable", array(
            'label' => 'Show Related Posts',
            'section' => $section,
            'type' => 'checkbox'
        ) );
    }
}
