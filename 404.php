<?php
/**
 * 404 Page Template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();
?>

<section class="error-404 not-found">
    <div class="card" style="max-width: 600px; margin: 0 auto; text-align: center;">
        <div class="card-header">
            <h1 class="page-title"><?php esc_html_e( '404 - Page Not Found', 'functionalities-theme' ); ?></h1>
        </div>

        <div class="card-body">
            <p style="margin-bottom: 24px;">
                <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'functionalities-theme' ); ?>
            </p>

            <?php get_search_form(); ?>

            <div style="margin-top: 24px;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    <?php ft_icon( 'home', 16 ); ?>
                    <?php esc_html_e( 'Back to Home', 'functionalities-theme' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
