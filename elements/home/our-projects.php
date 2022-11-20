<?php

if (function_exists('tiger_get_portfolio')): $suffix = pll_current_language()!='en'?pll_current_language():''; ?>
<section class="latest-projects" id="latest_projects">
	<div class="container-fluid">
		<h2 class="title-section">Latest projects</h2>
		<div class="row row-projects">
			<?php
			$portfolio_query = tiger_get_portfolio(null, 12);
			while ($portfolio_query->have_posts()) :
			$portfolio_query->the_post();


			$ProjectID = get_the_ID();
			$ProjectLink = get_permalink($ProjectID);

			$catSlug = "";
			$catName = "";
			$terms = get_the_terms($ProjectID, 'portfolio-cat');
			if (!empty($terms)) {
				// get the first term
				$term = array_shift($terms);
				$catSlug = $term->slug;
				$catName = $term->name;
			}
			$titleProject = get_the_title($ProjectID);
			$urlThumbnail = get_the_post_thumbnail_url($ProjectID, 'portfolio-thumb');
			?>
				<div class="col-lg-3 col-md-4 col-6 item-project">
					<a href="<?= $ProjectLink ?>">
						<img src="<?= $urlThumbnail ?>" alt="<?= $titleProject ?>">
						<div class="title-with-overlay">
							<h1 class="title"><?= $titleProject ?></h1>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
		<?php if (function_exists('getTigerOption')): ?>
			<div class="text-center w-100 pt-5">
				<a href="<?= getTigerOption('home_project_read_more', $suffix) ?>" class="btn btn-readmore ">View projects
					more</a>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif;?>
