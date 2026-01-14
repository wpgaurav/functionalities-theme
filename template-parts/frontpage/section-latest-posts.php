<?php
/**
 * Frontpage Latest Posts Section
 */

$latest = new WP_Query( array(
    'posts_per_page' => 3,
    'ignore_sticky_posts' => true,
) );

if ( $latest->have_posts() ) :
?>
<section class="ft-latest-posts ft-container" id="latest-posts" style="margin-top: 48px;">
    <h2>
        <?php ft_icon( 'file-text', 24 ); ?>
        <?php esc_html_e( 'Latest Updates', 'functionalities-theme' ); ?>
    </h2>
    
    <div class="ft-posts ft-grid ft-grid-3">
        <?php while ( $latest->have_posts() ) : $latest->the_post(); ?>
            <article class="ft-post">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="ft-post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="ft-post-content">
                    <h3 class="ft-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="ft-post-meta"><?php echo get_the_date(); ?></div>
                    <div class="ft-post-excerpt"><?php the_excerpt(); ?></div>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>
