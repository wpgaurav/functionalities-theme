    </div><!-- .container -->
</main><!-- #primary -->

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <div class="footer-brand">
                    <?php ft_icon( 'settings', 24 ); ?>
                    <?php bloginfo( 'name' ); ?>
                </div>
                <?php
                $footer_desc = get_theme_mod( 'ft_footer_description', '' );
                if ( ! empty( $footer_desc ) ) :
                ?>
                    <p class="footer-desc"><?php echo wp_kses_post( $footer_desc ); ?></p>
                <?php else : ?>
                    <p class="footer-desc"><?php bloginfo( 'description' ); ?></p>
                <?php endif; ?>
                
                <?php
                $social_links = ft_get_social_links();
                if ( ! empty( $social_links ) ) :
                ?>
                    <div class="social-links">
                        <?php foreach ( $social_links as $network => $url ) : ?>
                            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( ucfirst( $network ) ); ?>">
                                <?php ft_icon( $network, 18 ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
            <?php elseif ( has_nav_menu( 'footer' ) ) : ?>
                <div class="footer-section">
                    <h4><?php esc_html_e( 'Links', 'functionalities-theme' ); ?></h4>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer-links',
                        'depth'          => 1,
                    ) );
                    ?>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
            <?php elseif ( has_nav_menu( 'footer-2' ) ) : ?>
                <div class="footer-section">
                    <h4><?php esc_html_e( 'Resources', 'functionalities-theme' ); ?></h4>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-2',
                        'container'      => false,
                        'menu_class'     => 'footer-links',
                        'depth'          => 1,
                    ) );
                    ?>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
            <?php elseif ( has_nav_menu( 'footer-3' ) ) : ?>
                <div class="footer-section">
                    <h4><?php esc_html_e( 'More', 'functionalities-theme' ); ?></h4>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-3',
                        'container'      => false,
                        'menu_class'     => 'footer-links',
                        'depth'          => 1,
                    ) );
                    ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer-bottom">
            <p><?php echo ft_get_copyright(); ?></p>
            
            <div class="footer-legal">
                <?php
                $privacy_page = get_privacy_policy_url();
                if ( ! empty( $privacy_page ) ) :
                ?>
                    <a href="<?php echo esc_url( $privacy_page ); ?>"><?php esc_html_e( 'Privacy Policy', 'functionalities-theme' ); ?></a>
                    <span>•</span>
                <?php endif; ?>
                
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
