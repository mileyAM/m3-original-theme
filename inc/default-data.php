<?php
/**
 * MILEYM3DIA Dynamic Data & Editable CPT/Customizer Helpers
 * Pulls live content from WordPress Custom Post Types and Customizer (theme_mods),
 * ensuring zero hardcoded content on the frontend.
 *
 * @package MILEYM3DIA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Helper to get theme mod with default fallback
 */
function m3_mod( $key, $default = '' ) {
    return get_theme_mod( $key, $default );
}

/**
 * Render crisp SVG icons for Services, Stats, and UI elements
 */
function m3_get_svg_icon( $name ) {
    $icons = array(
        'videography' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>',
        'photography' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="14" rx="2"/><circle cx="12" cy="13" r="4"/><path d="M7 6V4h4v2"/></svg>',
        'branding'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m2 4 3 12h14l3-12-6 7-4-7-4 7-6-7zm3 16h14"/></svg>',
        'graphic'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>',
        'content'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="17" x2="22" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/></svg>',
        'editing'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="8" y1="18" x2="16" y2="18"/></svg>',
        'music'       => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>',
        'artist'      => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="22"/></svg>',
        'web'         => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/><polyline points="8 8 6 10 8 12"/><polyline points="16 8 18 10 16 12"/><line x1="13" y1="7" x2="11" y2="13"/></svg>',
        'clock'       => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'smile'       => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
        'award'       => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
        'eye'         => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>',
        'check'       => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>',
        'play'        => '<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="6 3 20 12 6 21 6 3"/></svg>',
        'arrow'       => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
    );
    return isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['videography'];
}

/**
 * Get Editable Services (from m3_service CPT or Customizer-backed defaults)
 */
function m3_get_services_data() {
    $defaults = array(
        array(
            'id'          => 101,
            'title'       => m3_mod( 'm3_service_1_title', 'WEB DEV & UI EDITING' ),
            'desc'        => m3_mod( 'm3_service_1_desc', 'Custom WordPress themes, artist hubs, interactive code, and high-speed UI editing.' ),
            'icon'        => m3_mod( 'm3_service_1_icon', 'web' ),
            'accent'      => m3_mod( 'm3_service_1_accent', 'cyan' ),
            'price'       => '$699+',
            'deliverable' => 'Custom WordPress • UI/UX • Speed Optimization',
        ),
        array(
            'id'          => 102,
            'title'       => m3_mod( 'm3_service_2_title', 'VIDEO EDITING & POST' ),
            'desc'        => m3_mod( 'm3_service_2_desc', 'Precision timeline editing, DaVinci color grading, VFX, and sound design for creators.' ),
            'icon'        => m3_mod( 'm3_service_2_icon', 'editing' ),
            'accent'      => m3_mod( 'm3_service_2_accent', 'yellow' ),
            'price'       => '$399+',
            'deliverable' => 'NLE Timeline Cut • Color Grade • Motion VFX',
        ),
        array(
            'id'          => 103,
            'title'       => m3_mod( 'm3_service_3_title', 'MUSIC PRODUCTION' ),
            'desc'        => m3_mod( 'm3_service_3_desc', 'Custom beat production, studio vocal tracking, mixing & Dolby Atmos mastering.' ),
            'icon'        => m3_mod( 'm3_service_3_icon', 'music' ),
            'accent'      => m3_mod( 'm3_service_3_accent', 'green' ),
            'price'       => '$450+',
            'deliverable' => 'Custom Instrumentals • Studio Mixing • Mastering',
        ),
        array(
            'id'          => 104,
            'title'       => m3_mod( 'm3_service_4_title', 'VIDEOGRAPHY & SHOOTS' ),
            'desc'        => m3_mod( 'm3_service_4_desc', 'Agile small-crew studio & on-location 4K shoots for music videos, reels, and brands.' ),
            'icon'        => m3_mod( 'm3_service_4_icon', 'videography' ),
            'accent'      => m3_mod( 'm3_service_4_accent', 'red' ),
            'price'       => '$499+',
            'deliverable' => '4K Cinema Capture • Small Shoots • Lighting',
        ),
        array(
            'id'          => 105,
            'title'       => m3_mod( 'm3_service_5_title', 'BRANDING & IDENTITY' ),
            'desc'        => m3_mod( 'm3_service_5_desc', 'Build a cohesive visual & sonic identity that leaves a lasting impact.' ),
            'icon'        => m3_mod( 'm3_service_5_icon', 'branding' ),
            'accent'      => m3_mod( 'm3_service_5_accent', 'purple' ),
            'price'       => '$750+',
            'deliverable' => 'Brand Identity • Strategy • Style Guides',
        ),
        array(
            'id'          => 106,
            'title'       => m3_mod( 'm3_service_6_title', 'ARTIST DEVELOPMENT' ),
            'desc'        => m3_mod( 'm3_service_6_desc', '360° sonic & visual positioning, press kits, and release rollouts for talent.' ),
            'icon'        => m3_mod( 'm3_service_6_icon', 'artist' ),
            'accent'      => m3_mod( 'm3_service_6_accent', 'blue' ),
            'price'       => '$1,200+',
            'deliverable' => 'Brand Positioning • EPK • Release Strategy',
        ),
        array(
            'id'          => 107,
            'title'       => m3_mod( 'm3_service_7_title', 'PHOTOGRAPHY' ),
            'desc'        => m3_mod( 'm3_service_7_desc', 'High-contrast studio & on-location photography for brands, press kits & artists.' ),
            'icon'        => m3_mod( 'm3_service_7_icon', 'photography' ),
            'accent'      => m3_mod( 'm3_service_7_accent', 'cyan' ),
            'price'       => '$350+',
            'deliverable' => 'Editorial Portraits • Lookbooks • Press Kits',
        ),
        array(
            'id'          => 108,
            'title'       => m3_mod( 'm3_service_8_title', 'GRAPHIC DESIGN' ),
            'desc'        => m3_mod( 'm3_service_8_desc', 'Bold cover art, merch capsules, and visual systems that communicate powerfully.' ),
            'icon'        => m3_mod( 'm3_service_8_icon', 'graphic' ),
            'accent'      => m3_mod( 'm3_service_8_accent', 'yellow' ),
            'price'       => '$299+',
            'deliverable' => 'Cover Art • Merch Design • Tour Flyers & Kits',
        ),
    );

    if ( function_exists( 'get_posts' ) ) {
        $posts = get_posts( array(
            'post_type'      => 'm3_service',
            'posts_per_page' => 20,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ) );
        if ( ! empty( $posts ) ) {
            $items = array();
            foreach ( $posts as $p ) {
                $items[] = array(
                    'id'          => $p->ID,
                    'title'       => $p->post_title,
                    'desc'        => $p->post_excerpt ? $p->post_excerpt : wp_trim_words( $p->post_content, 18 ),
                    'icon'        => get_post_meta( $p->ID, '_m3_service_icon', true ) ?: 'videography',
                    'accent'      => get_post_meta( $p->ID, '_m3_service_accent', true ) ?: 'red',
                    'price'       => get_post_meta( $p->ID, '_m3_service_price', true ) ?: '$499+',
                    'deliverable' => get_post_meta( $p->ID, '_m3_service_deliverable', true ) ?: 'Full Production',
                );
            }
            return $items;
        }
    }

    return $defaults;
}

/**
 * Get Editable Portfolio Projects (Supports both Video and Non-Video Case Studies)
 * Every project opens to its own dedicated Single Project Page (single-m3_project.php)
 */
function m3_get_projects_data() {
    $uri = get_template_directory_uri();
    $defaults = array(
        array(
            'id'           => 201,
            'slug'         => 'nle-video-editing-color-suite',
            'title'        => m3_mod( 'm3_proj_1_title', 'NLE VIDEO EDITING & COLOR SUITE' ),
            'category'     => 'video',
            'cat_name'     => 'VIDEO EDITING & POST',
            'accent'       => 'yellow',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => 'DA VINCI RESOLVE COLOR & TIMELINE REEL',
            'image'        => m3_mod( 'm3_proj_1_image', $uri . '/assets/images/projects/project-video-editing-suite.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-video-editing-suite.jpg',
                $uri . '/assets/images/projects/project-1-music-video.jpg',
                $uri . '/assets/images/blog/blog-3-visual-storytelling.jpg',
            ),
            'client'       => 'M3 POST LAB • COMMERCIAL CUT',
            'year'         => '2024',
            'deliverables' => 'Timeline Assembly • DaVinci Color Grade • VFX • Sound Mix',
            'summary'      => 'Frame-accurate NLE timeline editing, theatrical DaVinci Resolve color grading, and motion graphics for commercial & music releases.',
            'challenge'    => 'Transforming raw multi-cam 6K log footage into a high-impact, rhythm-locked edit with custom film emulation in 72 hours.',
            'execution'    => 'Built a multi-track timeline with speed-ramps, custom halation LUTs, and 5.1 stem sound design for broadcast and social cutdowns.',
        ),
        array(
            'id'           => 202,
            'slug'         => 'custom-wordpress-web-development',
            'title'        => m3_mod( 'm3_proj_2_title', 'CUSTOM WORDPRESS & WEB DEV' ),
            'category'     => 'web',
            'cat_name'     => 'WEB DEV & UI EDITING',
            'accent'       => 'cyan',
            'has_video'    => false,
            'video_url'    => '',
            'video_label'  => '',
            'image'        => m3_mod( 'm3_proj_2_image', $uri . '/assets/images/projects/project-web-dev.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-web-dev.jpg',
                $uri . '/assets/images/projects/project-2-brand-commercial.jpg',
                $uri . '/assets/images/blog/blog-2-brand-stand-out.jpg',
            ),
            'client'       => 'MILEYM3DIA DIGITAL LAB',
            'year'         => '2024',
            'deliverables' => 'Custom WordPress Theme • Interactive UI • Client Portal • SEO',
            'summary'      => 'Bespoke WordPress theme architecture, responsive UI editing, and interactive client portal engineered for creative agencies.',
            'challenge'    => 'Replacing sluggish page-builder templates with a lightning-fast, 100% editable WordPress theme that mirrors studio-grade dark UI.',
            'execution'    => 'Engineered custom PHP templates, modular CPTs, Customizer controls, and responsive CSS grids with sub-second page loads.',
        ),
        array(
            'id'           => 203,
            'slug'         => 'studio-session-beat-production',
            'title'        => m3_mod( 'm3_proj_3_title', 'STUDIO SESSION & BEAT PRODUCTION' ),
            'category'     => 'music',
            'cat_name'     => 'MUSIC PRODUCTION',
            'accent'       => 'green',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => 'STUDIO SESSION REEL & DOLBY ATMOS PLAYBACK',
            'image'        => m3_mod( 'm3_proj_3_image', $uri . '/assets/images/projects/project-7-music-production.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-7-music-production.jpg',
                $uri . '/assets/images/projects/project-8-artist-dev.jpg',
                $uri . '/assets/images/blog/blog-4-creative-process.jpg',
            ),
            'client'       => 'M3 SOUND LABS • ALBUM SESSIONS',
            'year'         => '2024',
            'deliverables' => '12 Custom Beats • Vocal Tracking • Stems • Dolby Atmos Master',
            'summary'      => 'Full executive album production, custom analog synth instrumentation, vocal tracking, and Dolby Atmos mix.',
            'challenge'    => 'Crafting a signature sonic identity from scratch that blends analog warmth with hard-hitting modern low-end translation.',
            'execution'    => 'Tracked through our SSL analog console and outboard Neve preamps, followed by stem mastering for streaming and live show playback.',
        ),
        array(
            'id'           => 204,
            'slug'         => 'brand-commercial-identity',
            'title'        => m3_mod( 'm3_proj_4_title', 'BRAND COMMERCIAL & IDENTITY' ),
            'category'     => 'branding',
            'cat_name'     => 'BRANDING & DESIGN',
            'accent'       => 'purple',
            'has_video'    => false,
            'video_url'    => '',
            'video_label'  => '',
            'image'        => m3_mod( 'm3_proj_4_image', $uri . '/assets/images/projects/project-2-brand-commercial.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-2-brand-commercial.jpg',
                $uri . '/assets/images/projects/project-4-social-campaign.jpg',
                $uri . '/assets/images/blog/blog-2-brand-stand-out.jpg',
            ),
            'client'       => 'ELEVATE FOOTWEAR LAB',
            'year'         => '2024',
            'deliverables' => 'Brand Identity System • Product Photography • Packaging • Retail Lookbook',
            'summary'      => 'Complete brand identity refresh, high-contrast studio product photography, and flagship retail campaign rollout.',
            'challenge'    => 'Elevate Footwear Lab needed a bold, luxury streetwear visual identity and product campaign to anchor their flagship sneaker release.',
            'execution'    => 'Our branding and photography team crafted a dark-mode typographic system paired with macro rim-lit product photography.',
        ),
        array(
            'id'           => 205,
            'slug'         => 'music-video-small-shoot',
            'title'        => m3_mod( 'm3_proj_5_title', 'MUSIC VIDEO & SMALL CREW SHOOT' ),
            'category'     => 'video',
            'cat_name'     => 'VIDEOGRAPHY & SHOOTS',
            'accent'       => 'red',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => '4K MASTER MUSIC VIDEO CUT (SMALL CREW)',
            'image'        => m3_mod( 'm3_proj_5_image', $uri . '/assets/images/projects/project-1-music-video.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-1-music-video.jpg',
                $uri . '/assets/images/projects/project-video-editing-suite.jpg',
                $uri . '/assets/images/blog/blog-1-music-videos.jpg',
            ),
            'client'       => 'KAI VANCE • STUDIO SESSION',
            'year'         => '2024',
            'deliverables' => '4K Master Video • 3x Vertical Teasers • Color Grade LUTs • Stills',
            'summary'      => 'Agile small-crew 4K music video shoot with portable RGBWW lighting and precision post-production grading.',
            'challenge'    => 'Capturing theatrical music video visuals on an agile studio footprint with fast setup and maximum lighting impact.',
            'execution'    => 'MILEYM3DIA rigged compact cinema bodies on gimbal & slider tracks, synced directly to the master studio playback stem.',
        ),
        array(
            'id'           => 206,
            'slug'         => 'artist-epk-album-rollout',
            'title'        => m3_mod( 'm3_proj_6_title', 'ARTIST EPK & ALBUM ROLLOUT' ),
            'category'     => 'music',
            'cat_name'     => 'ARTIST DEVELOPMENT',
            'accent'       => 'blue',
            'has_video'    => false,
            'video_url'    => '',
            'video_label'  => '',
            'image'        => m3_mod( 'm3_proj_6_image', $uri . '/assets/images/projects/project-8-artist-dev.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-8-artist-dev.jpg',
                $uri . '/assets/images/projects/project-7-music-production.jpg',
                $uri . '/assets/images/projects/project-1-music-video.jpg',
            ),
            'client'       => 'ALEX RODRIGUEZ • DEBUT LP',
            'year'         => '2024',
            'deliverables' => 'Electronic Press Kit (EPK) • Vinyl & Digital Cover Art • Rollout Strategy',
            'summary'      => 'Complete artist development package: visual identity, cover art, press kit, and release rollout strategy.',
            'challenge'    => 'Positioning an independent recording artist for major label distribution and festival booking consideration.',
            'execution'    => 'We developed a unified visual & sonic bible, interactive press kit, album packaging, and 60-day release rollout calendar.',
        ),
        array(
            'id'           => 207,
            'slug'         => 'editorial-photography-shoot',
            'title'        => m3_mod( 'm3_proj_7_title', 'EDITORIAL PHOTOGRAPHY SHOOT' ),
            'category'     => 'photo',
            'cat_name'     => 'PHOTOGRAPHY',
            'accent'       => 'cyan',
            'has_video'    => false,
            'video_url'    => '',
            'video_label'  => '',
            'image'        => m3_mod( 'm3_proj_7_image', $uri . '/assets/images/projects/project-6-photography-shoot.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-6-photography-shoot.jpg',
                $uri . '/assets/images/projects/project-2-brand-commercial.jpg',
                $uri . '/assets/images/blog/blog-2-brand-stand-out.jpg',
            ),
            'client'       => 'TR BEAUTY & EDITORIAL',
            'year'         => '2024',
            'deliverables' => '35 High-Res Retouched Stills • Billboard Key Art • Print Lookbook',
            'summary'      => 'High-contrast studio portrait & campaign key visual photography for billboard and digital release.',
            'challenge'    => 'Creating warm, sculptural skin tones against a deep obsidian studio backdrop for both large-format print billboards and digital lookbooks.',
            'execution'    => 'Captured on medium-format digital with dual bronze optical snoots and precision frequency-separation retouching.',
        ),
        array(
            'id'           => 208,
            'slug'         => 'social-media-campaign',
            'title'        => m3_mod( 'm3_proj_8_title', 'SOCIAL MEDIA CAMPAIGN' ),
            'category'     => 'branding',
            'cat_name'     => 'CONTENT & STRATEGY',
            'accent'       => 'yellow',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => 'CAMPAIGN REEL & MOTION GRAPHICS SUITE',
            'image'        => m3_mod( 'm3_proj_8_image', $uri . '/assets/images/projects/project-4-social-campaign.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-4-social-campaign.jpg',
                $uri . '/assets/images/blog/blog-4-creative-process.jpg',
                $uri . '/assets/images/projects/project-2-brand-commercial.jpg',
            ),
            'client'       => 'APEX STREETWEAR CO.',
            'year'         => '2024',
            'deliverables' => '15 Short-Form Reels • Content Calendar • Paid Ad Creatives',
            'summary'      => '30-asset vertical video & editorial lookbook campaign generating 3.4M organic views in 14 days.',
            'challenge'    => 'Breaking through algorithm fatigue with thumb-stopping visual hooks and cohesive sonic branding.',
            'execution'    => 'We produced custom 808-driven sound design stems paired with fast-cut cinema camera transitions optimized for Reels, TikTok, and Shorts.',
        ),
    );

    if ( function_exists( 'get_posts' ) ) {
        $posts = get_posts( array(
            'post_type'      => 'm3_project',
            'posts_per_page' => 24,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ) );
        if ( ! empty( $posts ) ) {
            $custom_items = array();
            foreach ( $posts as $p ) {
                $thumb = function_exists( 'get_the_post_thumbnail_url' ) ? get_the_post_thumbnail_url( $p->ID, 'large' ) : '';
                if ( ! $thumb ) {
                    $thumb = get_post_meta( $p->ID, '_m3_project_image', true ) ?: $uri . '/assets/images/projects/project-1-music-video.jpg';
                }
                $cat       = get_post_meta( $p->ID, '_m3_project_category', true ) ?: 'video';
                $video_url = get_post_meta( $p->ID, '_m3_project_video_url', true );
                $has_video = ! empty( $video_url );
                $custom_items[] = array(
                    'id'           => $p->ID,
                    'slug'         => isset( $p->post_name ) ? $p->post_name : 'project-' . $p->ID,
                    'title'        => strtoupper( $p->post_title ),
                    'category'     => $cat,
                    'cat_name'     => strtoupper( $cat ),
                    'accent'       => get_post_meta( $p->ID, '_m3_project_accent', true ) ?: 'red',
                    'has_video'    => $has_video,
                    'video_url'    => $video_url,
                    'video_label'  => get_post_meta( $p->ID, '_m3_project_video_label', true ) ?: 'PROJECT VIDEO SHOWCASE',
                    'image'        => $thumb,
                    'gallery'      => array(
                        $thumb,
                        $uri . '/assets/images/blog/blog-1-music-videos.jpg',
                        $uri . '/assets/images/blog/blog-3-visual-storytelling.jpg',
                    ),
                    'client'       => get_post_meta( $p->ID, '_m3_project_client', true ) ?: 'MILEYM3DIA CLIENT',
                    'year'         => get_post_meta( $p->ID, '_m3_project_year', true ) ?: '2024',
                    'deliverables' => get_post_meta( $p->ID, '_m3_project_deliverables', true ) ?: 'Full Creative Production & Strategy',
                    'summary'      => ! empty( $p->post_excerpt ) ? $p->post_excerpt : wp_strip_all_tags( $p->post_content ),
                    'challenge'    => get_post_meta( $p->ID, '_m3_project_challenge', true ) ?: wp_strip_all_tags( $p->post_content ),
                    'execution'    => get_post_meta( $p->ID, '_m3_project_execution', true ) ?: 'Executed in-house by the MILEYM3DIA visual, branding, and audio production collective.',
                );
            }
            return array_merge( $custom_items, $defaults );
        }
    }

    return $defaults;
}

/**
 * Helper to generate link to a Single Project Page
 */
function m3_project_url( $project_id ) {
    return m3_url_with_query( 'project', array( 'project_id' => intval( $project_id ) ) );
}

/**
 * Get Editable Pricing Packages
 */
function m3_get_packages_data() {
    $defaults = array(
        array(
            'name'     => m3_mod( 'm3_pkg_1_name', 'BASIC' ),
            'price'    => m3_mod( 'm3_pkg_1_price', '$499' ),
            'unit'     => m3_mod( 'm3_pkg_1_unit', '/PROJECT' ),
            'featured' => false,
            'badge'    => '',
            'features' => array_map( 'trim', explode( "\n", m3_mod( 'm3_pkg_1_features', "Videography or Studio Session (Up to 2hrs)\nBasic Editing / Mix & Master\n1 Revision Included\nDelivery in 5 Days\nStandard Commercial Licensing" ) ) ),
        ),
        array(
            'name'     => m3_mod( 'm3_pkg_2_name', 'STANDARD' ),
            'price'    => m3_mod( 'm3_pkg_2_price', '$999' ),
            'unit'     => m3_mod( 'm3_pkg_2_unit', '/PROJECT' ),
            'featured' => true,
            'badge'    => m3_mod( 'm3_pkg_2_badge', 'MOST POPULAR' ),
            'features' => array_map( 'trim', explode( "\n", m3_mod( 'm3_pkg_2_features', "Videography or Production (Up to 5hrs)\nAdvanced Editing & Sound Design\n2 Revisions Included\nDelivery in 3 Days\nCinema Color Grading & Mastering" ) ) ),
        ),
        array(
            'name'     => m3_mod( 'm3_pkg_3_name', 'PREMIUM' ),
            'price'    => m3_mod( 'm3_pkg_3_price', '$1999' ),
            'unit'     => m3_mod( 'm3_pkg_3_unit', '/PROJECT' ),
            'featured' => false,
            'badge'    => '',
            'features' => array_map( 'trim', explode( "\n", m3_mod( 'm3_pkg_3_features', "Full Visual + Audio Production\nPremium Editing & Custom Score\nUnlimited Revisions\nPriority Delivery in 2 Days\nCustom Motion Graphics & Branding Kit" ) ) ),
        ),
    );
    return $defaults;
}

/**
 * Get Editable Client Testimonials
 */
function m3_get_testimonials_data() {
    $uri = get_template_directory_uri();
    return array(
        array(
            'quote'  => m3_mod( 'm3_test_1_quote', 'MILEYM3DIA took our vision and turned it into something bigger than we imagined. Highly professional and creative team.' ),
            'name'   => m3_mod( 'm3_test_1_name', 'JAYLEN SMITH' ),
            'role'   => m3_mod( 'm3_test_1_role', 'CEO, Elevate Clothing' ),
            'avatar' => m3_mod( 'm3_test_1_avatar', $uri . '/assets/images/avatars/avatar-jaylen-hd.jpg' ),
        ),
        array(
            'quote'  => m3_mod( 'm3_test_2_quote', 'The quality is always on point and the content they deliver? Next level. Couldn\'t ask for a better media partner.' ),
            'name'   => m3_mod( 'm3_test_2_name', 'ALEX RODRIGUEZ' ),
            'role'   => m3_mod( 'm3_test_2_role', 'Recording Artist' ),
            'avatar' => m3_mod( 'm3_test_2_avatar', $uri . '/assets/images/avatars/avatar-alex-hd.jpg' ),
        ),
        array(
            'quote'  => m3_mod( 'm3_test_3_quote', 'Our brand wouldn\'t be where it is today without MILEYM3DIA. They truly care about your success.' ),
            'name'   => m3_mod( 'm3_test_3_name', 'TASHA REED' ),
            'role'   => m3_mod( 'm3_test_3_role', 'Founder, TR Beauty' ),
            'avatar' => m3_mod( 'm3_test_3_avatar', $uri . '/assets/images/avatars/avatar-tasha-hd.jpg' ),
        ),
    );
}

/**
 * Get Editable Blog Categories with M3 Accent Colors
 */
function m3_get_blog_categories() {
    return array(
        array(
            'slug'   => 'music-videos',
            'name'   => 'MUSIC VIDEOS',
            'accent' => 'red',
            'count'  => '08',
        ),
        array(
            'slug'   => 'branding',
            'name'   => 'BRANDING & IDENTITY',
            'accent' => 'blue',
            'count'  => '07',
        ),
        array(
            'slug'   => 'music-production',
            'name'   => 'MUSIC PRODUCTION',
            'accent' => 'green',
            'count'  => '06',
        ),
        array(
            'slug'   => 'artist-development',
            'name'   => 'ARTIST DEVELOPMENT',
            'accent' => 'purple',
            'count'  => '05',
        ),
        array(
            'slug'   => 'cinematography',
            'name'   => 'CINEMATOGRAPHY & COLOR',
            'accent' => 'gold',
            'count'  => '06',
        ),
        array(
            'slug'   => 'content-strategy',
            'name'   => 'CONTENT STRATEGY',
            'accent' => 'blue',
            'count'  => '05',
        ),
    );
}

/**
 * Helper to generate link to a Single Blog Post
 */
function m3_post_url( $post_id ) {
    return m3_page_url( 'single' ) . '&post_id=' . intval( $post_id );
}

/**
 * Get Editable Blog Posts (6 Placeholder Posts across 6 Categories, editable in WordPress Posts)
 */
function m3_get_blog_posts_data() {
    $uri = get_template_directory_uri();
    $defaults = array(
        array(
            'id'        => 301,
            'slug'      => 'behind-the-lens-how-we-shoot-music-videos',
            'title'     => 'BEHIND THE LENS: HOW WE SHOOT 8K MUSIC VIDEOS',
            'date'      => 'MAY 14, 2024',
            'read_time' => '5 MIN READ',
            'category'  => 'MUSIC VIDEOS',
            'cat_slug'  => 'music-videos',
            'accent'    => 'red',
            'author'    => 'M3 DIRECTION TEAM',
            'tags'      => array( '#REDCinema', '#MusicVideos', '#Anamorphic', '#StageLighting' ),
            'image'     => $uri . '/assets/images/blog/blog-1-music-videos.jpg',
            'excerpt'   => 'From pre-production treatment boards and timecode audio playback sync to anamorphic lenses and crimson stage lighting.',
            'content'   => '<p>Shooting a high-impact music video requires total synergy between the sonic track and the visual pacing. At <strong>MILEYM3DIA (M3)</strong>, our directors, cinematographers, and audio engineers collaborate from day one—breaking down the BPM, key drops, and lyrical themes before a single light is rigged on set.</p><blockquote>"A great music video doesn\'t just accompany a record—it builds an unforgettable visual world that fans replay for years." — M3 Direction Team</blockquote><h3>01. Pre-Production Treatment &amp; Sonic Sync</h3><p>Every frame must amplify the artist\'s brand identity. During pre-production, we lock in location scouting, wardrobe styling, and custom lighting plots using high-output RGBWW cinema fixtures, atmospheric haze, and RED V-Raptor 8K cinema bodies paired with anamorphic glass.</p><h3>02. Dynamic Camera Movement &amp; Performance Capture</h3><p>We combine Steadicam flow, Dana Dolly tracking shots, and high-frame-rate 120fps performance takes synced via timecode to the master studio playback stem so every cut hits right on the transient.</p><h3>03. Custom Color Grading &amp; Multi-Format Delivery</h3><p>In post-production, our colorists craft custom theatrical LUTs that give M3 visuals their signature deep onyx shadows, rich skin tones, and punchy crimson highlights—delivering 4K/8K masters alongside vertical 9:16 social cutdowns.</p>',
        ),
        array(
            'id'        => 302,
            'slug'      => '5-tips-to-make-your-brand-stand-out-online',
            'title'     => '5 VISUAL & SONIC KEYS TO MAKE YOUR BRAND STAND OUT',
            'date'      => 'MAY 08, 2024',
            'read_time' => '4 MIN READ',
            'category'  => 'BRANDING & IDENTITY',
            'cat_slug'  => 'branding',
            'accent'    => 'blue',
            'author'    => 'M3 BRAND LAB',
            'tags'      => array( '#BrandIdentity', '#VisualSystems', '#Typography', '#CreativeDirection' ),
            'image'     => $uri . '/assets/images/blog/blog-2-brand-stand-out.jpg',
            'excerpt'   => 'Why cohesive visual identity, sonic branding, and high-contrast campaign visuals separate market leaders from the noise.',
            'content'   => '<p>In a crowded digital landscape, generic templates kill momentum. To build a brand that sticks and content that converts, your visual and sonic identity must be unmistakable within the first 1.5 seconds of audience contact.</p><blockquote>"Your brand is the visual and emotional architecture that tells people why you matter before you say a word." — M3 Brand Lab</blockquote><h3>01. Architect a High-Contrast Visual System</h3><p>Whether a client discovers you through a 15-second reel, album cover art, product packaging, or your website, your typography, color palette, and grid discipline should immediately signal authority.</p><h3>02. Pair Visual Identity with Sonic Branding</h3><p>Audio is half the experience. Custom sound design, signature audio stingers, and studio-mixed voiceovers elevate brand recall by over 68% across digital video campaigns.</p><h3>03. Build Repeatable Campaign Templates</h3><p>We equip every MILEYM3DIA branding client with a modular style guide, custom motion graphics lower-thirds, and photography direction so every release feels unified and intentional.</p>',
        ),
        array(
            'id'        => 303,
            'slug'      => 'inside-the-booth-analog-mixing-and-dolby-atmos',
            'title'     => 'INSIDE THE BOOTH: ANALOG MIXING & DOLBY ATMOS MASTERING',
            'date'      => 'APR 29, 2024',
            'read_time' => '6 MIN READ',
            'category'  => 'MUSIC PRODUCTION',
            'cat_slug'  => 'music-production',
            'accent'    => 'green',
            'author'    => 'M3 SOUND LABS',
            'tags'      => array( '#MusicProduction', '#DolbyAtmos', '#SSLConsole', '#VocalChain' ),
            'image'     => $uri . '/assets/images/projects/project-7-music-production.jpg',
            'excerpt'   => 'How our studio engineers blend Neve & SSL analog hardware warmth with modern spatial audio mastering for streaming.',
            'content'   => '<p>Great records start with pristine source capture and intentional sound design. Inside the <strong>MILEYM3DIA Sound Lab</strong>, we bridge classic analog hardware chains with modern spatial audio workflows so your record translates on club systems, car stereos, and headphones alike.</p><blockquote>"Low-end punch and vocal presence aren\'t accidents—they are engineered from the microphone capsule all the way to the final master limiter." — M3 Sound Labs</blockquote><h3>01. The Vocal Tracking Chain</h3><p>We route flagship tube microphones through Neve 1073 preamps and optical hardware compression on the way in, capturing intimate detail and dynamic control before hitting the DAW.</p><h3>02. Hybrid Analog Console Summing</h3><p>By splitting drums, 808s, synths, and vocals across our SSL analog summing matrix, we achieve wide stereo separation and harmonic depth that purely digital mixes struggle to replicate.</p><h3>03. Dolby Atmos &amp; Streaming Optimization</h3><p>Every major DSP now prioritizes spatial audio. We deliver both punchy stereo masters (-8 LUFS club/streaming ready) and certified Dolby Atmos ADM BWF masters for Apple Music and Tidal.</p>',
        ),
        array(
            'id'        => 304,
            'slug'      => 'artist-development-building-a-360-album-rollout',
            'title'     => 'ARTIST DEVELOPMENT: BUILDING A 360° ALBUM ROLLOUT',
            'date'      => 'APR 19, 2024',
            'read_time' => '7 MIN READ',
            'category'  => 'ARTIST DEVELOPMENT',
            'cat_slug'  => 'artist-development',
            'accent'    => 'purple',
            'author'    => 'M3 A&R COLLECTIVE',
            'tags'      => array( '#ArtistDev', '#EPK', '#AlbumRollout', '#IndependentArtist' ),
            'image'     => $uri . '/assets/images/projects/project-8-artist-dev.jpg',
            'excerpt'   => 'From electronic press kits (EPKs) and cover art direction to 60-day content calendars that turn releases into cultural moments.',
            'content'   => '<p>Dropping a great song without a visual and strategic rollout is like throwing a concert without unlocking the venue doors. At <strong>MILEYM3DIA</strong>, our Artist Development program treats every independent and label talent release like a flagship product launch.</p><blockquote>"Talent gets you heard once. World-building, visual consistency, and disciplined rollout strategy build a career." — M3 A&R Collective</blockquote><h3>01. Visual &amp; Sonic Positioning Bible</h3><p>Before announcing a single or EP, we define your visual era: editorial press photography, color palette, wardrobe direction, and a broadcast-ready Electronic Press Kit (EPK) for media, playlists, and festival buyers.</p><h3>02. The 60-Day Multi-Phase Content Waterfall</h3><p>For every lead single, we capture the main 4K music video, a live acoustic/studio performance visual, 12 vertical short-form teasers, and behind-the-scenes mini-docs so your audience stays engaged for 8+ weeks.</p>',
        ),
        array(
            'id'        => 305,
            'slug'      => 'the-power-of-visual-storytelling-in-2024',
            'title'     => 'THE POWER OF VISUAL STORYTELLING & CINEMA COLOR GRADING',
            'date'      => 'APR 11, 2024',
            'read_time' => '5 MIN READ',
            'category'  => 'CINEMATOGRAPHY & COLOR',
            'cat_slug'  => 'cinematography',
            'accent'    => 'gold',
            'author'    => 'M3 POST SUITE',
            'tags'      => array( '#Cinematography', '#ColorGrading', '#DaVinciResolve', '#VisualStory' ),
            'image'     => $uri . '/assets/images/blog/blog-3-visual-storytelling.jpg',
            'excerpt'   => 'How narrative-driven cinematography, intentional lens choices, and theatrical color grading turn viewers into lifelong fans.',
            'content'   => '<p>Audiences don\'t just buy products or stream songs—they buy into stories, worlds, and movements. Our mission at MILEYM3DIA is simple: bring ideas to life through powerful visuals that connect, inspire, and drive real results.</p><blockquote>"Lighting and color grading set the emotional temperature of a story before a single line of dialogue is spoken." — M3 Post Suite</blockquote><h3>01. Intentional Lens &amp; Lighting Architecture</h3><p>We pair vintage anamorphic and cinema prime glass with motivated key lighting to sculpt faces and create natural depth separation against dark, atmospheric studio environments.</p><h3>02. Theatrical Color Science in DaVinci Resolve</h3><p>Using node-based film emulation, halation control, and split-toning, we ensure every M3 production carries a distinct theatrical look across all displays.</p>',
        ),
        array(
            'id'        => 306,
            'slug'      => 'our-creative-process-from-idea-to-impact',
            'title'     => 'OUR CREATIVE PROCESS: FROM STUDIO CONCEPT TO VIRAL IMPACT',
            'date'      => 'APR 02, 2024',
            'read_time' => '4 MIN READ',
            'category'  => 'CONTENT STRATEGY',
            'cat_slug'  => 'content-strategy',
            'accent'    => 'blue',
            'author'    => 'M3 DIGITAL STRATEGY',
            'tags'      => array( '#ContentStrategy', '#ShortFormVideo', '#CreativeProcess', '#Campaigns' ),
            'image'     => $uri . '/assets/images/blog/blog-4-creative-process.jpg',
            'excerpt'   => 'Inside the M3 workflow: how our directors, producers, sound engineers, and editors take your project from concept to launch.',
            'content'   => '<p>Vision without execution is just a daydream. At M3, we bridge the gap between bold creative concepts and disciplined studio execution across four proven phases: Discovery, Pre-Production, Capture/Recording, and Post-Production Rollout.</p><blockquote>"Every viral campaign is backed by a repeatable system: hook engineering, cinematic pacing, and data-driven distribution." — M3 Digital Strategy</blockquote><h3>01. Hook Engineering for the First 2 Seconds</h3><p>We design visual pattern interrupts and custom audio risers at the start of every short-form and commercial asset to maximize audience retention.</p><h3>02. Cross-Platform Asset Multiplication</h3><p>Every studio shoot is planned to yield horizontal 16:9 masters, vertical 9:16 reels, 4:5 paid ad cutdowns, and high-res editorial stills in a single production day.</p>',
        ),
    );

    if ( function_exists( 'get_posts' ) ) {
        $posts = get_posts( array(
            'post_type'      => 'post',
            'posts_per_page' => 12,
            'post_status'    => 'publish',
        ) );
        if ( ! empty( $posts ) ) {
            $items = array();
            foreach ( $posts as $idx => $p ) {
                $fallback = $defaults[ $idx % count( $defaults ) ];
                $thumb    = function_exists( 'get_the_post_thumbnail_url' ) ? get_the_post_thumbnail_url( $p->ID, 'large' ) : '';
                if ( ! $thumb ) {
                    $thumb = get_post_meta( $p->ID, '_m3_post_image', true ) ?: $fallback['image'];
                }
                $cat_name  = get_post_meta( $p->ID, '_m3_post_category_label', true ) ?: $fallback['category'];
                $cat_slug  = get_post_meta( $p->ID, '_m3_post_category_slug', true ) ?: $fallback['cat_slug'];
                $accent    = get_post_meta( $p->ID, '_m3_post_accent', true ) ?: $fallback['accent'];
                $read_time = get_post_meta( $p->ID, '_m3_post_read_time', true ) ?: $fallback['read_time'];
                $author    = get_post_meta( $p->ID, '_m3_post_author', true ) ?: $fallback['author'];
                $tags_meta = get_post_meta( $p->ID, '_m3_post_tags', true );
                $tags      = ! empty( $tags_meta ) && is_array( $tags_meta ) ? $tags_meta : $fallback['tags'];

                $items[] = array(
                    'id'        => $p->ID,
                    'slug'      => isset( $p->post_name ) ? $p->post_name : $fallback['slug'],
                    'title'     => strtoupper( $p->post_title ),
                    'date'      => function_exists( 'get_the_date' ) ? strtoupper( get_the_date( 'M j, Y', $p ) ) : $fallback['date'],
                    'read_time' => $read_time,
                    'category'  => $cat_name,
                    'cat_slug'  => $cat_slug,
                    'accent'    => $accent,
                    'author'    => $author,
                    'tags'      => $tags,
                    'image'     => $thumb,
                    'excerpt'   => ! empty( $p->post_excerpt ) ? $p->post_excerpt : ( function_exists( 'wp_trim_words' ) ? wp_trim_words( $p->post_content, 22 ) : $fallback['excerpt'] ),
                    'content'   => function_exists( 'apply_filters' ) ? apply_filters( 'the_content', $p->post_content ) : $p->post_content,
                );
            }
            return $items;
        }
    }

    return $defaults;
}
