<?php
/**
 * Author Box Template
 *
 * @package Functionalities_Theme
 */

$author_id = get_the_author_meta( 'ID' );
$author_name = get_the_author();
$author_bio = get_the_author_meta( 'description' );
$author_url = get_author_posts_url( $author_id );
$author_avatar = get_avatar( $author_id, 80 );
?>

<aside class="author-box card" itemscope itemtype="https://schema.org/Person">
    <div class="author-avatar">
        <?php if ( $author_avatar ) : ?>
            <a href="<?php echo esc_url( $author_url ); ?>" itemprop="url">
                <?php echo $author_avatar; ?>
            </a>
        <?php endif; ?>
    </div>
    
    <div class="author-info">
        <h4 class="author-name" itemprop="name">
            <a href="<?php echo esc_url( $author_url ); ?>" rel="author">
                <?php echo esc_html( $author_name ); ?>
            </a>
        </h4>
        
        <?php if ( $author_bio ) : ?>
            <p class="author-bio" itemprop="description">
                <?php echo wp_kses_post( $author_bio ); ?>
            </p>
        <?php endif; ?>
        
        <a href="<?php echo esc_url( $author_url ); ?>" class="author-posts-link">
            <?php
            printf(
                esc_html__( 'View all posts by %s', 'functionalities-theme' ),
                esc_html( $author_name )
            );
            ?>
            <?php ft_icon( 'arrow-right', 14 ); ?>
        </a>
    </div>
</aside>
