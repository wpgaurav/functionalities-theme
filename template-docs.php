<?php
/**
 * Template Name: Documentation Page
 * 
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();
?>

<div class="docs-layout container">
    <aside class="docs-sidebar">
        <div class="docs-nav">
            <?php
            // We can use a specific menu for docs navigation
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary', // Or a 'docs' menu if you register one
                    'container'      => false,
                    'menu_class'     => 'docs-menu',
                    'depth'          => 2,
                ) );
            }
            ?>
        </div>
    </aside>

    <div class="docs-content card">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header class="card-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>
            <div class="card-body entry-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>

<style>
.docs-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 40px;
    padding-top: 40px;
    padding-bottom: 40px;
}

.docs-sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.docs-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.docs-menu li {
    margin-bottom: 4px;
}

.docs-menu a {
    display: block;
    padding: 8px 16px;
    border-radius: 4px;
    color: var(--text-secondary);
    font-size: 14px;
    transition: all var(--transition);
}

.docs-menu a:hover {
    background: var(--bg-body);
    color: var(--primary);
    text-decoration: none;
}

.docs-menu .current-menu-item > a {
    background: #f0f6fc;
    color: var(--primary);
    font-weight: 600;
}

@media (max-width: 960px) {
    .docs-layout {
        grid-template-columns: 1fr;
    }
    
    .docs-sidebar {
        position: static;
        margin-bottom: 24px;
    }
}
</style>

<?php
get_footer();
