<?php
/**
 * Sidebar template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<aside class="ft-sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar', 'functionalities-theme' ); ?>">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
