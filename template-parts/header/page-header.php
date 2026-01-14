<?php
/**
 * Page Header Template Part
 *
 * Displays the page header based on the current context (Home, Blog, Single, Page)
 * if enabled in the Customizer.
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

// Get current context (home, blog, single, page)
$context = ft_get_header_context();

// Check if header is enabled for this context
if ( ! get_theme_mod( "ft_header_{$context}_show", true ) ) {
    return;
}

// Get dynamic data for this context
$data = ft_get_page_header_data();

// Helper to determine CSS classes
$class = 'ft-hero ft-page-header-section';
$class .= ' ft-header-' . $context;
$style = '';

if ( ! empty( $data['bg_color'] ) ) {
    $style = 'style="background-color: ' . esc_attr( $data['bg_color'] ) . ';"';
}
?>

<header class="<?php echo esc_attr( $class ); ?>" <?php echo $style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <div class="ft-container">
        <div class="ft-hero-content">
            
            <?php if ( 'home' === $context ) : ?>
                <?php
                $badge = get_theme_mod( 'ft_hero_badge', '' );
                if ( ! empty( $badge ) ) :
                    ?>
                    <span class="ft-hero-badge">
                        <?php ft_icon( 'zap', 14 ); ?>
                        <?php echo esc_html( $badge ); ?>
                    </span>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ( ! empty( $data['title'] ) ) : ?>
                <h1 class="ft-hero-title"><?php echo wp_kses_post( $data['title'] ); ?></h1>
            <?php endif; ?>
            
            <?php if ( ! empty( $data['description'] ) ) : ?>
                <div class="ft-hero-desc">
                    <?php echo wp_kses_post( $data['description'] ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( 'home' === $context ) : ?>
                <div class="ft-hero-buttons">
                    <?php
                    $btn1_text = get_theme_mod( 'ft_hero_button_text', esc_html__( 'Get Started', 'functionalities-theme' ) );
                    $btn1_url  = get_theme_mod( 'ft_hero_button_url', '#' );
                    
                    if ( ! empty( $btn1_text ) ) :
                        ?>
                        <a href="<?php echo esc_url( $btn1_url ); ?>" class="ft-btn ft-btn-primary ft-btn-lg">
                            <?php echo esc_html( $btn1_text ); ?>
                            <?php ft_icon( 'arrow-right', 16 ); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php
                    $btn2_text = get_theme_mod( 'ft_hero_button2_text', esc_html__( 'Learn More', 'functionalities-theme' ) );
                    $btn2_url  = get_theme_mod( 'ft_hero_button2_url', '#' );
                    
                    if ( ! empty( $btn2_text ) ) :
                        ?>
                        <a href="<?php echo esc_url( $btn2_url ); ?>" class="ft-btn ft-btn-secondary ft-btn-lg">
                            <?php echo esc_html( $btn2_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
                
                <?php if ( get_theme_mod( 'ft_show_stats', true ) ) : ?>
                    <div class="ft-stats">
                        <?php
                        $stats = ft_get_hero_stats();
                        foreach ( $stats as $stat ) :
                            ?>
                            <div class="ft-stat">
                                <span class="ft-stat-value"><?php echo esc_html( $stat['value'] ); ?></span>
                                <span class="ft-stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php
            // Breadcrumbs for non-home pages could go here
            if ( 'home' !== $context && function_exists( 'ft_breadcrumbs' ) ) {
                ft_breadcrumbs();
            }
            ?>
            
        </div>
    </div>
</header>
