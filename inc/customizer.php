<?php
/**
 * MILEYM3DIA WordPress Customizer Registration
 * Makes every headline, banner, accent color, stat counter, promo code,
 * service, package, and contact detail editable in Appearance -> Customize.
 *
 * @package MILEYM3DIA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function m3_customize_register( $wp_customize ) {

    // 1. HERO & BRAND PARTNERS SECTION
    $wp_customize->add_section( 'm3_hero_section', array(
        'title'    => __( '01. M3 Hero & Brand Partners', 'mileym3dia' ),
        'priority' => 20,
    ) );

    $hero_settings = array(
        'm3_hero_kicker'      => array( 'Hero Top Kicker', 'MEDIA. VISUALS. BRANDING. MUSIC PRODUCTION.' ),
        'm3_hero_title_line1' => array( 'Hero Stack Tier 1', 'WE CREATE' ),
        'm3_hero_title_line2' => array( 'Hero Stack Tier 2', 'VISUALS' ),
        'm3_hero_title_line3' => array( 'Hero Stack Tier 3 (Red Accent)', 'THAT HIT DIFFERENT.' ),
        'm3_hero_desc'        => array( 'Hero Description', 'POWERFUL VISUALS. STRONGER BRANDS. REAL IMPACT. High quality visuals, music production, artist development and content that converts.' ),
        'm3_hero_btn1_text'   => array( 'Primary Button Text', "LET'S WORK TOGETHER" ),
        'm3_hero_btn1_url'    => array( 'Primary Button URL', '#contact' ),
        'm3_hero_btn2_text'   => array( 'Secondary Button Text', 'EXPLORE OUR WORK' ),
        'm3_hero_brands'      => array( 'Partner Brand Names (Comma separated)', 'NIKE, adidas, SONY, Canon, RED, PUMA' ),
    );

    foreach ( $hero_settings as $id => $cfg ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $cfg[1],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( $id, array(
            'label'   => $cfg[0],
            'section' => 'm3_hero_section',
            'type'    => 'text',
        ) );
    }

    // 2. MISSION & STATS BAR SECTION
    $wp_customize->add_section( 'm3_mission_section', array(
        'title'    => __( '02. M3 Mission & Stats Bar', 'mileym3dia' ),
        'priority' => 22,
    ) );

    $mission_settings = array(
        'm3_mission_eyebrow' => array( 'Mission Eyebrow', 'OUR MISSION • WE ARE MILEYM3DIA' ),
        'm3_mission_title1'  => array( 'Mission Title Line 1', 'VISION MEETS' ),
        'm3_mission_title2'  => array( 'Mission Title Accent Line 2', 'EXECUTION' ),
        'm3_mission_desc'    => array( 'Mission Copy', "We're a creative media & music production company helping brands, artists and businesses stand out with cinematic visuals, bold branding and content that connects." ),
        'm3_stat_1_num'      => array( 'Stat 1 Number', '150+' ),
        'm3_stat_1_label'    => array( 'Stat 1 Label', 'PROJECTS COMPLETED' ),
        'm3_stat_2_num'      => array( 'Stat 2 Number', '100+' ),
        'm3_stat_2_label'    => array( 'Stat 2 Label', 'HAPPY CLIENTS' ),
        'm3_stat_3_num'      => array( 'Stat 3 Number', '5+' ),
        'm3_stat_3_label'    => array( 'Stat 3 Label', 'YEARS OF EXPERIENCE' ),
        'm3_stat_4_num'      => array( 'Stat 4 Number', '10M+' ),
        'm3_stat_4_label'    => array( 'Stat 4 Label', 'VIEWS GENERATED' ),
    );

    foreach ( $mission_settings as $id => $cfg ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $cfg[1],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( $id, array(
            'label'   => $cfg[0],
            'section' => 'm3_mission_section',
            'type'    => 'text',
        ) );
    }

    // 3. MULTI-COLOR BANNERS & SECTION ACCENTS (Red, Neon Green, Electric Blue, Purple)
    $wp_customize->add_section( 'm3_banners_section', array(
        'title'    => __( '03. M3 Multi-Color Banners & Accents', 'mileym3dia' ),
        'priority' => 24,
    ) );

    $banner_settings = array(
        'm3_banner_display_mode' => array( 'Banner Render Mode (overlay = Live Editable Text on Clean Plate / graphic = Full Sliced Banner Image)', 'overlay' ),
        'm3_green_banner_title1' => array( 'Neon Green Banner Title', 'BIG IDEAS. BOLD CONTENT.' ),
        'm3_green_banner_script' => array( 'Neon Green Banner Script', 'REAL IMPACT.' ),
        'm3_green_banner_accent' => array( 'Green Banner Accent Color (green/red/blue/purple)', 'green' ),
        'm3_blue_banner_title1'  => array( 'Electric Blue Banner Title', 'YOUR VISION. OUR CREATION.' ),
        'm3_blue_banner_sub'     => array( 'Electric Blue Banner Subtitle', 'LIMITLESS POSSIBILITIES.' ),
        'm3_blue_banner_accent'  => array( 'Blue Banner Accent Color (blue/red/green/purple)', 'blue' ),
        'm3_purple_banner_title' => array( 'Purple Banner Title', 'VISUALS THAT SPEAK.' ),
        'm3_purple_banner_sub'   => array( 'Purple Banner Subtitle', 'BRANDING THAT STICKS. CONTENT THAT CONNECTS.' ),
        'm3_cta_accent_color'    => array( 'Bottom CTA Banner Theme (red or purple)', 'purple' ),
        'm3_cta_title_1'         => array( 'Bottom CTA Title Line 1', 'READY TO BRING' ),
        'm3_cta_title_2'         => array( 'Bottom CTA Title Line 2', 'YOUR VISION' ),
        'm3_cta_title_accent'    => array( 'Bottom CTA Accent Word', 'TO LIFE?' ),
        'm3_cta_sub'             => array( 'Bottom CTA Subtitle', "Let's create something legendary together." ),
        'm3_promo_title'         => array( 'Promo Box Headline', '10% OFF' ),
        'm3_promo_sub'           => array( 'Promo Box Subtitle', 'YOUR FIRST PROJECT' ),
        'm3_promo_code'          => array( 'Promo Box Code', 'M3FIRST10' ),
    );

    foreach ( $banner_settings as $id => $cfg ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $cfg[1],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( $id, array(
            'label'   => $cfg[0],
            'section' => 'm3_banners_section',
            'type'    => 'text',
        ) );
    }

    // 4. CONTACT & FOOTER SETTINGS
    $wp_customize->add_section( 'm3_contact_section', array(
        'title'    => __( '04. M3 Contact & Footer Info', 'mileym3dia' ),
        'priority' => 28,
    ) );

    $contact_settings = array(
        'm3_contact_email'    => array( 'Studio Email', 'info@mileym3dia.com' ),
        'm3_contact_phone'    => array( 'Studio Phone', '(123) 456-7890' ),
        'm3_contact_location' => array( 'Studio Location', 'Los Angeles, CA' ),
        'm3_social_instagram' => array( 'Instagram Handle / URL', '@MILEYM3DIA' ),
        'm3_footer_tagline'   => array( 'Footer Tagline', 'WE CREATE. WE CAPTURE. WE ELEVATE.' ),
        'm3_footer_copyright' => array( 'Footer Copyright Text', '© 2024 MILEYM3DIA. All Rights Reserved.' ),
    );

    foreach ( $contact_settings as $id => $cfg ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $cfg[1],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( $id, array(
            'label'   => $cfg[0],
            'section' => 'm3_contact_section',
            'type'    => 'text',
        ) );
    }
}
add_action( 'customize_register', 'm3_customize_register' );
