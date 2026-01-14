<?php
/**
 * Template Name: Modules Page
 * 
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();
?>

<div class="ft-page-header ft-container">
    <h1 class="ft-page-title"><?php the_title(); ?></h1>
    <p class="ft-page-subtitle"><?php echo get_post_meta( get_the_ID(), '_ft_subtitle', true ) ?: esc_html__( 'Powerful modules to enhance your WordPress site.', 'functionalities-theme' ); ?></p>
</div>

<div class="ft-container">
    <div class="ft-grid ft-grid-3">
        <?php
        // This template assumes the content of the page consists of the module cards.
        // In a real theme, you might use a custom post type 'modules'.
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
        endwhile; endif;
        ?>
    </div>
</div>

<style>
/* CSS to handle module cards if manually entered in the editor */
.ft-wp-module-card {
    background: var(--ft-bg-card);
    border: 1px solid var(--ft-border-light);
    border-radius: 4px;
    padding: 24px;
    transition: all var(--ft-transition);
}

.ft-wp-module-card:hover {
    border-color: var(--ft-primary);
    transform: translateY(-2px);
    box-shadow: var(--ft-shadow-md);
}

.ft-wp-module-icon {
    width: 48px;
    height: 48px;
    background: var(--ft-bg-body);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    color: var(--ft-primary);
}

.ft-wp-module-icon svg {
    width: 24px;
    height: 24px;
}
</style>

<?php
get_footer();
