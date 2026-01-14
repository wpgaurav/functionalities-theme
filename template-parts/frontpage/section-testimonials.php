<?php
/**
 * Frontpage Section: Testimonials
 *
 * @package Functionalities_Theme
 */

$title = get_theme_mod( 'ft_testimonials_title', __( 'Testimonials', 'functionalities-theme' ) );
?>

<section class="section testimonials bg-light">
    <div class="container">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="section-title text-center"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>

        <div class="testimonials-grid grid grid-auto">
            <?php
            $testimonial_defaults = array(
                1 => array( 'text' => __( 'The best theme I\'ve ever used. Clean code and beautiful design.', 'functionalities-theme' ), 'author' => 'John Doe' ),
                2 => array( 'text' => __( 'A game changer for my development workflow. Highly recommended!', 'functionalities-theme' ), 'author' => 'Jane Smith' ),
                3 => array( 'text' => '', 'author' => '' ),
            );

            for ( $i = 1; $i <= 3; $i++ ) :
                $text = get_theme_mod( "ft_testimonial_{$i}_text", $testimonial_defaults[$i]['text'] );
                $author = get_theme_mod( "ft_testimonial_{$i}_author", $testimonial_defaults[$i]['author'] );

                if ( empty( $text ) ) {
                    continue;
                }
                ?>
                <div class="testimonial-card">
                    <div class="testimonial-icon">“</div>
                    <blockquote class="testimonial-text">
                        <?php echo wp_kses_post( $text ); ?>
                    </blockquote>
                    <?php if ( ! empty( $author ) ) : ?>
                        <cite class="testimonial-author"><?php echo esc_html( $author ); ?></cite>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
