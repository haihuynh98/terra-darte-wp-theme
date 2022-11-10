<div class="container content text-center">
	<h1><?= get_the_title()?></h1>
</div>
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
