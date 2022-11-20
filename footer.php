<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Terra_D\'arate
 */

?>

<footer class="common-footer" id="common_footer">
	<div class="line-contact-us">
		<div class="container-fluid">
			<h4 class="text-contact-us"><?= pll__('Contact us today for a no-obligation Design Consultation!')?> <a
					href="<?= esc_attr(get_option('tiger_contact_page_uri')) ?>"
					class="btn btn-booknow"><?= pll__('Book now')?> </a></h4>
		</div>
	</div>
	<div class="info-page-wrap">
		<div class="container-fluid content-info">
			<h4 class="name-brand"><?= bloginfo( 'name' )?></h4>
			<address>8/6 Võ Trường Toản, P. An Phú, TP. Thủ Đức, TP. Hồ Chí Minh, Việt Nam | <a href="tell:0317449965">0317449965</a>
			</address>
			<ul class="social-contact">
				<li><a href="#facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
				<li><a href="#twitter"><i class="fa-brands fa-twitter"></i></a></li>
				<li><a href="#instagram"><i class="fa-brands fa-instagram"></i></a></li>
				<li><a href="#pinterest"><i class="fa-brands fa-pinterest-p"></i></a></li>
			</ul>
			<div class="text-copyright">
				<p>Copyright © 2022 CÔNG TY TNHH TERRA D'ARTE. </p>
				<p>Design and powered by <a href="https://tigergentlemen.com">TigerGentlemen</a></p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
