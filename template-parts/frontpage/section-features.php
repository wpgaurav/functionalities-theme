<?php
/**
 * Frontpage Features / Modules Section
 *
 * @package Functionalities_Theme
 */

$title = get_theme_mod( 'ft_features_title', __( 'Our Features', 'functionalities-theme' ) );
?>

<section class="section features">
    <div class="container">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="section-title">
                <?php ft_icon( 'settings', 24 ); ?>
                <?php echo esc_html( $title ); ?>
            </h2>
        <?php endif; ?>

        <div class="module-grid grid grid-auto">
            <?php
            $feature_defaults = array(
                1 => array( 'title' => __( 'Fast Performance', 'functionalities-theme' ), 'text' => __( 'Optimized for speed and efficiency to give your users the best experience.', 'functionalities-theme' ), 'icon' => 'zap' ),
                2 => array( 'title' => __( 'Secure by Design', 'functionalities-theme' ), 'text' => __( 'Built with WordPress best practices to keep your site safe and secure.', 'functionalities-theme' ), 'icon' => 'lock' ),
                3 => array( 'title' => __( 'Fully Responsive', 'functionalities-theme' ), 'text' => __( 'Looks great on all devices, from high-res desktops to mobile phones.', 'functionalities-theme' ), 'icon' => 'layout' ),
            );

            for ( $i = 1; $i <= 3; $i++ ) :
                $f_title = get_theme_mod( "ft_feature_{$i}_title", $feature_defaults[$i]['title'] );
                $f_text  = get_theme_mod( "ft_feature_{$i}_text", $feature_defaults[$i]['text'] );
                $f_icon  = get_theme_mod( "ft_feature_{$i}_icon", $feature_defaults[$i]['icon'] );

                if ( empty( $f_title ) ) {
                    continue;
                }
                ?>
                <div class="module-card">
                    <?php if ( ! empty( $f_icon ) ) : ?>
                        <div class="module-icon"><?php ft_icon( $f_icon, 32 ); ?></div>
                    <?php endif; ?>
                    <h3 class="module-title"><?php echo esc_html( $f_title ); ?></h3>
                    <?php if ( ! empty( $f_text ) ) : ?>
                        <p class="module-desc"><?php echo wp_kses_post( $f_text ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

