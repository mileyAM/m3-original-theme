<?php
/**
 * The footer for MILEYM3DIA (M3) Theme
 *
 * @package MILEYM3DIA
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$uri = get_template_directory_uri();
?>

<footer class="m3-footer" id="site-footer">
    <div class="m3-container">
        <div class="m3-footer-grid">
            <!-- Col 1: Brand & Socials -->
            <div>
                <a href="<?php echo esc_url( m3_page_url( 'home' ) ); ?>" class="m3-logo">
                    MILEYM<span class="m3-three">3</span>DIA
                </a>
                <p class="m3-footer-tagline">
                    <?php echo esc_html( m3_mod( 'm3_footer_tagline', "WE CREATE. WE CAPTURE.\nWE ELEVATE." ) ); ?>
                </p>
                <div class="m3-social-row">
                    <a href="https://instagram.com" target="_blank" rel="noopener" class="m3-social-icon" aria-label="Instagram">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <a href="https://youtube.com" target="_blank" rel="noopener" class="m3-social-icon" aria-label="YouTube">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                    </a>
                    <a href="https://tiktok.com" target="_blank" rel="noopener" class="m3-social-icon" aria-label="TikTok">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"/></svg>
                    </a>
                    <a href="https://x.com" target="_blank" rel="noopener" class="m3-social-icon" aria-label="X">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4l11.733 16h4.267l-11.733 -16z"/><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"/></svg>
                    </a>
                    <a href="https://facebook.com" target="_blank" rel="noopener" class="m3-social-icon" aria-label="Facebook">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div>
                <h4 class="m3-footer-heading">QUICK LINKS</h4>
                <ul class="m3-footer-links">
                    <li><a href="<?php echo esc_url( m3_page_url( 'home' ) ); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'about' ) ); ?>">About</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>">Services</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>">Work</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'pricing' ) ); ?>">Pricing</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>">Blog</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>">Contact</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'portal' ) ); ?>">Client Portal</a></li>
                </ul>
            </div>

            <!-- Col 3: Services -->
            <div>
                <h4 class="m3-footer-heading">SERVICES</h4>
                <ul class="m3-footer-links">
                    <li><a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#videography">Videography</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#photography">Photography</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#branding">Branding</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#graphic">Graphic Design</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#content">Content Creation</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#editing">Video Editing</a></li>
                    <li><a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>#music">Music Production</a></li>
                </ul>
            </div>

            <!-- Col 4: Contact -->
            <div>
                <h4 class="m3-footer-heading">CONTACT US</h4>
                <ul class="m3-contact-list">
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        <span><?php echo esc_html( m3_mod( 'm3_contact_email', 'info@mileym3dia.com' ) ); ?></span>
                    </li>
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <span><?php echo esc_html( m3_mod( 'm3_contact_phone', '(123) 456-7890' ) ); ?></span>
                    </li>
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span><?php echo esc_html( m3_mod( 'm3_contact_location', 'Los Angeles, CA' ) ); ?></span>
                    </li>
                </ul>
            </div>

            <!-- Col 5: Newsletter + M3 Emblem -->
            <div style="display:flex;flex-direction:column;justify-content:space-between;">
                <div>
                    <h4 class="m3-footer-heading">STAY UPDATED</h4>
                    <p style="font-size:0.8rem;color:var(--m3-text-muted);">Get tips, studio updates and behind-the-scenes content.</p>
                    <form class="m3-newsletter-form" onsubmit="event.preventDefault(); this.querySelector('button').textContent='SUBSCRIBED ✓';">
                        <input type="email" placeholder="Your email" required aria-label="Email for newsletter">
                        <button type="submit">SUBSCRIBE</button>
                    </form>
                </div>
                <div style="text-align:right;margin-top:16px;">
                    <span class="m3-emblem" aria-hidden="true">
                        <span class="emblem-m">M</span><span class="emblem-3">3</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="m3-footer-bottom">
            <div><?php echo esc_html( m3_mod( 'm3_footer_copyright', '© 2024 MILEYM3DIA. All Rights Reserved.' ) ); ?></div>
            <div style="display:flex;gap:18px;">
                <a href="<?php echo esc_url( m3_page_url( 'privacy-policy' ) ); ?>">Privacy Policy</a>
                <span>|</span>
                <a href="<?php echo esc_url( m3_page_url( 'terms' ) ); ?>">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>

<!-- Showreel & Project Case Study Lightbox Modal -->
<div class="m3-modal-backdrop" id="m3-showreel-modal" role="dialog" aria-modal="true" aria-labelledby="m3-modal-title">
    <div class="m3-modal-box">
        <div style="position:relative;aspect-ratio:16/9;background:#050507;overflow:hidden;">
            <img id="m3-modal-image" src="<?php echo esc_url( $uri . '/assets/images/banners/banner-red-bring-to-life.jpg' ); ?>" alt="Showreel Preview" style="width:100%;height:100%;object-fit:cover;opacity:0.78;">
            <div style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;background:radial-gradient(circle, rgba(229,25,35,0.2) 0%, rgba(7,7,9,0.75) 100%);">
                <div class="m3-project-play" style="width:68px;height:68px;background:var(--m3-red);border-color:#fff;">
                    <?php echo m3_get_svg_icon( 'play' ); ?>
                </div>
                <span style="margin-top:12px;font-family:var(--m3-font-mono);font-size:0.75rem;letter-spacing:0.18em;text-transform:uppercase;">4K CINEMA MASTER STREAM • M3 STUDIOS</span>
            </div>
            <button type="button" id="m3-modal-close" style="position:absolute;top:14px;right:14px;width:36px;height:36px;border-radius:50%;background:rgba(0,0,0,0.75);border:1px solid rgba(255,255,255,0.25);color:#fff;cursor:pointer;font-size:1rem;">✕</button>
        </div>
        <div style="padding:24px 28px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
            <div style="max-width:520px;">
                <span id="m3-modal-client" style="font-family:var(--m3-font-mono);font-size:0.72rem;letter-spacing:0.14em;color:var(--m3-red);text-transform:uppercase;">MILEYM3DIA SHOWREEL</span>
                <h3 id="m3-modal-title" style="font-family:var(--m3-font-display);font-size:1.5rem;text-transform:uppercase;margin:4px 0 8px;">OFFICIAL 4K PRODUCTION REEL</h3>
                <p id="m3-modal-summary" style="font-size:0.88rem;color:var(--m3-text-muted);">High-impact cinematography, music production, artist development, and brand visuals.</p>
            </div>
            <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-primary">BOOK THIS STYLE</a>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
