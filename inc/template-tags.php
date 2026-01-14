<?php
/**
 * Template tags for Functionalities Theme
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Output posted on date
 */
function ft_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    
    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_html( get_the_modified_date() )
    );
    
    echo '<span class="posted-on">' . ft_get_icon( 'date', 16 ) . ' ' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Output posted by author
 */
function ft_posted_by() {
    echo '<span class="byline">' . ft_get_icon( 'user', 16 ) . ' ' . sprintf(
        /* translators: %s: post author */
        esc_html_x( 'by %s', 'post author', 'functionalities-theme' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    ) . '</span>';
}

/**
 * Output entry footer with categories and tags
 */
function ft_entry_footer() {
    if ( 'post' === get_post_type() ) {
        $categories_list = get_the_category_list( esc_html__( ', ', 'functionalities-theme' ) );
        if ( $categories_list ) {
            printf(
                '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'functionalities-theme' ) . '</span>',
                $categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            );
        }
        
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'functionalities-theme' ) );
        if ( $tags_list ) {
            printf(
                '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'functionalities-theme' ) . '</span>',
                $tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            );
        }
    }
    
    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: post title */
                    __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'functionalities-theme' ),
                    array( 'span' => array( 'class' => array() ) )
                ),
                wp_kses_post( get_the_title() )
            )
        );
        echo '</span>';
    }
    
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Edit <span class="screen-reader-text">%s</span>', 'functionalities-theme' ),
                array( 'span' => array( 'class' => array() ) )
            ),
            wp_kses_post( get_the_title() )
        ),
        '<span class="edit-link">',
        '</span>'
    );
}

/**
 * Output post thumbnail
 */
function ft_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }
    
    if ( is_singular() ) {
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
        <?php
    } else {
        ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php the_post_thumbnail( 'medium_large', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
        </a>
        <?php
    }
}

/**
 * Output excerpt with read more
 */
function ft_excerpt() {
    $excerpt = get_the_excerpt();
    
    if ( empty( $excerpt ) ) {
        return;
    }
    
    echo '<div class="entry-excerpt">';
    echo '<p>' . wp_kses_post( $excerpt ) . '</p>';
    echo '<a href="' . esc_url( get_permalink() ) . '" class="btn btn-outline">';
    esc_html_e( 'Read More', 'functionalities-theme' );
    ft_icon( 'arrow-right', 16 );
    echo '</a>';
    echo '</div>';
}

/**
 * Pagination
 */
function ft_pagination() {
    the_posts_pagination( array(
        'mid_size'           => 2,
        'prev_text'          => esc_html__( '« Previous', 'functionalities-theme' ),
        'next_text'          => esc_html__( 'Next »', 'functionalities-theme' ),
        'class'              => 'pagination',
        'screen_reader_text' => esc_html__( 'Posts navigation', 'functionalities-theme' ),
    ) );
}

/**
 * Post navigation for single posts
 */
function ft_post_navigation() {
    the_post_navigation( array(
        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'functionalities-theme' ) . '</span> <span class="nav-title">%title</span>',
        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'functionalities-theme' ) . '</span> <span class="nav-title">%title</span>',
    ) );
}

/**
 * Breadcrumbs
 */
function ft_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumbs', 'functionalities-theme' ) . '">';
    echo '<span class="breadcrumb-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . ft_get_icon( 'home', 14 ) . '<span class="screen-reader-text">' . esc_html__( 'Home', 'functionalities-theme' ) . '</span></a></span>';

    echo '<span class="breadcrumb-sep">/</span>';

    if ( is_home() ) {
        echo '<span class="breadcrumb-item current">' . esc_html( get_the_title( get_option( 'page_for_posts' ) ) ) . '</span>';
    } elseif ( is_archive() ) {
        echo '<span class="breadcrumb-item current">' . get_the_archive_title() . '</span>';
    } elseif ( is_search() ) {
        echo '<span class="breadcrumb-item current">' . sprintf( esc_html__( 'Search: %s', 'functionalities-theme' ), get_search_query() ) . '</span>';
    } elseif ( is_singular() ) {
        // Parents
        global $post;
        if ( is_page() && $post->post_parent ) {
            $ancestors = get_post_ancestors( $post->ID );
            $ancestors = array_reverse( $ancestors );
            foreach ( $ancestors as $ancestor ) {
                echo '<span class="breadcrumb-item"><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a></span>';
                echo '<span class="breadcrumb-sep">/</span>';
            }
        }
        echo '<span class="breadcrumb-item current">' . get_the_title() . '</span>';
    }
    
    echo '</nav>';
}
