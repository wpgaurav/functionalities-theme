<?php
/**
 * Post grid content template
 *
 * @package Functionalities_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post post-card card module-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium_large' ); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="post-content card-body">
        <header class="entry-header">
            <?php the_title( '<h3 class="post-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
            
            <?php if ( 'post' === get_post_type() ) : ?>
                <div class="post-meta entry-meta">
                    <?php ft_posted_on(); ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="post-excerpt entry-summary">
            <?php the_excerpt(); ?>
        </div>
        
        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                <?php esc_html_e( 'Read More', 'functionalities-theme' ); ?>
                <?php ft_icon( 'arrow-right', 14 ); ?>
            </a>
        </footer>
    </div>
</article>
