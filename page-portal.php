<?php
/**
 * Template Name: Client Portal Dashboard (page-portal.php)
 * Allows clients to submit branding/video/music briefs, track project milestones,
 * apply promo code M3FIRST10, and download master deliverables.
 *
 * @package MILEYM3DIA
 */

get_header();
$uri             = get_template_directory_uri();
$client_projects = m3_get_client_projects();
$selected_pkg    = isset( $_GET['package'] ) ? sanitize_text_field( wp_unslash( $_GET['package'] ) ) : 'STANDARD';
$selected_srv    = isset( $_GET['service'] ) ? sanitize_text_field( wp_unslash( $_GET['service'] ) ) : 'Videography + Branding';
$notice          = get_transient( 'm3_auth_notice' );
if ( $notice ) {
    delete_transient( 'm3_auth_notice' );
}
?>

<main id="primary" class="site-main">

    <!-- Top Portal Header -->
    <section class="m3-color-banner accent-red" style="background-image: url('<?php echo esc_url( $uri . '/assets/images/banners/plate-vision-meets-execution.jpg' ); ?>');padding:44px 0;">
        <div class="m3-container" style="position:relative;z-index:2;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:18px;">
            <div>
                <span class="m3-banner-badge">MILEYM<span class="three">3</span>DIA CLIENT PORTAL</span>
                <h1 class="m3-section-title" style="font-size:2.2rem;">
                    CREATIVE PRODUCTION &amp; <span class="accent">BRANDING HUB</span>
                </h1>
            </div>
            <div style="display:flex;gap:10px;align-items:center;">
                <div class="m3-promo-code-pill" data-copy-code="M3FIRST10" style="margin:0;">
                    <span>ACTIVE PERK: <strong>M3FIRST10 (10% OFF)</strong></span>
                </div>
                <a href="<?php echo esc_url( m3_page_url( 'login' ) ); ?>" class="m3-btn m3-btn-outline m3-btn-sm">SWITCH ACCOUNT</a>
            </div>
        </div>
    </section>

    <div class="m3-container">
        <?php if ( ! empty( $notice ) ) : ?>
            <div style="margin-top:28px;background:rgba(197,232,0,0.15);border:1px solid var(--m3-green);color:#fff;padding:16px 20px;border-radius:6px;">
                <?php echo esc_html( $notice['msg'] ); ?>
            </div>
        <?php endif; ?>

        <div class="m3-portal-grid">
            <!-- Left Sidebar: Client Profile & Quick Stats -->
            <aside class="m3-portal-sidebar">
                <div style="display:flex;align-items:center;gap:12px;padding-bottom:18px;border-bottom:1px solid var(--m3-border);margin-bottom:18px;">
                    <img src="<?php echo esc_url( $uri . '/assets/images/avatars/avatar-jaylen-hd.jpg' ); ?>" alt="Client Avatar" style="width:52px;height:52px;border-radius:50%;object-fit:cover;border:2px solid var(--m3-red);">
                    <div>
                        <div style="font-family:var(--m3-font-display);font-size:1.05rem;font-weight:700;text-transform:uppercase;">
                            <?php echo is_user_logged_in() ? esc_html( wp_get_current_user()->display_name ) : 'VIP STUDIO CLIENT'; ?>
                        </div>
                        <div style="font-size:0.76rem;color:var(--m3-green);">● Verified M3 Partner</div>
                    </div>
                </div>

                <ul style="display:grid;gap:10px;font-family:var(--m3-font-display);font-size:0.86rem;letter-spacing:0.06em;text-transform:uppercase;margin-bottom:24px;">
                    <li><a href="#active-pipeline" style="color:var(--m3-red);">01. Active Productions (<?php echo count( $client_projects ); ?>)</a></li>
                    <li><a href="#new-brief">02. Submit New Project Brief</a></li>
                    <li><a href="#brand-kit">03. Brand Assets &amp; Stems Vault</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'pricing' ) ); ?>">04. Upgrade Package</a></li>
                </ul>

                <div style="background:#0B0B10;border:1px solid var(--m3-border);border-radius:6px;padding:16px;">
                    <div style="font-family:var(--m3-font-mono);font-size:0.7rem;color:var(--m3-red);letter-spacing:0.12em;text-transform:uppercase;margin-bottom:6px;">DEDICATED PRODUCER</div>
                    <div style="font-family:var(--m3-font-display);font-size:0.95rem;">MILEY (M3 STUDIO DESK)</div>
                    <div style="font-size:0.8rem;color:var(--m3-text-muted);margin-top:4px;">Direct line: (123) 456-7890</div>
                </div>
            </aside>

            <!-- Main Portal Workspace -->
            <div>
                <!-- Section 1: Active Productions & Deliverables -->
                <div class="m3-portal-card" id="active-pipeline">
                    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:20px;">
                        <div>
                            <div class="m3-eyebrow">LIVE STUDIO TRACKER</div>
                            <h2 class="m3-section-title" style="font-size:1.65rem;">ACTIVE <span class="accent">PROJECTS &amp; DELIVERABLES</span></h2>
                        </div>
                        <a href="#new-brief" class="m3-btn m3-btn-primary m3-btn-sm">+ NEW PROJECT BRIEF</a>
                    </div>

                    <div style="display:grid;gap:16px;">
                        <?php foreach ( $client_projects as $cp ) : ?>
                            <div style="background:#0B0B10;border:1px solid var(--m3-border-strong);border-radius:6px;padding:20px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
                                <div>
                                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                                        <span class="m3-status-pill <?php echo esc_attr( $cp['status_type'] ); ?>">● <?php echo esc_html( $cp['status'] ); ?></span>
                                        <span style="font-family:var(--m3-font-mono);font-size:0.72rem;color:var(--m3-text-dim);"><?php echo esc_html( $cp['date'] ); ?></span>
                                    </div>
                                    <h3 style="font-family:var(--m3-font-display);font-size:1.15rem;letter-spacing:0.04em;text-transform:uppercase;margin-bottom:4px;">
                                        <?php echo esc_html( $cp['title'] ); ?>
                                    </h3>
                                    <div style="font-size:0.82rem;color:var(--m3-text-muted);">
                                        <strong>Service:</strong> <?php echo esc_html( $cp['service'] ); ?> &nbsp;|&nbsp;
                                        <strong>Package:</strong> <?php echo esc_html( $cp['package'] ); ?>
                                    </div>
                                    <div style="font-size:0.8rem;color:var(--m3-green);margin-top:6px;">
                                        📦 Deliverable: <?php echo esc_html( $cp['deliverable'] ); ?>
                                    </div>
                                </div>

                                <div style="display:flex;gap:10px;">
                                    <button type="button" class="m3-btn m3-btn-outline m3-btn-sm" data-open-showreel="1"
                                        data-title="<?php echo esc_attr( $cp['title'] ); ?>"
                                        data-client="<?php echo esc_attr( $cp['package'] ); ?>"
                                        data-summary="<?php echo esc_attr( $cp['deliverable'] ); ?>">
                                        PREVIEW CUT
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Section 2: Submit a New Branding / Video / Music Brief -->
                <div class="m3-portal-card" id="new-brief">
                    <div class="m3-eyebrow">BOOKING &amp; CREATIVE BRIEF</div>
                    <h2 class="m3-section-title" style="font-size:1.65rem;margin-bottom:18px;">START A NEW <span class="accent">M3 PRODUCTION</span></h2>

                    <form method="post" action="<?php echo esc_url( m3_page_url( 'portal' ) ); ?>">
                        <input type="hidden" name="m3_action" value="submit_brief">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                            <div class="m3-form-group">
                                <label class="m3-form-label" for="brief-title">PROJECT / SONG / CAMPAIGN TITLE *</label>
                                <input type="text" id="brief-title" name="project_title" class="m3-input" placeholder="e.g. Summer Brand Capsule / Single Visual" required>
                            </div>
                            <div class="m3-form-group">
                                <label class="m3-form-label" for="brief-service">CREATIVE SERVICE</label>
                                <select id="brief-service" name="service_type" class="m3-select">
                                    <option value="<?php echo esc_attr( $selected_srv ); ?>"><?php echo esc_html( $selected_srv ); ?></option>
                                    <option value="Videography & 4K Music Video">Videography &amp; 4K Music Video</option>
                                    <option value="Music Production, Beat & Mixing">Music Production, Beat &amp; Mixing</option>
                                    <option value="Artist Development 360 Rollout">Artist Development 360° Rollout</option>
                                    <option value="Branding & Graphic Identity">Branding &amp; Graphic Identity</option>
                                    <option value="Photography & Editorial Shoot">Photography &amp; Editorial Shoot</option>
                                    <option value="Content Creation & Video Editing">Content Creation &amp; Video Editing</option>
                                </select>
                            </div>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                            <div class="m3-form-group">
                                <label class="m3-form-label" for="brief-pkg">SELECT PACKAGE TIER</label>
                                <select id="brief-pkg" name="package_tier" class="m3-select">
                                    <option value="BASIC ($499)" <?php selected( $selected_pkg, 'BASIC' ); ?>>BASIC — $499 / Project</option>
                                    <option value="STANDARD ($999)" <?php selected( $selected_pkg, 'STANDARD' ); ?>>STANDARD — $999 / Project (Most Popular)</option>
                                    <option value="PREMIUM ($1999)" <?php selected( $selected_pkg, 'PREMIUM' ); ?>>PREMIUM — $1,999 / Project (Full Production)</option>
                                </select>
                            </div>
                            <div class="m3-form-group">
                                <label class="m3-form-label" for="brief-promo">PROMO CODE (10% OFF FIRST PROJECT)</label>
                                <input type="text" id="brief-promo" name="promo_code" class="m3-input" value="M3FIRST10">
                            </div>
                        </div>

                        <div class="m3-form-group">
                            <label class="m3-form-label" for="brief-details">CREATIVE DIRECTION, REFERENCES &amp; DELIVERABLE GOALS *</label>
                            <textarea id="brief-details" name="project_details" rows="4" class="m3-textarea" placeholder="Describe your visual moodboard, sonic references, branding deliverables, and target completion date..." required></textarea>
                        </div>

                        <button type="submit" class="m3-btn m3-btn-primary">
                            LAUNCH PROJECT IN PIPELINE →
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
get_footer();
