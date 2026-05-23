<?php
/**
 * Title: Hero with CTA
 * Slug: thecleanguys/hero-cta
 * Categories: thecleanguys
 * Description: Page hero with H1, subhead, primary + secondary CTA, and trust strip.
 * Keywords: hero, cta, header
 */
?>
<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"},"style":{"spacing":{"padding":{"top":"60px","bottom":"40px"}}}} -->
<div class="wp-block-group" style="padding-top:60px;padding-bottom:40px">

	<!-- wp:heading {"level":1,"textAlign":"center","style":{"typography":{"fontSize":"42px","letterSpacing":"-0.5px","lineHeight":"1.15"}}} -->
	<h1 class="wp-block-heading has-text-align-center" style="font-size:42px;letter-spacing:-0.5px;line-height:1.15">You call, we clean.</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px"},"color":{"text":"#555555"}}} -->
	<p class="has-text-align-center has-text-color" style="color:#555555;font-size:18px">Las Vegas's trusted cleaning team for windows, move-outs, post-construction, and commercial spaces. Licensed, bonded, and insured since 2022.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-tcg-primary"} -->
		<div class="wp-block-button is-style-tcg-primary"><a class="wp-block-button__link wp-element-button" href="/get-a-quote">Get a free quote</a></div>
		<!-- /wp:button -->

		<!-- wp:button {"style":{"color":{"background":"#ffffff","text":"#1a1a1a"},"border":{"width":"1.5px","color":"#e5e5e0","radius":"10px"}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" href="tel:7025514878" style="border-color:#e5e5e0;border-width:1.5px;border-radius:10px;color:#1a1a1a;background-color:#ffffff">📞 702-551-4878</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:shortcode -->
	[tcg_trust_strip]
	<!-- /wp:shortcode -->

</div>
<!-- /wp:group -->
