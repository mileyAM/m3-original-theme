<?php
/**
 * Template Name: Client Registration Page
 * Custom-branded M3 dark & crimson registration integrated with WordPress user accounts.
 *
 * @package MILEYM3DIA
 */

get_header();
$uri    = get_template_directory_uri();
$notice = get_transient( 'm3_auth_notice' );
if ( $notice ) {
    delete_transient( 'm3_auth_notice' );
}
?>

<main id="primary" class="site-main">
    <div class="m3-container">
        <div class="m3-auth-wrap">
            <!-- Left Visual Promo -->
            <div style="border-radius:8px;overflow:hidden;border:1px solid var(--m3-border-strong);position:relative;min-height:540px;background:url('<?php echo esc_url( $uri . '/assets/images/projects/project-8-artist-dev.jpg' ); ?>') center/cover;display:flex;flex-direction:column;justify-content:flex-end;padding:36px;">
                <div style="position:absolute;inset:0;background:linear-gradient(180deg, rgba(7,7,9,0.2) 0%, rgba(7,7,9,0.94) 100%);"></div>
                <div style="position:relative;z-index:2;">
                    <span class="m3-banner-badge">JOIN MILEYM<span class="three">3</span>DIA</span>
                    <h1 class="m3-section-title" style="margin-bottom:10px;">
                        ELEVATE YOUR <span class="accent">BRAND &amp; SOUND.</span>
                    </h1>
                    <p style="font-size:0.92rem;color:var(--m3-text-muted);margin-bottom:18px;">
                        Create your free client account to unlock <strong>10% OFF your first project (Code: M3FIRST10)</strong>, submit creative briefs, book studio sessions, and receive high-res deliverables.
                    </p>
                    <ul class="m3-banner-checklist">
                        <li><?php echo m3_get_svg_icon( 'check' ); ?> DIRECT PRODUCER &amp; DIRECTOR MESSAGING</li>
                        <li><?php echo m3_get_svg_icon( 'check' ); ?> 4K VIDEO &amp; LOSSLESS AUDIO DELIVERABLE VAULT</li>
                        <li><?php echo m3_get_svg_icon( 'check' ); ?> PRIORITY STUDIO BOOKING ACCESS</li>
                    </ul>
                </div>
            </div>

            <!-- Right Registration Form -->
            <div class="m3-auth-card">
                <div class="m3-eyebrow">NEW CLIENT ONBOARDING</div>
                <h2 class="m3-section-title" style="font-size:2rem;margin-bottom:8px;">CREATE <span class="accent">CLIENT ACCOUNT</span></h2>
                <p style="font-size:0.86rem;color:var(--m3-text-muted);margin-bottom:22px;">
                    Register below to access the M3 Client Portal and start your next branding, visual, or music production project.
                </p>

                <?php if ( ! empty( $notice ) ) : ?>
                    <div style="background:rgba(229,25,35,0.16);border:1px solid var(--m3-red);color:#fff;padding:12px 16px;border-radius:4px;margin-bottom:18px;font-size:0.85rem;">
                        <?php echo wp_kses_post( $notice['msg'] ); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo esc_url( m3_page_url( 'register' ) ); ?>">
                    <input type="hidden" name="m3_action" value="register">

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                        <div class="m3-form-group">
                            <label class="m3-form-label" for="reg-user">USERNAME *</label>
                            <input type="text" id="reg-user" name="user_login" class="m3-input" placeholder="kaivance" required>
                        </div>
                        <div class="m3-form-group">
                            <label class="m3-form-label" for="reg-email">EMAIL ADDRESS *</label>
                            <input type="email" id="reg-email" name="user_email" class="m3-input" placeholder="kai@label.com" required>
                        </div>
                    </div>

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                        <div class="m3-form-group">
                            <label class="m3-form-label" for="reg-brand">ARTIST / BRAND NAME</label>
                            <input type="text" id="reg-brand" name="brand_name" class="m3-input" placeholder="Elevate Clothing / Kai Vance">
                        </div>
                        <div class="m3-form-group">
                            <label class="m3-form-label" for="reg-niche">PRIMARY FOCUS</label>
                            <select id="reg-niche" name="client_niche" class="m3-select">
                                <option value="Music Production & Artist Dev">Music Production &amp; Artist Dev</option>
                                <option value="Music Video & Cinematography">Music Video &amp; Cinematography</option>
                                <option value="Brand Identity & Commercials">Brand Identity &amp; Commercials</option>
                                <option value="Content Creation & Social">Content Creation &amp; Social</option>
                            </select>
                        </div>
                    </div>

                    <div class="m3-form-group">
                        <label class="m3-form-label" for="reg-pass">CREATE PASSWORD *</label>
                        <input type="password" id="reg-pass" name="user_password" class="m3-input" placeholder="Minimum 8 characters" required>
                    </div>

                    <button type="submit" class="m3-btn m3-btn-primary" style="width:100%;margin-bottom:16px;">
                        REGISTER &amp; ENTER CLIENT PORTAL →
                    </button>
                </form>

                <div style="text-align:center;padding-top:16px;border-top:1px solid var(--m3-border);font-size:0.86rem;color:var(--m3-text-muted);">
                    Already have an M3 account?
                    <a href="<?php echo esc_url( m3_page_url( 'login' ) ); ?>" style="color:var(--m3-red);font-weight:700;margin-left:4px;">Sign In Here →</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
