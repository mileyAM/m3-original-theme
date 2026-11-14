<?php
/**
 * Template Name: 08 Privacy Policy Page
 *
 * @package MILEYM3DIA
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="m3-services-section" style="padding:72px 0;">
        <div class="m3-container" style="max-width:860px;">
            <div class="m3-eyebrow">08 • LEGAL &amp; DATA PROTECTION</div>
            <h1 class="m3-section-title" style="margin-bottom:24px;">PRIVACY <span class="accent">POLICY</span></h1>

            <div class="m3-portal-card" style="display:grid;gap:18px;color:rgba(255,255,255,0.85);line-height:1.75;">
                <p><strong>Effective Date:</strong> January 1, 2024 &nbsp;|&nbsp; <strong>Agency:</strong> MILEYM3DIA (M3)</p>
                <h3 class="m3-service-title" style="text-align:left;">1. Information We Collect</h3>
                <p>When you register for an M3 Client Portal account, submit a project brief, or subscribe to our studio insights newsletter, we collect your name, artist/brand name, email address, phone number, and project reference files necessary to scope and deliver your creative production.</p>

                <h3 class="m3-service-title" style="text-align:left;">2. How We Use Client &amp; Production Data</h3>
                <p>Your information and unreleased audio/video stems are kept strictly confidential inside our encrypted studio pipeline and used solely to manage your production milestones, revisions, and final deliverables.</p>

                <h3 class="m3-service-title" style="text-align:left;">3. Contact Privacy Officer</h3>
                <p>For any questions regarding data privacy or account deletion requests, contact us at <strong><?php echo esc_html( m3_mod( 'm3_contact_email', 'info@mileym3dia.com' ) ); ?></strong>.</p>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
