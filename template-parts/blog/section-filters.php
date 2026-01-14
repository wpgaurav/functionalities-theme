<?php
/**
 * Blog Section: Category/Tag Filters
 */

$filter_type = get_theme_mod( 'ft_blog_filter_type', 'categories' );
$terms = get_terms( array(
    'taxonomy'   => 'categories' === $filter_type ? 'category' : 'post_tag',
    'hide_empty' => true,
    'number'     => 10,
) );

if ( empty( $terms ) || is_wp_error( $terms ) ) {
    return;
}
?>

<div class="blog-filters section-sm text-center">
    <div class="container">
        <div class="filter-nav">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="filter-link <?php echo is_home() ? 'active' : ''; ?>">
                <?php esc_html_e( 'All', 'functionalities-theme' ); ?>
            </a>
            <?php foreach ( $terms as $term ) : ?>
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="filter-link <?php echo ( is_category( $term->term_id ) || is_tag( $term->term_id ) ) ? 'active' : ''; ?>">
                    <?php echo esc_html( $term->name ); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
.blog-filters { padding-block: 2rem; }
.filter-nav { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
.filter-link { 
    padding: 0.5rem 1.25rem; 
    border-radius: var(--radius-full); 
    background: var(--bg-card); 
    border: 1px solid var(--border-light);
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-secondary);
}
.filter-link:hover, .filter-link.active {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
    text-decoration: none;
}
</style>
