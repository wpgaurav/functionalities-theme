<?php
/**
 * Front Page Template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();

// Define available sections and their default priorities
$sections = array(
    'hero'           => array( 'priority' => 10, 'template' => 'hero' ),
    'features'       => array( 'priority' => 20, 'template' => 'features' ),
    'latest_posts'   => array( 'priority' => 30, 'template' => 'latest-posts' ),
    'featured_posts' => array( 'priority' => 40, 'template' => 'featured-posts' ),
    'cta'            => array( 'priority' => 50, 'template' => 'cta' ),
    'faq'            => array( 'priority' => 60, 'template' => 'faq' ),
    'testimonials'   => array( 'priority' => 70, 'template' => 'testimonials' ),
    'contact'        => array( 'priority' => 80, 'template' => 'contact' ),
    'custom_html'    => array( 'priority' => 90, 'template' => 'custom-html' ),
);

$enabled_sections = array();

foreach ( $sections as $id => $args ) {
    if ( get_theme_mod( "ft_{$id}_enable", true ) ) {
        $enabled_sections[ $id ] = array(
            'priority' => get_theme_mod( "ft_{$id}_priority", $args['priority'] ),
            'template' => $args['template'],
        );
    }
}

// Sort by priority
uasort( $enabled_sections, function( $a, $b ) {
    return $a['priority'] <=> $b['priority'];
} );

?>

<main id="primary" class="site-main ft-frontpage-sections">

    <?php
    foreach ( $enabled_sections as $id => $section ) {
        // Look for template in template-parts/frontpage/section-{template}.php
        // Fallback to template-parts/{template}.php
        // Fallback to generic simple render if file missing
        
        $template_name = $section['template'];
        
        if ( $id === 'hero' ) {
            // Use existing hero template
            get_template_part( 'template-parts/hero' );
            continue;
        }

        get_template_part( 'template-parts/frontpage/section', $template_name );
    }
    ?>

</main>

<?php
get_footer();
