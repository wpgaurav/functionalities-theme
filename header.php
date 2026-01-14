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
<div class="topbar">

    <span class="topbar-title"><?php echo wp_kses_post( get_theme_mod( 'ft_topbar_text', __( 'For WordPress', 'functionalities-theme' ) ) ); ?></span>
    
    <div class="topbar-right">
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
            <a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener" class="topbar-link">
                <?php ft_icon( 'github', 16 ); ?>
                <span>GitHub</span>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<header class="header<?php echo get_theme_mod( 'ft_sticky_header', true ) ? ' is-sticky' : ''; ?>">
    <div class="container header-inner">
        <div class="brand">
            <?php echo ft_get_site_logo(); ?>
        </div>

        <nav class="nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'functionalities-theme' ); ?>">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'nav',
                    'items_wrap'     => '%3$s',
                    'depth'          => 1,
                ) );
            }
            ?>
        </nav>

        <button class="menu-toggle" id="menu-toggle" aria-controls="mobile-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu', 'functionalities-theme' ); ?>">
            <span class="icon-menu"><?php ft_icon( 'menu', 24 ); ?></span>
            <span class="icon-close" style="display: none;"><?php ft_icon( 'close', 24 ); ?></span>
        </button>
    </div>
</header>

<nav class="mobile-nav" id="mobile-nav" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'functionalities-theme' ); ?>">
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




<main id="primary" class="main" role="main">
    <div class="container">
