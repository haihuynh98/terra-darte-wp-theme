<?php
// add single-banner-full-width style
wp_enqueue_style('single-banner-full-width', get_stylesheet_directory_uri() . '/dist/css/single-banner-full-width.min.css', array(), _S_VERSION);

$urlBannerImg = get_the_post_thumbnail_url(get_the_ID(),'large');

?>
<section class="header-banner" style="background-image: url('<?= $urlBannerImg?>')">
<div class="overlay"></div>
	<div class="container content">
		<h1><?= get_the_title()?></h1>
		<?php if ($projectInfo = get_post_meta(get_the_ID(),'_project_information',true))?>
		<div class="content-center">
			<?=$projectInfo?>
		</div>
	</div>
</section>

<div class="content-single">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();

			the_content(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'terra-darate' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
		endwhile; // End of the loop.
		?>

	</div>
</div>
