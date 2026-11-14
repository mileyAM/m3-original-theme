<?php
/**
 * Template Name: Client Login Page
 * Custom-branded M3 dark & crimson login integrated with WordPress user accounts.
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
            <div style="border-radius:8px;overflow:hidden;border:1px solid var(--m3-border-strong);position:relative;min-height:480px;background:url('<?php echo esc_url( $uri . '/assets/images/sections/hero-composite-hd.jpg' ); ?>') center/cover;display:flex;flex-direction:column;justify-content:flex-end;padding:36px;">
                <div style="position:absolute;inset:0;background:linear-gradient(180deg, rgba(7,7,9,0.2) 0%, rgba(7,7,9,0.92) 100%);"></div>
                <div style="position:relative;z-index:2;">
                    <span class="m3-banner-badge">MILEYM<span class="three">3</span>DIA CLIENT HUB</span>
                    <h1 class="m3-section-title" style="margin-bottom:10px;">
                        MANAGE YOUR <span class="accent">PRODUCTIONS.</span>
                    </h1>
                    <p style="font-size:0.92rem;color:var(--m3-text-muted);margin-bottom:18px;">
                        Access rough cuts, master audio stems, brand identity kits, and submit new project briefs directly to our creative team.
                    </p>
                    <div class="m3-promo-code-pill" data-copy-code="M3FIRST10" style="margin:0;">
                        <span>NEW CLIENT PERK: <strong>10% OFF (M3FIRST10)</strong></span>
                    </div>
                </div>
            </div>

            <!-- Right Login Form -->
            <div class="m3-auth-card">
                <div class="m3-eyebrow">WELCOME BACK TO M3</div>
                <h2 class="m3-section-title" style="font-size:2.1rem;margin-bottom:8px;">CLIENT <span class="accent">LOGIN</span></h2>
                <p style="font-size:0.88rem;color:var(--m3-text-muted);margin-bottom:24px;">
                    Sign in with your MILEYM3DIA WordPress account credentials to access your project dashboard.
                </p>

                <?php if ( ! empty( $notice ) ) : ?>
                    <div style="background:rgba(229,25,35,0.16);border:1px solid var(--m3-red);color:#fff;padding:12px 16px;border-radius:4px;margin-bottom:18px;font-size:0.85rem;">
                        <?php echo wp_kses_post( $notice['msg'] ); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo esc_url( m3_page_url( 'login' ) ); ?>">
                    <input type="hidden" name="m3_action" value="login">
                    <div class="m3-form-group">
                        <label class="m3-form-label" for="login-user">USERNAME OR EMAIL ADDRESS *</label>
                        <input type="text" id="login-user" name="user_login" class="m3-input" placeholder="artist@mileym3dia.com" required>
                    </div>

                    <div class="m3-form-group">
                        <label class="m3-form-label" for="login-pass">PASSWORD *</label>
                        <input type="password" id="login-pass" name="user_password" class="m3-input" placeholder="••••••••••••" required>
                    </div>

                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;font-size:0.84rem;color:var(--m3-text-muted);">
                        <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">
                            <input type="checkbox" name="remember" value="1" checked> Remember me
                        </label>
                        <a href="<?php echo esc_url( m3_page_url( 'portal' ) ); ?>" style="color:var(--m3-red);">Demo Portal Preview →</a>
                    </div>

                    <button type="submit" class="m3-btn m3-btn-primary" style="width:100%;margin-bottom:16px;">
                        SIGN IN TO CLIENT PORTAL →
                    </button>
                </form>

                <div style="text-align:center;padding-top:16px;border-top:1px solid var(--m3-border);font-size:0.86rem;color:var(--m3-text-muted);">
                    Need a client account for branding, video, or music production?
                    <a href="<?php echo esc_url( m3_page_url( 'register' ) ); ?>" style="color:var(--m3-red);font-weight:700;margin-left:4px;">Create Account →</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
