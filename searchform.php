<?php
/**
 * Search Form Template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'functionalities-theme' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'functionalities-theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" style="padding: 10px 16px; border: 1px solid #c3c4c7; border-radius: 4px; font-size: 14px; width: 100%; max-width: 400px;">
    </label>
    <button type="submit" class="search-submit ft-btn ft-btn-primary" style="margin-left: 8px;">
        <?php echo esc_html_x( 'Search', 'submit button', 'functionalities-theme' ); ?>
    </button>
</form>
