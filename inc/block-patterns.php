<?php
/**
 * MILEYM3DIA Gutenberg Block Patterns
 * Allows inserting and editing M3 multi-color banners, hero sections,
 * services grids, and pricing tables directly inside the WordPress Block Editor.
 *
 * @package MILEYM3DIA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function m3_register_block_patterns() {
    if ( ! function_exists( 'register_block_pattern_category' ) ) {
        return;
    }

    register_block_pattern_category( 'mileym3dia', array(
        'label' => __( 'MILEYM3DIA (M3) Sections & Banners', 'mileym3dia' ),
    ) );

    $uri = get_template_directory_uri();

    // 1. Green Banner Pattern (Big Ideas. Bold Content. Real Impact.)
    register_block_pattern( 'mileym3dia/banner-green-big-ideas', array(
        'title'       => __( 'M3 Banner: Big Ideas. Bold Content. Real Impact. (Neon Green)', 'mileym3dia' ),
        'categories'  => array( 'mileym3dia' ),
        'content'     => '<!-- wp:group {"className":"m3-color-banner accent-green","layout":{"type":"constrained"}} --><div class="wp-block-group m3-color-banner accent-green" style="background-image:url(' . esc_url( $uri . '/assets/images/banners/plate-green-big-ideas.jpg' ) . ')"><div class="m3-container m3-color-banner-inner"><div><span class="m3-banner-badge">MILEYM<span class="three">3</span>DIA</span><h2 class="m3-banner-headline">BIG IDEAS. BOLD CONTENT. <span class="accent">REAL IMPACT.</span></h2></div></div></div><!-- /wp:group -->',
    ) );

    // 2. Blue Banner Pattern (Your Vision. Our Creation.)
    register_block_pattern( 'mileym3dia/banner-blue-your-vision', array(
        'title'       => __( 'M3 Banner: Your Vision. Our Creation. (Electric Blue)', 'mileym3dia' ),
        'categories'  => array( 'mileym3dia' ),
        'content'     => '<!-- wp:group {"className":"m3-color-banner accent-blue","layout":{"type":"constrained"}} --><div class="wp-block-group m3-color-banner accent-blue" style="background-image:url(' . esc_url( $uri . '/assets/images/banners/plate-blue-your-vision.jpg' ) . ')"><div class="m3-container m3-color-banner-inner"><div><span class="m3-banner-badge">MILEYM<span class="three">3</span>DIA</span><h2 class="m3-banner-headline">YOUR VISION. <span class="accent">OUR CREATION.</span></h2><p>LIMITLESS POSSIBILITIES. PHOTOGRAPHY • VIDEO PRODUCTION • BRANDING • MUSIC PRODUCTION</p></div></div></div><!-- /wp:group -->',
    ) );

    // 3. Purple Banner Pattern (Visuals That Speak.)
    register_block_pattern( 'mileym3dia/banner-purple-visuals-speak', array(
        'title'       => __( 'M3 Banner: Visuals That Speak. (Vivid Purple)', 'mileym3dia' ),
        'categories'  => array( 'mileym3dia' ),
        'content'     => '<!-- wp:group {"className":"m3-color-banner accent-purple","layout":{"type":"constrained"}} --><div class="wp-block-group m3-color-banner accent-purple" style="background-image:url(' . esc_url( $uri . '/assets/images/banners/plate-purple-visuals-speak.jpg' ) . ')"><div class="m3-container m3-color-banner-inner"><div><span class="m3-banner-badge">MILEYM<span class="three">3</span>DIA</span><h2 class="m3-banner-headline">VISUALS THAT <span class="accent">SPEAK.</span></h2><p>BRANDING THAT STICKS. CONTENT THAT CONNECTS.</p></div></div></div><!-- /wp:group -->',
    ) );
}
add_action( 'init', 'm3_register_block_patterns' );
