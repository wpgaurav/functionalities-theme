<?php
/**
 * Template Name: FAQ Page
 * 
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();

// We'll use a specific structure for FAQs. In a real theme, these could come from
// custom fields (ACF) or a custom post type. For this match, we'll assume the user
// can use blocks or we'll provide a default set.
?>

<div class="ft-page-header ft-container">
    <h1 class="ft-page-title"><?php the_title(); ?></h1>
    <p class="ft-page-subtitle"><?php echo get_post_meta( get_the_ID(), '_ft_subtitle', true ) ?: esc_html__( 'Frequently Asked Questions about Functionalities.', 'functionalities-theme' ); ?></p>
</div>

<div class="ft-faq-container">
    <div class="ft-faq-grid ft-grid-auto">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="ft-card">
                <div class="ft-card-body">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>

<style>
/* FAQ Specific Styles */
.ft-faq-container {
    max-width: 900px;
    margin: 0 auto;
}

.ft-faq-item {
    background: var(--ft-bg-card);
    border: 1px solid var(--ft-border-light);
    border-radius: 4px;
    margin-bottom: 12px;
    overflow: hidden;
    transition: all var(--ft-transition);
}

.ft-faq-item:hover {
    border-color: var(--ft-primary);
}

.ft-faq-question {
    padding: 16px 20px;
    width: 100%;
    text-align: left;
    background: #f6f7f7;
    border: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    font-size: 15px;
    font-weight: 500;
    color: var(--ft-text-primary);
}

.ft-faq-question:after {
    content: '+';
    font-size: 20px;
    color: var(--ft-text-muted);
}

.ft-faq-item.active .ft-faq-question:after {
    content: '−';
}

.ft-faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out, padding 0.3s ease;
    background: white;
}

.ft-faq-item.active .ft-faq-answer {
    max-height: 1000px; /* Large enough for content */
    padding: 20px;
    border-top: 1px solid var(--ft-border-light);
}
</style>

<?php
get_footer();
