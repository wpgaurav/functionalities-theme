<?php
/**
 * Template functions for Functionalities Theme
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get SVG icon
 */
function ft_get_icon( $icon, $size = 24 ) {
    $icons = array(
        'menu' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>',
        'close' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
        'wordpress' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 19c-4.963 0-9-4.037-9-9s4.037-9 9-9 9 4.037 9 9-4.037 9-9 9z"/><path d="M3.845 12.375l3.089 8.459a8.972 8.972 0 0 1-3.089-8.459zM12 20.146l-3.233-9.389 3.233.014 3.218-.014-3.218 9.389zM8.767 10.757L12 3.854a8.976 8.976 0 0 1 7.311 8.521l-3.217-8.646-3.327 7.028H8.767z"/></svg>',
        'github' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>',
        'settings' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
        'home' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'download' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>',
        'zap' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
        'star' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        'external' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>',
        'lock' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
        'layout' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>',
        'file-text' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
    );
    
    if ( isset( $icons[ $icon ] ) ) {
        return sprintf( $icons[ $icon ], $size, $size );
    }
    
    return '';
}

/**
 * Output SVG icon
 */
function ft_icon( $icon, $size = 24 ) {
    echo ft_get_icon( $icon, $size ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Get custom logo or site title
 */
function ft_get_site_logo() {
    if ( has_custom_logo() ) {
        return get_custom_logo();
    }
    
    $show_title   = get_theme_mod( 'ft_show_site_title', true );
    $show_tagline = get_theme_mod( 'ft_show_site_tagline', false );
    $blog_name    = get_bloginfo( 'name' );
    $description  = get_bloginfo( 'description' );

    $output = sprintf(
        '<a href="%1$s" class="ft-brand-link">%2$s',
        esc_url( home_url( '/' ) ),
        ft_get_icon( 'settings', 28 )
    );

    if ( $show_title && ! empty( $blog_name ) ) {
        $output .= sprintf( '<span class="ft-brand-title">%s</span>', esc_html( $blog_name ) );
    }

    if ( $show_tagline && ! empty( $description ) ) {
        $output .= sprintf( '<span class="ft-brand-tagline">%s</span>', esc_html( $description ) );
    }

    $output .= '</a>';

    return $output;
}

/**
 * Get copyright text with replacements
 */
function ft_get_copyright() {
    $text = get_theme_mod( 'ft_copyright_text', '' );
    
    if ( empty( $text ) ) {
        $text = sprintf(
            /* translators: %1$s: current year, %2$s: site name */
            esc_html__( '© %1$s %2$s. All rights reserved.', 'functionalities-theme' ),
            date( 'Y' ),
            get_bloginfo( 'name' )
        );
    } else {
        $text = str_replace( '{year}', date( 'Y' ), $text );
        $text = str_replace( '{site}', get_bloginfo( 'name' ), $text );
    }
    
    return wp_kses_post( $text );
}

/**
 * Check if current page should show hero (Deprecated in favor of generic Page Headers)
 * Kept for backward compatibility if needed, but ft_get_header_context() is preferred.
 */
function ft_should_show_hero() {
    // Forward to new logic
    $context = ft_get_header_context();
    return (bool) get_theme_mod( "ft_header_{$context}_show", true );
}

/**
 * Determine the current header context
 * @return string home|blog|single|page
 */
function ft_get_header_context() {
    if ( is_front_page() ) {
        return 'home';
    } elseif ( is_home() || is_archive() || is_search() ) {
        return 'blog';
    } elseif ( is_singular( 'post' ) ) {
        return 'single';
    } elseif ( is_page() ) {
        return 'page';
    } elseif ( is_singular() ) {
        // Fallback for generic CPTs if not explicitly handled
        return 'single'; 
    }
    
    return 'blog'; // Fallback
}

/**
 * Get header data based on context
 */
function ft_get_page_header_data() {
    $context = ft_get_header_context();
    
    // Defaults
    $data = array(
        'title'       => get_bloginfo( 'name' ),
        'description' => get_bloginfo( 'description' ),
        'bg_color'    => get_theme_mod( "ft_header_{$context}_bg_color", '' ),
    );
    
    // Dynamic Content
    if ( 'home' === $context ) {
        $data['title']       = get_theme_mod( 'ft_header_home_title', get_bloginfo( 'name' ) );
        $data['description'] = get_theme_mod( 'ft_header_home_desc', get_bloginfo( 'description' ) );
    } elseif ( 'blog' === $context ) {
        if ( is_archive() ) {
            $data['title']       = get_the_archive_title();
            $data['description'] = get_the_archive_description();
        } elseif ( is_search() ) {
            $data['title']       = sprintf( esc_html__( 'Search: %s', 'functionalities-theme' ), get_search_query() );
            $data['description'] = '';
        } else {
            $data['title']       = get_theme_mod( 'ft_header_blog_title', get_the_title( get_option( 'page_for_posts', true ) ) );
            $data['description'] = get_theme_mod( 'ft_header_blog_desc', '' );
        }
    } elseif ( 'single' === $context || 'page' === $context ) {
        $data['title']       = get_the_title();
        $data['description'] = has_excerpt() ? get_the_excerpt() : '';
    }
    
    // Custom Overrides from Customizer (if set and not empty, they override dynamic content)
    $custom_title = get_theme_mod( "ft_header_{$context}_title", '' );
    if ( ! empty( $custom_title ) ) {
        $data['title'] = $custom_title;
    }
    
    $custom_desc = get_theme_mod( "ft_header_{$context}_desc", '' );
    if ( ! empty( $custom_desc ) ) {
        $data['description'] = $custom_desc;
    }
    
    return $data;
}

/**
 * Get stats for hero section
 */
function ft_get_hero_stats() {
    $stats = array();
    
    for ( $i = 1; $i <= 4; $i++ ) {
        $value = get_theme_mod( "ft_stat_{$i}_value", '' );
        $label = get_theme_mod( "ft_stat_{$i}_label", '' );
        
        if ( ! empty( $value ) && ! empty( $label ) ) {
            $stats[] = array(
                'value' => $value,
                'label' => $label,
            );
        }
    }
    
    return $stats;
}

/**
 * Get social links
 */
function ft_get_social_links() {
    $networks = array( 'github', 'twitter', 'facebook', 'linkedin', 'youtube' );
    $links = array();
    
    foreach ( $networks as $network ) {
        $url = get_theme_mod( "ft_social_{$network}", '' );
        if ( ! empty( $url ) ) {
            $links[ $network ] = $url;
        }
    }
    
    return $links;
}

/**
 * Check if sidebar should be shown
 */
function ft_has_sidebar() {
    $position = get_theme_mod( 'ft_sidebar_layout', 'right' );
    
    if ( 'none' === $position ) {
        return false;
    }
    
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        return false;
    }
    
    return true;
}

/**
 * Get sidebar position class
 */
function ft_get_sidebar_class() {
    $position = get_theme_mod( 'ft_sidebar_position', 'right' );
    
    if ( 'left' === $position ) {
        return 'ft-sidebar-left';
    }
    
    return 'ft-sidebar-right';
}
