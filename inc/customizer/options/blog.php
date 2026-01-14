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

        // General Blog Settings (Sidebar)
        $wp_customize->add_section( 'ft_blog_general', array(
            'title'    => esc_html__( 'General Blog Settings', 'functionalities-theme' ),
            'panel'    => 'ft_blog_panel',
            'priority' => 5,
        ) );

        $wp_customize->add_setting( 'ft_blog_show_sidebar', array(
            'default'           => true,
            'transport'         => 'refresh',
            'sanitize_callback' => 'ft_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'ft_blog_show_sidebar', array(
            'label'   => esc_html__( 'Show Sidebar on Blog', 'functionalities-theme' ),
            'section' => 'ft_blog_general',
            'type'    => 'checkbox',
        ) );
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
}
