<?php
/**
 * MILEYM3DIA (M3) WordPress Theme Functions and Definitions
 *
 * @package MILEYM3DIA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'M3_THEME_VERSION', '2.0.0' );
define( 'M3_THEME_DIR', get_template_directory() );
define( 'M3_THEME_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function m3_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );

    register_nav_menus( array(
        'primary'      => __( 'Primary Header Menu (M3)', 'mileym3dia' ),
        'mobile_menu'  => __( 'Numbered Offcanvas Menu (01-06)', 'mileym3dia' ),
        'footer_quick' => __( 'Footer Quick Links', 'mileym3dia' ),
        'footer_serv'  => __( 'Footer Services Links', 'mileym3dia' ),
    ) );
}
add_action( 'after_setup_theme', 'm3_theme_setup' );

/**
 * Enqueue Styles and Scripts
 */
function m3_enqueue_assets() {
    wp_enqueue_style( 'mileym3dia-style', get_stylesheet_uri(), array(), M3_THEME_VERSION );
    wp_enqueue_script( 'mileym3dia-main', M3_THEME_URI . '/assets/js/main.js', array(), M3_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'm3_enqueue_assets' );

/**
 * Register Right-Sided Blog Sidebar Widget Area
 */
function m3_widgets_init() {
    if ( function_exists( 'register_sidebar' ) ) {
        register_sidebar( array(
            'name'          => __( 'Blog Right Sidebar (M3)', 'mileym3dia' ),
            'id'            => 'm3-blog-sidebar',
            'description'   => __( 'Right-sided sidebar displayed on the Blog section, Blog archive, and Single Blog articles.', 'mileym3dia' ),
            'before_widget' => '<div id="%1$s" class="m3-sidebar-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="m3-widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
}
add_action( 'widgets_init', 'm3_widgets_init' );

/**
 * Helper to generate page links that work both in standard WP permalinks and query routing
 */
function m3_page_url( $slug ) {
    if ( empty( $slug ) || 'home' === $slug ) {
        return home_url( '/' );
    }
    if ( function_exists( 'get_page_by_path' ) ) {
        $page = get_page_by_path( $slug );
        if ( $page ) {
            return get_permalink( $page->ID );
        }
    }
    return home_url( '/?page=' . rawurlencode( $slug ) );
}

/**
 * Auto-create the required Multi-Page WordPress Pages on Theme Activation
 * (01 Home, 02 About Us, 03 Services, 04 Work / Portfolio, Pricing, 05 Blog, 06 Contact,
 *  08 Privacy Policy, 09 Terms & Conditions, Login, Register, Client Portal)
 */
function m3_seed_default_pages() {
    if ( get_option( 'm3_pages_seeded_v2' ) ) {
        return;
    }

    $pages = array(
        'home'           => array( 'title' => 'Home', 'template' => 'front-page.php' ),
        'about'          => array( 'title' => 'About Us', 'template' => 'page-about.php' ),
        'services'       => array( 'title' => 'Services', 'template' => 'page-services.php' ),
        'work'           => array( 'title' => 'Work / Portfolio', 'template' => 'page-work.php' ),
        'pricing'        => array( 'title' => 'Pricing', 'template' => 'page-pricing.php' ),
        'blog'           => array( 'title' => 'Blog / Insights', 'template' => 'home.php' ),
        'contact'        => array( 'title' => 'Contact Us', 'template' => 'page-contact.php' ),
        'privacy-policy' => array( 'title' => 'Privacy Policy', 'template' => 'page-privacy-policy.php' ),
        'terms'          => array( 'title' => 'Terms & Conditions', 'template' => 'page-terms.php' ),
        'login'          => array( 'title' => 'Client Login', 'template' => 'page-login.php' ),
        'register'       => array( 'title' => 'Client Registration', 'template' => 'page-register.php' ),
        'portal'         => array( 'title' => 'Client Portal', 'template' => 'page-portal.php' ),
    );

    foreach ( $pages as $slug => $cfg ) {
        if ( function_exists( 'get_page_by_path' ) && ! get_page_by_path( $slug ) ) {
            $page_id = wp_insert_post( array(
                'post_type'   => 'page',
                'post_name'   => $slug,
                'post_title'  => $cfg['title'],
                'post_status' => 'publish',
            ) );
            if ( $page_id && ! is_wp_error( $page_id ) ) {
                update_post_meta( $page_id, '_wp_page_template', $cfg['template'] );
            }
        }
    }

    update_option( 'm3_pages_seeded_v2', 1 );
}
add_action( 'after_switch_theme', 'm3_seed_default_pages' );

// Include Modular Theme Architecture
require_once M3_THEME_DIR . '/inc/default-data.php';
require_once M3_THEME_DIR . '/inc/custom-post-types.php';
require_once M3_THEME_DIR . '/inc/customizer.php';
require_once M3_THEME_DIR . '/inc/block-patterns.php';
require_once M3_THEME_DIR . '/inc/client-portal.php';
