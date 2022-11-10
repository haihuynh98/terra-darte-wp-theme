<?php
/**
 * Template Name: Full width template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage terra_derate
 * @since TigerGentlemen
 */

get_header(null, ['nav-has-bg' => true]);
?>
<main id="primary" class="site-main">
	<div class="" style="margin-top: 100px">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
	</div>
</main><!-- #main -->

<?php
get_footer(); ?>
