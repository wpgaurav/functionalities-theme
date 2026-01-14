<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
    <?php esc_html_e( 'Skip to content', 'functionalities-theme' ); ?>
</a>

<?php if ( get_theme_mod( 'ft_show_topbar', true ) ) : ?>
<div class="ft-topbar">
    <a href="https://wordpress.org" target="_blank" rel="noopener" class="ft-topbar-logo" title="WordPress.org">
        <?php ft_icon( 'wordpress', 20 ); ?>
    </a>
    <span class="ft-topbar-title"><?php echo esc_html( get_theme_mod( 'ft_topbar_text', __( 'For WordPress', 'functionalities-theme' ) ) ); ?></span>
    
    <div class="ft-topbar-right">
        <?php
        if ( has_nav_menu( 'topbar' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'topbar',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'depth'          => 1,
            ) );
        }
        
        $github_url = get_theme_mod( 'ft_social_github', '' );
        if ( ! empty( $github_url ) ) :
        ?>
            <a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener" class="ft-topbar-link">
                <?php ft_icon( 'github', 16 ); ?>
                <span>GitHub</span>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<header class="ft-header" role="banner">
    <div class="ft-container">
        <div class="ft-header-inner">
            <div class="ft-brand">
                <?php echo ft_get_site_logo(); ?>
            </div>

            <nav class="ft-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'functionalities-theme' ); ?>">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'ft-nav',
                        'items_wrap'     => '%3$s',
                        'depth'          => 1,
                    ) );
                }
                ?>
            </nav>

            <button class="ft-menu-toggle" id="ft-menu-toggle" aria-controls="ft-mobile-nav" aria-expanded="false">
                <span class="ft-icon-menu"><?php ft_icon( 'menu', 24 ); ?></span>
                <span class="ft-icon-close" style="display: none;"><?php ft_icon( 'close', 24 ); ?></span>
                <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'functionalities-theme' ); ?></span>
            </button>
        </div>
    </div>
</header>

<nav class="ft-mobile-nav" id="ft-mobile-nav" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'functionalities-theme' ); ?>">
    <?php
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'depth'          => 2,
        ) );
    }
    ?>
</nav>

<?php if ( ft_should_show_hero() ) : ?>
    <?php get_template_part( 'template-parts/hero' ); ?>
<?php endif; ?>

<main id="primary" class="ft-main" role="main">
    <div class="ft-container">
