<?php
/**
 * Frontpage Section: FAQ
 *
 * @package Functionalities_Theme
 */

$title = get_theme_mod( 'ft_faq_title', __( 'Frequently Asked Questions', 'functionalities-theme' ) );
?>

<section class="section faq">
    <div class="container container-narrow">
        <?php if ( ! empty( $title ) ) : ?>
            <h2 class="section-title text-center"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>

        <div class="faq-list">
            <?php
            $faq_defaults = array(
                1 => array( 'q' => __( 'What is this theme?', 'functionalities-theme' ), 'a' => __( 'This is a modern WordPress theme inspired by the WP Dashboard UI, designed for developers.', 'functionalities-theme' ) ),
                2 => array( 'q' => __( 'Is it customizable?', 'functionalities-theme' ), 'a' => __( 'Yes! You can change almost everything via the WordPress Customizer.', 'functionalities-theme' ) ),
                3 => array( 'q' => __( 'How do I get support?', 'functionalities-theme' ), 'a' => __( 'You can find documentation and support on our official website.', 'functionalities-theme' ) ),
                4 => array( 'q' => '', 'a' => '' ),
                5 => array( 'q' => '', 'a' => '' ),
            );

            for ( $i = 1; $i <= 5; $i++ ) :
                $question = get_theme_mod( "ft_faq_{$i}_question", $faq_defaults[$i]['q'] );
                $answer   = get_theme_mod( "ft_faq_{$i}_answer", $faq_defaults[$i]['a'] );

                if ( empty( $question ) || empty( $answer ) ) {
                    continue;
                }
                ?>
                <div class="faq-item">
                    <button class="faq-question">
                        <?php echo esc_html( $question ); ?>
                        <span class="faq-icon"><?php ft_icon( 'plus', 16 ); ?></span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            <?php echo wp_kses_post( $answer ); ?>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
