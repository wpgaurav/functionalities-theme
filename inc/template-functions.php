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
        'wordpress' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 512 512"><path d="M61.7 169.4l101.5 278C92.2 413 43.3 340.2 43.3 256c0-30.9 6.6-60.1 18.4-86.6zm337.9 75.9c0-26.3-9.4-44.5-17.5-58.7-10.8-17.5-20.9-32.4-20.9-49.9 0-19.6 14.8-37.8 35.7-37.8.9 0 1.8.1 2.8.2-37.9-34.7-88.3-55.9-143.7-55.9-74.3 0-139.7 38.1-177.8 95.9 5 .2 9.7.3 13.7.3 22.2 0 56.7-2.7 56.7-2.7 11.5-.7 12.8 16.2 1.4 17.5 0 0-11.5 1.3-24.3 2l77.5 230.4L249.8 247l-33.1-90.8c-11.5-.7-22.3-2-22.3-2-11.5-.7-10.1-18.2 1.3-17.5 0 0 35.1 2.7 56 2.7 22.2 0 56.7-2.7 56.7-2.7 11.5-.7 12.8 16.2 1.4 17.5 0 0-11.5 1.3-24.3 2l76.9 228.7 21.2-70.9c9-29.4 16-50.5 16-68.7zm-139.9 29.3l-63.8 185.5c19.1 5.6 39.2 8.7 60.1 8.7 24.8 0 48.5-4.3 70.6-12.1-.6-.9-1.1-1.9-1.5-2.9l-65.4-179.2zm183-120.7c.9 6.8 1.4 14 1.4 21.9 0 21.6-4 45.8-16.2 76.2l-65 187.9C426.2 403 468.7 334.5 468.7 256c0-37-9.4-71.8-26-102.1zM504 256c0 136.8-111.3 248-248 248C119.2 504 8 392.7 8 256 8 119.2 119.2 8 256 8c136.7 0 248 111.2 248 248zm-11.4 0c0-130.5-106.2-236.6-236.6-236.6C125.5 19.4 19.4 125.5 19.4 256S125.6 492.6 256 492.6c130.5 0 236.6-106.1 236.6-236.6z"></path></svg>',
        'user'      => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
        'date'      => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
        'github' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>',
        'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path></svg>',
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>',
        'youtube' => '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>',
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
        '<a href="%1$s" class="brand-link">%2$s',
        esc_url( home_url( '/' ) ),
        ft_get_icon( 'settings', 28 )
    );

    if ( $show_title && ! empty( $blog_name ) ) {
        $output .= sprintf( '<span class="brand-title">%s</span>', esc_html( $blog_name ) );
    }

    if ( $show_tagline && ! empty( $description ) ) {
        $output .= sprintf( '<span class="brand-tagline">%s</span>', esc_html( $description ) );
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
    
    $stat_defaults = array(
        1 => array( 'value' => '1.0k+', 'label' => 'Active Users' ),
        2 => array( 'value' => '99.9%', 'label' => 'Uptime' ),
        3 => array( 'value' => '24/7', 'label' => 'Support' ),
        4 => array( 'value' => '5.0', 'label' => 'Rating' ),
    );

    for ( $i = 1; $i <= 4; $i++ ) {
        $value = get_theme_mod( "ft_stat_{$i}_value", $stat_defaults[$i]['value'] );
        $label = get_theme_mod( "ft_stat_{$i}_label", $stat_defaults[$i]['label'] );
        
        if ( ! empty( $value ) || ! empty( $label ) ) {
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
        return 'sidebar-left';
    }
    
    return 'sidebar-right';
}
