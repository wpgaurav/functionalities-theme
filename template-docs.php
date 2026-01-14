<?php
/**
 * Template Name: Documentation Page
 * 
 * @package Functionalities_Theme
 * @since 1.0.0
 */

get_header();
?>

<div class="ft-docs-layout ft-container">
    <aside class="ft-docs-sidebar">
        <div class="ft-docs-nav">
            <?php
            // We can use a specific menu for docs navigation
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary', // Or a 'docs' menu if you register one
                    'container'      => false,
                    'menu_class'     => 'ft-docs-menu',
                    'depth'          => 2,
                ) );
            }
            ?>
        </div>
    </aside>

    <div class="ft-docs-content ft-card">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header class="ft-card-header">
                <h1 class="ft-page-title"><?php the_title(); ?></h1>
            </header>
            <div class="ft-card-body entry-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>

<style>
.ft-docs-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 40px;
    padding-top: 40px;
    padding-bottom: 40px;
}

.ft-docs-sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.ft-docs-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.ft-docs-menu li {
    margin-bottom: 4px;
}

.ft-docs-menu a {
    display: block;
    padding: 8px 16px;
    border-radius: 4px;
    color: var(--ft-text-secondary);
    font-size: 14px;
    transition: all var(--ft-transition);
}

.ft-docs-menu a:hover {
    background: var(--ft-bg-body);
    color: var(--ft-primary);
    text-decoration: none;
}

.ft-docs-menu .current-menu-item > a {
    background: #f0f6fc;
    color: var(--ft-primary);
    font-weight: 600;
}

@media (max-width: 960px) {
    .ft-docs-layout {
        grid-template-columns: 1fr;
    }
    
    .ft-docs-sidebar {
        position: static;
        margin-bottom: 24px;
    }
}
</style>

<?php
get_footer();
