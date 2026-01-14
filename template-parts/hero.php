<?php
/**
 * Hero section template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

$badge_text  = get_theme_mod( 'ft_hero_badge', '' );
$title       = get_theme_mod( 'ft_hero_title', get_bloginfo( 'name' ) );
$description = get_theme_mod( 'ft_hero_description', get_bloginfo( 'description' ) );
$btn1_text   = get_theme_mod( 'ft_hero_button_text', __( 'Get Started', 'functionalities-theme' ) );
$btn1_url    = get_theme_mod( 'ft_hero_button_url', '#' );
$btn2_text   = get_theme_mod( 'ft_hero_button2_text', __( 'Learn More', 'functionalities-theme' ) );
$btn2_url    = get_theme_mod( 'ft_hero_button2_url', '#' );
$show_stats  = get_theme_mod( 'ft_show_stats', true );
$stats       = ft_get_hero_stats();
?>

<section class="hero" aria-label="<?php esc_attr_e( 'Hero Section', 'functionalities-theme' ); ?>">
    <div class="container">
        <div class="hero-content">
            <?php if ( ! empty( $badge_text ) ) : ?>
                <span class="hero-badge">
                    <?php ft_icon( 'zap', 16 ); ?>
                    <?php echo esc_html( $badge_text ); ?>
                </span>
            <?php endif; ?>
            
            <header class="hero-header">
                 <h1 class="hero-title"><?php echo esc_html( $title ); ?></h1>
            </header>
            
            <?php if ( ! empty( $description ) ) : ?>
                <p class="hero-description"><?php echo wp_kses_post( $description ); ?></p>
            <?php endif; ?>
            
            <div class="hero-buttons">
                <?php if ( ! empty( $btn1_text ) && ! empty( $btn1_url ) ) : ?>
                    <a href="<?php echo esc_url( $btn1_url ); ?>" class="btn btn-primary btn-lg">
                        <?php echo esc_html( $btn1_text ); ?>
                         <?php ft_icon( 'arrow-right', 16 ); ?>
                    </a>
                <?php endif; ?>
                
                <?php if ( ! empty( $btn2_text ) && ! empty( $btn2_url ) ) : ?>
                    <a href="<?php echo esc_url( $btn2_url ); ?>" class="btn btn-secondary btn-lg">
                        <?php echo esc_html( $btn2_text ); ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <?php if ( $show_stats && ! empty( $stats ) ) : ?>
                <div class="stats">
                    <?php foreach ( $stats as $stat ) : ?>
                        <div class="stat">
                            <span class="stat-value"><?php echo esc_html( $stat['value'] ); ?></span>
                            <span class="stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
