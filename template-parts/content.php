<?php
/**
 * Post content template
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'ft-post ft-card ft-module-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="ft-post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium_large' ); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="ft-post-content ft-card-body">
        <header class="entry-header">
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="ft-post-title entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="ft-post-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
            ?>
            
            <?php if ( 'post' === get_post_type() ) : ?>
                <div class="ft-post-meta entry-meta">
                    <?php ft_posted_on(); ?>
                    <?php ft_posted_by(); ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="ft-post-excerpt entry-summary">
            <?php the_excerpt(); ?>
        </div>
        
        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="ft-btn ft-btn-outline">
                <?php esc_html_e( 'Read More', 'functionalities-theme' ); ?>
                <?php ft_icon( 'arrow-right', 14 ); ?>
            </a>
        </footer>
    </div>
</article>
