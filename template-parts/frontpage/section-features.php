<?php
/**
 * Frontpage Features / Modules Section
 */
?>
<section class="feature-section container" id="features">
    <h2>
        <?php ft_icon( 'settings', 24 ); ?>
        <?php esc_html_e( 'Features', 'functionalities-theme' ); ?>
    </h2>

    <div class="grid grid-3">
        <!-- Feature 1 -->
        <div class="module-card card">
            <div class="module-header">
                <div class="module-icon"><?php ft_icon( 'zap', 24 ); ?></div>
                <h3 class="module-title"><?php esc_html_e( 'Fast Performance', 'functionalities-theme' ); ?></h3>
            </div>
            <div class="module-body">
                <p class="module-desc"><?php esc_html_e( 'Optimized for speed and efficiency.', 'functionalities-theme' ); ?></p>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="module-card card">
            <div class="module-header">
                <div class="module-icon"><?php ft_icon( 'lock', 24 ); ?></div>
                <h3 class="module-title"><?php esc_html_e( 'Secure & Safe', 'functionalities-theme' ); ?></h3>
            </div>
            <div class="module-body">
                <p class="module-desc"><?php esc_html_e( 'Built with best security practices.', 'functionalities-theme' ); ?></p>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="module-card card">
            <div class="module-header">
                <div class="module-icon"><?php ft_icon( 'layout', 24 ); ?></div>
                <h3 class="module-title"><?php esc_html_e( 'Responsive Design', 'functionalities-theme' ); ?></h3>
            </div>
            <div class="module-body">
                <p class="module-desc"><?php esc_html_e( 'Looks great on all devices.', 'functionalities-theme' ); ?></p>
            </div>
        </div>
    </div>
</section>
