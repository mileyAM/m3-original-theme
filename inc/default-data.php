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
            'title'       => m3_mod( 'm3_service_1_title', 'VIDEOGRAPHY' ),
            'desc'        => m3_mod( 'm3_service_1_desc', 'Cinematic 4K/8K videos that tell your story and captivate your audience.' ),
            'icon'        => m3_mod( 'm3_service_1_icon', 'videography' ),
            'accent'      => m3_mod( 'm3_service_1_accent', 'red' ),
            'price'       => '$499+',
            'deliverable' => '4K Cinema Capture • Music Videos • Commercials',
        ),
        array(
            'id'          => 102,
            'title'       => m3_mod( 'm3_service_2_title', 'PHOTOGRAPHY' ),
            'desc'        => m3_mod( 'm3_service_2_desc', 'High-quality studio & on-location photography for brands, events & artists.' ),
            'icon'        => m3_mod( 'm3_service_2_icon', 'photography' ),
            'accent'      => m3_mod( 'm3_service_2_accent', 'blue' ),
            'price'       => '$350+',
            'deliverable' => 'Editorial Portraits • Lookbooks • Live Events',
        ),
        array(
            'id'          => 103,
            'title'       => m3_mod( 'm3_service_3_title', 'BRANDING' ),
            'desc'        => m3_mod( 'm3_service_3_desc', 'Build a cohesive visual & sonic identity that leaves a lasting impact.' ),
            'icon'        => m3_mod( 'm3_service_3_icon', 'branding' ),
            'accent'      => m3_mod( 'm3_service_3_accent', 'purple' ),
            'price'       => '$750+',
            'deliverable' => 'Brand Identity • Strategy • Style Guides',
        ),
        array(
            'id'          => 104,
            'title'       => m3_mod( 'm3_service_4_title', 'GRAPHIC DESIGN' ),
            'desc'        => m3_mod( 'm3_service_4_desc', 'Bold cover art, merch capsules, and visual systems that communicate powerfully.' ),
            'icon'        => m3_mod( 'm3_service_4_icon', 'graphic' ),
            'accent'      => m3_mod( 'm3_service_4_accent', 'green' ),
            'price'       => '$299+',
            'deliverable' => 'Cover Art • Merch Design • Tour Flyers & Kits',
        ),
        array(
            'id'          => 105,
            'title'       => m3_mod( 'm3_service_5_title', 'CONTENT CREATION' ),
            'desc'        => m3_mod( 'm3_service_5_desc', 'High-retention short-form and campaign content tailored for digital platforms.' ),
            'icon'        => m3_mod( 'm3_service_5_icon', 'content' ),
            'accent'      => m3_mod( 'm3_service_5_accent', 'blue' ),
            'price'       => '$599+',
            'deliverable' => 'Reels/TikToks • Campaign Rollouts • Ad Creatives',
        ),
        array(
            'id'          => 106,
            'title'       => m3_mod( 'm3_service_6_title', 'VIDEO EDITING' ),
            'desc'        => m3_mod( 'm3_service_6_desc', 'Precision pacing, custom color grading, and VFX that bring footage to life.' ),
            'icon'        => m3_mod( 'm3_service_6_icon', 'editing' ),
            'accent'      => m3_mod( 'm3_service_6_accent', 'red' ),
            'price'       => '$399+',
            'deliverable' => 'Color Grading • VFX & Motion • Sound Design',
        ),
        array(
            'id'          => 107,
            'title'       => m3_mod( 'm3_service_7_title', 'MUSIC PRODUCTION' ),
            'desc'        => m3_mod( 'm3_service_7_desc', 'Custom beat production, studio vocal tracking, mixing & Dolby mastering.' ),
            'icon'        => m3_mod( 'm3_service_7_icon', 'music' ),
            'accent'      => m3_mod( 'm3_service_7_accent', 'green' ),
            'price'       => '$450+',
            'deliverable' => 'Custom Instrumentals • Studio Mixing • Mastering',
        ),
        array(
            'id'          => 108,
            'title'       => m3_mod( 'm3_service_8_title', 'ARTIST DEVELOPMENT' ),
            'desc'        => m3_mod( 'm3_service_8_desc', '360° sonic & visual positioning, press kits, and release rollouts for talent.' ),
            'icon'        => m3_mod( 'm3_service_8_icon', 'artist' ),
            'accent'      => m3_mod( 'm3_service_8_accent', 'purple' ),
            'price'       => '$1,200+',
            'deliverable' => 'Brand Positioning • EPK • Release Strategy',
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
            'slug'         => 'music-video-production',
            'title'        => m3_mod( 'm3_proj_1_title', 'MUSIC VIDEO PRODUCTION' ),
            'category'     => 'video',
            'cat_name'     => 'VIDEO PRODUCTION',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => '4K MASTER MUSIC VIDEO CUT (RED V-RAPTOR)',
            'image'        => m3_mod( 'm3_proj_1_image', $uri . '/assets/images/projects/project-1-music-video.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-1-music-video.jpg',
                $uri . '/assets/images/blog/blog-1-music-videos.jpg',
                $uri . '/assets/images/projects/project-3-event-highlights.jpg',
            ),
            'client'       => 'KAI VANCE • DEF JAM SESSION',
            'year'         => '2024',
            'deliverables' => '4K Master Video • 3x Vertical Teasers • Color Grade LUTs • Stills',
            'summary'      => 'Multi-camera RED V-Raptor 8K concert & narrative music video shoot with custom lighting truss and anamorphic color grading.',
            'challenge'    => 'The artist needed a high-energy visual centerpiece for their lead single that captured the raw intensity of a sold-out arena performance while weaving in cinematic narrative scenes.',
            'execution'    => 'MILEYM3DIA designed a custom crimson LED truss stage plot, rigged 3 RED V-Raptor cinema bodies on Steadicam and Dana Dolly tracks, and synced timecode directly to the master studio playback stem.',
        ),
        array(
            'id'           => 202,
            'slug'         => 'brand-commercial-identity',
            'title'        => m3_mod( 'm3_proj_2_title', 'BRAND COMMERCIAL & CAMPAIGN' ),
            'category'     => 'branding',
            'cat_name'     => 'BRANDING & COMMERCIAL',
            'has_video'    => false,
            'video_url'    => '',
            'video_label'  => '',
            'image'        => m3_mod( 'm3_proj_2_image', $uri . '/assets/images/projects/project-2-brand-commercial.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-2-brand-commercial.jpg',
                $uri . '/assets/images/projects/project-4-social-campaign.jpg',
                $uri . '/assets/images/blog/blog-2-brand-stand-out.jpg',
            ),
            'client'       => 'ELEVATE FOOTWEAR LAB',
            'year'         => '2024',
            'deliverables' => 'Brand Identity System • Product Photography • Packaging • Retail Lookbook',
            'summary'      => 'Complete brand identity refresh, high-contrast studio product photography, and flagship retail campaign rollout.',
            'challenge'    => 'Elevate Footwear Lab needed a bold, luxury streetwear visual identity and product campaign to anchor their flagship sneaker release across retail and digital channels.',
            'execution'    => 'Our branding and photography team crafted a dark-mode typographic system paired with macro rim-lit product photography on obsidian acrylic surfaces.',
        ),
        array(
            'id'           => 203,
            'slug'         => 'event-highlights-live',
            'title'        => m3_mod( 'm3_proj_3_title', 'EVENT HIGHLIGHTS & RECAP' ),
            'category'     => 'video',
            'cat_name'     => 'LIVE VIDEO & AUDIO',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => 'LIVE FESTIVAL AFTERMOVIE (4K 60FPS + MASTER BOARD MIX)',
            'image'        => m3_mod( 'm3_proj_3_image', $uri . '/assets/images/projects/project-3-event-highlights.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-3-event-highlights.jpg',
                $uri . '/assets/images/projects/project-1-music-video.jpg',
                $uri . '/assets/images/blog/blog-3-visual-storytelling.jpg',
            ),
            'client'       => 'ROLLING LOUD AFTERHOURS',
            'year'         => '2024',
            'deliverables' => 'Same-Day Recap Film • Live Multi-Track Audio Mix • 40 Press Photos',
            'summary'      => 'Same-day turnaround festival recap and artist stage performance capture with multi-track live audio mastering.',
            'challenge'    => 'Delivering a broadcast-ready recap film and mixed live performance audio within 12 hours of the headliner leaving the stage.',
            'execution'    => 'Our on-site mobile edit suite ingested footage directly from two stage pit camera operators and FOH multi-track stems for immediate grading and delivery.',
        ),
        array(
            'id'           => 204,
            'slug'         => 'social-media-campaign',
            'title'        => m3_mod( 'm3_proj_4_title', 'SOCIAL MEDIA CAMPAIGN' ),
            'category'     => 'branding',
            'cat_name'     => 'CONTENT & STRATEGY',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => 'CAMPAIGN REEL & MOTION GRAPHICS SUITE',
            'image'        => m3_mod( 'm3_proj_4_image', $uri . '/assets/images/projects/project-4-social-campaign.jpg' ),
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
            'execution'    => 'We produced custom 808-driven sound design stems paired with fast-cut cinema camera transitions optimized for Instagram Reels, TikTok, and YouTube Shorts.',
        ),
        array(
            'id'           => 205,
            'slug'         => 'corporate-brand-film',
            'title'        => m3_mod( 'm3_proj_5_title', 'CORPORATE BRAND FILM' ),
            'category'     => 'video',
            'cat_name'     => 'CORPORATE VIDEO',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => 'EXECUTIVE BRAND ANTHEM (4K CINEMA)',
            'image'        => m3_mod( 'm3_proj_5_image', $uri . '/assets/images/projects/project-5-corporate-video.jpg' ),
            'gallery'      => array(
                $uri . '/assets/images/projects/project-5-corporate-video.jpg',
                $uri . '/assets/images/blog/blog-3-visual-storytelling.jpg',
                $uri . '/assets/images/blog/blog-4-creative-process.jpg',
            ),
            'client'       => 'VANGUARD MEDIA GROUP LA',
            'year'         => '2024',
            'deliverables' => '3-Minute Brand Film • Aerial Cinematography • Executive Interviews',
            'summary'      => 'Cinematic brand anthem film, aerial drone cinematography, and executive storytelling suite.',
            'challenge'    => 'Elevating corporate communications to feel like a theatrical documentary rather than a standard talking-head video.',
            'execution'    => 'Shot entirely on prime cinema glass at dusk across downtown Los Angeles with custom orchestral-electronic score composition.',
        ),
        array(
            'id'           => 206,
            'slug'         => 'editorial-photography-shoot',
            'title'        => m3_mod( 'm3_proj_6_title', 'EDITORIAL PHOTOGRAPHY SHOOT' ),
            'category'     => 'photo',
            'cat_name'     => 'PHOTOGRAPHY',
            'has_video'    => false,
            'video_url'    => '',
            'video_label'  => '',
            'image'        => m3_mod( 'm3_proj_6_image', $uri . '/assets/images/projects/project-6-photography-shoot.jpg' ),
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
            'id'           => 207,
            'slug'         => 'studio-session-beat-production',
            'title'        => m3_mod( 'm3_proj_7_title', 'STUDIO SESSION & BEAT PRODUCTION' ),
            'category'     => 'music',
            'cat_name'     => 'MUSIC PRODUCTION',
            'has_video'    => true,
            'video_url'    => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'video_label'  => 'STUDIO SESSION REEL & DOLBY ATMOS PLAYBACK',
            'image'        => m3_mod( 'm3_proj_7_image', $uri . '/assets/images/projects/project-7-music-production.jpg' ),
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
            'id'           => 208,
            'slug'         => 'artist-epk-album-rollout',
            'title'        => m3_mod( 'm3_proj_8_title', 'ARTIST EPK & ALBUM ROLLOUT' ),
            'category'     => 'music',
            'cat_name'     => 'ARTIST DEVELOPMENT',
            'has_video'    => false,
            'video_url'    => '',
            'video_label'  => '',
            'image'        => m3_mod( 'm3_proj_8_image', $uri . '/assets/images/projects/project-8-artist-dev.jpg' ),
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
    return home_url( '/?page=project&project_id=' . intval( $project_id ) );
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
 * Get Editable Blog Posts (pulls from WordPress Posts or fallback defaults)
 */
function m3_get_blog_posts_data() {
    $uri = get_template_directory_uri();
    $defaults = array(
        array(
            'id'       => 301,
            'slug'     => 'behind-the-lens-how-we-shoot-music-videos',
            'title'    => 'BEHIND THE LENS: HOW WE SHOOT MUSIC VIDEOS',
            'date'     => 'MAY 10, 2024',
            'category' => 'PRODUCTION',
            'image'    => $uri . '/assets/images/blog/blog-1-music-videos.jpg',
            'excerpt'  => 'From pre-production treatment boards and custom audio playback sync to anamorphic lenses and crimson stage lighting.',
            'content'  => '<p>Shooting a high-impact music video requires total synergy between the sonic track and the visual pacing. At MILEYM3DIA (M3), our directors and audio engineers collaborate from day one—breaking down the BPM, key drops, and lyrical themes before a single light is rigged.</p><h3>1. Treatment & Sonic Sync</h3><p>Every frame must amplify the artist\'s brand identity. We build custom lighting plots using high-output RGBWW cinema fixtures, haze machines, and RED digital cinema cameras to capture raw emotion.</p><h3>2. Color Grading & Final Master</h3><p>In post-production, our colorists craft custom LUTs that give M3 visuals their signature deep onyx shadows and punchy crimson highlights.</p>',
        ),
        array(
            'id'       => 302,
            'slug'     => '5-tips-to-make-your-brand-stand-out-online',
            'title'    => '5 TIPS TO MAKE YOUR BRAND STAND OUT ONLINE',
            'date'     => 'APR 28, 2024',
            'category' => 'BRANDING',
            'image'    => $uri . '/assets/images/blog/blog-2-brand-stand-out.jpg',
            'excerpt'  => 'Why cohesive visual identity, sonic branding, and high-retention short-form video separate market leaders from the noise.',
            'content'  => '<p>In a crowded digital landscape, generic templates kill momentum. To build a brand that sticks and content that connects, your visual and sonic identity must be unmistakable within the first 1.5 seconds.</p><h3>Consistency Across Every Touchpoint</h3><p>Whether a client discovers you through a 15-second reel, a music video, or your website, your typography, color palette, and production value should immediately signal authority.</p>',
        ),
        array(
            'id'       => 303,
            'slug'     => 'the-power-of-visual-storytelling-in-2024',
            'title'    => 'THE POWER OF VISUAL STORYTELLING IN 2024',
            'date'     => 'APR 15, 2024',
            'category' => 'INSIGHTS',
            'image'    => $uri . '/assets/images/blog/blog-3-visual-storytelling.jpg',
            'excerpt'  => 'How narrative-driven cinematography and authentic artist development turn passive viewers into lifelong fans.',
            'content'  => '<p>Audiences don\'t just buy products or stream songs—they buy into stories, worlds, and movements. Our mission at MILEYM3DIA is simple: bring ideas to life through powerful visuals that connect, inspire, and drive real results.</p>',
        ),
        array(
            'id'       => 304,
            'slug'     => 'our-creative-process-from-idea-to-impact',
            'title'    => 'OUR CREATIVE PROCESS FROM IDEA TO IMPACT',
            'date'     => 'APR 5, 2024',
            'category' => 'PROCESS',
            'image'    => $uri . '/assets/images/blog/blog-4-creative-process.jpg',
            'excerpt'  => 'Inside the M3 workflow: how our directors, producers, sound engineers, and editors take your project from concept to launch.',
            'content'  => '<p>Vision without execution is just a daydream. At M3, we bridge the gap between bold creative concepts and disciplined studio execution across four proven phases: Discovery, Pre-Production, Capture/Recording, and Post-Production Rollout.</p>',
        ),
    );

    if ( function_exists( 'get_posts' ) ) {
        $posts = get_posts( array(
            'post_type'      => 'post',
            'posts_per_page' => 8,
            'post_status'    => 'publish',
        ) );
        if ( ! empty( $posts ) ) {
            $items = array();
            foreach ( $posts as $idx => $p ) {
                $thumb = function_exists( 'get_the_post_thumbnail_url' ) ? get_the_post_thumbnail_url( $p->ID, 'large' ) : '';
                if ( ! $thumb ) {
                    $fallback_idx = $idx % count( $defaults );
                    $thumb = $defaults[ $fallback_idx ]['image'];
                }
                $items[] = array(
                    'id'       => $p->ID,
                    'slug'     => $p->post_name,
                    'title'    => strtoupper( $p->post_title ),
                    'date'     => strtoupper( get_the_date( 'M j, Y', $p ) ),
                    'category' => 'INSIGHTS',
                    'image'    => $thumb,
                    'excerpt'  => $p->post_excerpt ? $p->post_excerpt : wp_trim_words( $p->post_content, 20 ),
                    'content'  => apply_filters( 'the_content', $p->post_content ),
                );
            }
            return $items;
        }
    }

    return $defaults;
}
