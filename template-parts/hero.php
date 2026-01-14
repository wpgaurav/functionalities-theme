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

<section class="ft-hero">
    <div class="ft-hero-content">
        <?php if ( ! empty( $badge_text ) ) : ?>
            <span class="ft-hero-badge">
                <?php ft_icon( 'zap', 16 ); ?>
                <?php echo esc_html( $badge_text ); ?>
            </span>
        <?php endif; ?>
        
        <h1><?php echo esc_html( $title ); ?></h1>
        
        <?php if ( ! empty( $description ) ) : ?>
            <p><?php echo wp_kses_post( $description ); ?></p>
        <?php endif; ?>
        
        <div class="ft-hero-buttons">
            <?php if ( ! empty( $btn1_text ) && ! empty( $btn1_url ) ) : ?>
                <a href="<?php echo esc_url( $btn1_url ); ?>" class="ft-btn ft-btn-primary ft-btn-lg">
                    <?php ft_icon( 'download', 16 ); ?>
                    <?php echo esc_html( $btn1_text ); ?>
                </a>
            <?php endif; ?>
            
            <?php if ( ! empty( $btn2_text ) && ! empty( $btn2_url ) ) : ?>
                <a href="<?php echo esc_url( $btn2_url ); ?>" class="ft-btn ft-btn-secondary ft-btn-lg">
                    <?php ft_icon( 'external', 16 ); ?>
                    <?php echo esc_html( $btn2_text ); ?>
                </a>
            <?php endif; ?>
        </div>
        
        <?php if ( $show_stats && ! empty( $stats ) ) : ?>
            <div class="ft-stats">
                <?php foreach ( $stats as $stat ) : ?>
                    <div class="ft-stat">
                        <span class="ft-stat-value"><?php echo esc_html( $stat['value'] ); ?></span>
                        <span class="ft-stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
