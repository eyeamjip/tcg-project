<?php
/**
 * The Clean Guys Child Theme — functions.php
 *
 * - Enqueues parent (Kadence) and child stylesheets
 * - Registers custom block patterns under "TCG" category
 * - Provides shortcodes for sticky mobile call bar, trust strip
 * - Adds GA4 conversion event hooks for phone, email, SMS, and form clicks
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/* =========================================================
 * Theme setup
 * ========================================================= */
add_action( 'after_setup_theme', function () {
	load_child_theme_textdomain( 'thecleanguys-child', get_stylesheet_directory() . '/languages' );
} );

/* =========================================================
 * Enqueue styles
 * ========================================================= */
add_action( 'wp_enqueue_scripts', function () {
	$parent_handle = 'kadence-style';

	// Parent first, then child override.
	wp_enqueue_style( $parent_handle, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style(
		'tcg-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_handle ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'tcg-child-scripts',
		get_stylesheet_directory_uri() . '/assets/js/site.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}, 20 );

/* =========================================================
 * Register block-pattern category
 * ========================================================= */
add_action( 'init', function () {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'thecleanguys',
			array( 'label' => __( 'The Clean Guys', 'thecleanguys-child' ) )
		);
	}
} );

/* =========================================================
 * Shortcode: sticky mobile call bar
 * Usage: [tcg_mobile_bar]
 * ========================================================= */
add_shortcode( 'tcg_mobile_bar', function () {
	ob_start();
	?>
	<nav class="tcg-mobile-bar" aria-label="Quick contact">
		<a href="tel:7025514878" class="tcg-call" data-tcg-event="phone_click">📞 Call</a>
		<a href="sms:7025514878" class="tcg-text" data-tcg-event="sms_click">💬 Text</a>
		<a href="/get-a-quote" class="tcg-quote" data-tcg-event="quote_click">Get a quote</a>
	</nav>
	<?php
	return ob_get_clean();
} );

/* =========================================================
 * Shortcode: trust strip
 * Usage: [tcg_trust_strip]
 * ========================================================= */
add_shortcode( 'tcg_trust_strip', function () {
	ob_start();
	?>
	<div class="tcg-trust-strip" role="list">
		<span role="listitem">Licensed, bonded, insured</span>
		<span role="listitem">5-star on Google &amp; Yelp</span>
		<span role="listitem">Locally owned</span>
	</div>
	<?php
	return ob_get_clean();
} );

/* =========================================================
 * Inject sticky mobile bar site-wide (mobile only via CSS)
 * ========================================================= */
add_action( 'wp_footer', function () {
	echo do_shortcode( '[tcg_mobile_bar]' );
} );

/* =========================================================
 * GA4 conversion event helper
 * Fires on phone, email, SMS, and quote click via data-tcg-event attribute
 * ========================================================= */
add_action( 'wp_footer', function () {
	?>
	<script>
		(function () {
			document.addEventListener('click', function (e) {
				const target = e.target.closest('[data-tcg-event]');
				if (!target) return;
				const eventName = target.getAttribute('data-tcg-event');
				if (typeof gtag === 'function') {
					gtag('event', eventName, {
						event_category: 'engagement',
						event_label: target.href || '',
						value: 1
					});
				}
			});
		})();
	</script>
	<?php
}, 99 );

/* =========================================================
 * Auto-add tel:, mailto:, sms: links with data-tcg-event for GA4
 * Filter: thecleanguys/auto_track_links
 * ========================================================= */
add_filter( 'the_content', function ( $content ) {
	if ( ! apply_filters( 'thecleanguys/auto_track_links', true ) ) {
		return $content;
	}
	$content = preg_replace_callback(
		'/<a\s+([^>]*?)href="(tel:|mailto:|sms:)([^"]+)"([^>]*)>/i',
		function ( $matches ) {
			$type = rtrim( $matches[2], ':' );
			$event_map = array(
				'tel'    => 'phone_click',
				'mailto' => 'email_click',
				'sms'    => 'sms_click',
			);
			$event = $event_map[ $type ] ?? 'link_click';
			if ( strpos( $matches[0], 'data-tcg-event' ) !== false ) {
				return $matches[0];
			}
			return sprintf(
				'<a %shref="%s%s"%s data-tcg-event="%s">',
				$matches[1],
				$matches[2],
				$matches[3],
				$matches[4],
				esc_attr( $event )
			);
		},
		$content
	);
	return $content;
} );

/* =========================================================
 * Disable XML-RPC (security hardening)
 * ========================================================= */
add_filter( 'xmlrpc_enabled', '__return_false' );

/* =========================================================
 * Hide WordPress version from frontend
 * ========================================================= */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

/* =========================================================
 * Skip-to-content link (accessibility)
 * ========================================================= */
add_action( 'wp_body_open', function () {
	echo '<a class="tcg-skip-link" href="#content">Skip to content</a>';
} );

/* =========================================================
 * Quote form: pre-fill service from URL parameter
 * Reads ?service=window|move|post-construction|commercial
 * ========================================================= */
add_action( 'wp_footer', function () {
	if ( ! is_page( 'get-a-quote' ) ) { return; }
	?>
	<script>
		(function () {
			const params = new URLSearchParams(window.location.search);
			const service = params.get('service');
			if (!service) return;
			document.addEventListener('DOMContentLoaded', function () {
				const tile = document.querySelector(`[data-service="${service}"]`);
				if (tile) {
					tile.click();
				}
			});
		})();
	</script>
	<?php
} );
