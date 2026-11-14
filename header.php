<?php
/**
 * The header for MILEYM3DIA (M3) Theme
 *
 * @package MILEYM3DIA
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$current_page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';
if ( '' === $current_page ) {
    $req_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
    if ( preg_match( '#/(about|services|work|project|pricing|blog|single|contact|login|register|portal)\b#i', $req_uri, $m ) ) {
        $current_page = strtolower( $m[1] );
    } elseif ( function_exists( 'is_singular' ) && is_singular( 'm3_project' ) ) {
        $current_page = 'project';
    } elseif ( function_exists( 'is_singular' ) && is_singular( 'post' ) ) {
        $current_page = 'single';
    } elseif ( function_exists( 'is_home' ) && is_home() && ! is_front_page() ) {
        $current_page = 'blog';
    } else {
        $current_page = 'home';
    }
}
$nav_active_group = $current_page;
if ( 'project' === $current_page ) {
    $nav_active_group = 'work';
} elseif ( 'single' === $current_page ) {
    $nav_active_group = 'blog';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr( m3_mod( 'm3_hero_desc', 'MILEYM3DIA (M3) — Creative Agency, Music Production, Artist Development & Digital Media Production.' ) ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'accent-red' ); ?> data-current-page="<?php echo esc_attr( $nav_active_group ); ?>">
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<header class="m3-header" id="site-header">
    <div class="m3-container m3-header-inner">
        <a href="<?php echo esc_url( m3_page_url( 'home' ) ); ?>" class="m3-logo" aria-label="MILEYM3DIA Home">
            MILEYM<span class="m3-three">3</span>DIA
        </a>

        <nav class="m3-primary-nav" aria-label="Primary Navigation">
            <ul class="m3-nav-list">
                <li class="m3-nav-item <?php echo ( 'home' === $nav_active_group ) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url( m3_page_url( 'home' ) ); ?>" data-nav-slug="home" <?php echo ( 'home' === $nav_active_group ) ? 'aria-current="page"' : ''; ?> class="m3-nav-link <?php echo ( 'home' === $nav_active_group ) ? 'active' : ''; ?>">HOME</a>
                </li>
                <li class="m3-nav-item <?php echo ( 'about' === $nav_active_group ) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url( m3_page_url( 'about' ) ); ?>" data-nav-slug="about" <?php echo ( 'about' === $nav_active_group ) ? 'aria-current="page"' : ''; ?> class="m3-nav-link <?php echo ( 'about' === $nav_active_group ) ? 'active' : ''; ?>">ABOUT</a>
                </li>
                <li class="m3-nav-item <?php echo ( 'services' === $nav_active_group ) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>" data-nav-slug="services" <?php echo ( 'services' === $nav_active_group ) ? 'aria-current="page"' : ''; ?> class="m3-nav-link <?php echo ( 'services' === $nav_active_group ) ? 'active' : ''; ?>">
                        SERVICES
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                    </a>
                    <div class="m3-dropdown">
                        <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#videography">Videography <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#photography">Photography <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#branding">Branding <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#graphic">Graphic Design <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#content">Content Creation <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#editing">Video Editing <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#music">Music Production <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#artist">Artist Development <span>→</span></a>
                    </div>
                </li>
                <li class="m3-nav-item <?php echo ( 'work' === $nav_active_group ) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>" data-nav-slug="work" <?php echo ( 'work' === $nav_active_group ) ? 'aria-current="page"' : ''; ?> class="m3-nav-link <?php echo ( 'work' === $nav_active_group ) ? 'active' : ''; ?>">
                        WORK
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                    </a>
                    <div class="m3-dropdown">
                        <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>&filter=all">All Projects <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>&filter=video">Video Projects <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>&filter=photo">Photo Projects <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>&filter=branding">Branding Projects <span>→</span></a>
                        <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>&filter=music">Music / Audio Production <span>→</span></a>
                    </div>
                </li>
                <li class="m3-nav-item <?php echo ( 'pricing' === $nav_active_group ) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url( m3_page_url( 'pricing' ) ); ?>" data-nav-slug="pricing" <?php echo ( 'pricing' === $nav_active_group ) ? 'aria-current="page"' : ''; ?> class="m3-nav-link <?php echo ( 'pricing' === $nav_active_group ) ? 'active' : ''; ?>">PRICING</a>
                </li>
                <li class="m3-nav-item <?php echo ( 'blog' === $nav_active_group ) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" data-nav-slug="blog" <?php echo ( 'blog' === $nav_active_group ) ? 'aria-current="page"' : ''; ?> class="m3-nav-link <?php echo ( 'blog' === $nav_active_group ) ? 'active' : ''; ?>">BLOG</a>
                </li>
                <li class="m3-nav-item <?php echo ( 'contact' === $nav_active_group ) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" data-nav-slug="contact" <?php echo ( 'contact' === $nav_active_group ) ? 'aria-current="page"' : ''; ?> class="m3-nav-link <?php echo ( 'contact' === $nav_active_group ) ? 'active' : ''; ?>">CONTACT</a>
                </li>
            </ul>
        </nav>

        <div class="m3-header-actions">
            <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo esc_url( m3_page_url( 'portal' ) ); ?>" class="m3-auth-Trigger" id="nav-client-portal">
                    <span style="width:7px;height:7px;border-radius:50%;background:var(--m3-green);display:inline-block;"></span>
                    CLIENT PORTAL
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url( m3_page_url( 'login' ) ); ?>" class="m3-auth-Trigger" id="nav-client-login">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    LOGIN / JOIN
                </a>
            <?php endif; ?>

            <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-outline-accent m3-btn-sm hide-mobile" id="header-cta-btn">
                LET'S CREATE
            </a>

            <button type="button" class="m3-mobile-toggle" id="m3-mobile-toggle" aria-label="Open Navigation Menu">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
        </div>
    </div>
</header>

<!-- Numbered Offcanvas Navigation Drawer (Matches Mockup 1 Right Sidebar) -->
<div class="m3-offcanvas-backdrop" id="m3-offcanvas-backdrop"></div>
<aside class="m3-offcanvas" id="m3-offcanvas" aria-label="Mobile Navigation">
    <div>
        <div class="m3-offcanvas-header">
            <div class="m3-offcanvas-title"><span>MENU</span> (NAVIGATION)</div>
            <button type="button" id="m3-offcanvas-close" style="background:none;border:none;color:#fff;cursor:pointer;font-size:1.3rem;" aria-label="Close Menu">✕</button>
        </div>

        <ul class="m3-numbered-nav">
            <li class="m3-numbered-item">
                <a href="<?php echo esc_url( m3_page_url( 'home' ) ); ?>" class="m3-numbered-link">
                    <span><span class="num">01</span> Home</span>
                </a>
            </li>
            <li class="m3-numbered-item">
                <a href="<?php echo esc_url( m3_page_url( 'about' ) ); ?>" class="m3-numbered-link">
                    <span><span class="num">02</span> About Us</span>
                </a>
                <div class="m3-numbered-sub">
                    <a href="<?php echo esc_url( m3_page_url( 'about' ) ); ?>#story">- Our Story</a>
                    <a href="<?php echo esc_url( m3_page_url( 'about' ) ); ?>#mission">- Mission & Values</a>
                    <a href="<?php echo esc_url( m3_page_url( 'about' ) ); ?>#team">- Studio Team</a>
                </div>
            </li>
            <li class="m3-numbered-item">
                <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>" class="m3-numbered-link">
                    <span><span class="num">03</span> Services</span>
                    <span>⌄</span>
                </a>
                <div class="m3-numbered-sub">
                    <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#videography">- Videography & Photography</a>
                    <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#branding">- Branding & Graphic Design</a>
                    <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#music">- Music Production & Artist Dev</a>
                </div>
            </li>
            <li class="m3-numbered-item">
                <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>" class="m3-numbered-link">
                    <span><span class="num">04</span> Work / Portfolio</span>
                    <span>⌄</span>
                </a>
                <div class="m3-numbered-sub">
                    <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>?filter=video">- Video & Music Projects</a>
                    <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>?filter=photo">- Photo & Branding Projects</a>
                </div>
            </li>
            <li class="m3-numbered-item">
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" class="m3-numbered-link">
                    <span><span class="num">05</span> Blog / Insights</span>
                </a>
            </li>
            <li class="m3-numbered-item">
                <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-numbered-link">
                    <span><span class="num">06</span> Contact</span>
                </a>
            </li>
            <li class="m3-numbered-item">
                <a href="<?php echo esc_url( m3_page_url( 'portal' ) ); ?>" class="m3-numbered-link">
                    <span><span class="num">07</span> Client Portal / Login</span>
                </a>
            </li>
        </ul>
    </div>

    <div style="display:grid;gap:10px;">
        <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-primary" style="width:100%;">
            LET'S CREATE (CTA)
        </a>
        <div style="display:flex;justify-content:space-between;font-size:0.76rem;color:var(--m3-text-dim);padding-top:8px;">
            <a href="<?php echo esc_url( m3_page_url( 'login' ) ); ?>">Client Login</a>
            <a href="<?php echo esc_url( m3_page_url( 'register' ) ); ?>">Register Account</a>
        </div>
    </div>
</aside>
