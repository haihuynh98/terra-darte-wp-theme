<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Terra_D\'arate
 */

get_header(null, ['nav-has-bg' => true]);
$mainID = $class = 'single';

if ($portfolioTemplate = get_post_meta(get_the_ID(), '_tiger_portfolio_template', true)) {
	$mainID = 'single' . '_' . $portfolioTemplate;
	$class = 'single-' . $portfolioTemplate;
}

?>

	<main id="<?= $mainID ?>" class="site-main <?= $class?>">

		<?php echo get_template_part('template-parts/single/single', $portfolioTemplate); ?>

	</main><!-- #main -->

<?php
get_footer();
