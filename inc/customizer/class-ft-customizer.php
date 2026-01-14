<?php
/**
 * Main Customizer Class
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FT_Customizer {

	/**
	 * Setup Customizer
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_settings' ) );
		add_action( 'customize_preview_init', array( $this, 'preview_js' ) );
    }

	/**
	 * Register All settings
	 */
	public function register_settings( $wp_customize ) {
		// Load Helpers
        require_once get_template_directory() . '/inc/customizer/helpers.php';

		// Load Options
        require_once get_template_directory() . '/inc/customizer/options/global.php';
        require_once get_template_directory() . '/inc/customizer/options/frontpage.php';
        require_once get_template_directory() . '/inc/customizer/options/blog.php';
        require_once get_template_directory() . '/inc/customizer/options/single.php';

        // Initialize Options
        FT_Customizer_Global::register( $wp_customize );
        FT_Customizer_Frontpage::register( $wp_customize );
        FT_Customizer_Blog::register( $wp_customize );
        FT_Customizer_Single::register( $wp_customize );
	}

	/**
	 * Preview JS
	 */
	public function preview_js() {
		wp_enqueue_script( 'ft-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
	}
}

// Initialize
new FT_Customizer();
