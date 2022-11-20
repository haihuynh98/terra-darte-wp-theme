<?php
/**
 * Template Name: Portfolio page template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage terra_derate
 * @since TigerGentlemen
 */

get_header(null, ['nav-has-bg' => true]);
?>

<main class="main-page">

	<!-- ======= Works Section ======= -->
	<section class="section site-portfolio">
		<div class="container">
			<div class="row mb-5 align-items-center">
				<div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
					<h2><?= pll__('Our Services')?></h2>
					<p class="mb-0"><?= pll__('Interior Design &amp; Professional Graphics Designer')?></p>
				</div>
				<div class="col-md-12 col-lg-6 text-start text-lg-end" data-aos="fade-up" data-aos-delay="100">
					<div id="filters" class="filters">
						<a href="#" data-filter="*" class="active">All</a>
						<?php
						$portfolio_cats = tiger_get_portfolio_cats();
						foreach ($portfolio_cats as $portfolio_cat) :?>
							<a href="#" data-filter=".<?= $portfolio_cat->slug ?>"><?= $portfolio_cat->name ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
				<?php
				$portfolio_query = tiger_get_portfolio();
				while ($portfolio_query->have_posts()) :
					$portfolio_query->the_post();


					$ProjectID = get_the_ID();
					$ProjectLink = get_permalink($ProjectID);

					$catSlug = "";
					$catName = "";
					$terms = get_the_terms( $ProjectID, 'portfolio-cat' );
					if ( !empty( $terms ) ){
						// get the first term
						$term = array_shift( $terms );
						$catSlug = $term->slug;
						$catName = $term->name;
					}
					$titleProject = get_the_title($ProjectID);
					$urlThumbnail = get_the_post_thumbnail_url($ProjectID,'large');
					?>
					<div class="item <?= $catSlug?> col-sm-6 col-md-4 col-lg-4 mb-4" data-aos="fade-up" id="<?= 'portfolio_'.$ProjectID?>">
						<a href="<?= $ProjectLink?>" class="item-wrap fancybox">
							<div class="work-info">
								<h3><?= $titleProject?></h3>
								<span><?= $catName?></span>
							</div>
							<img class="img-fluid" src="<?= $urlThumbnail?>">
						</a>
					</div>
				<?php endwhile;
				wp_reset_postdata();
				?>

			</div>
		</div>
	</section><!-- End  Works Section -->
	<?php $customers = getClientsListingArray();

	if (count($customers)>0):
	?>
	<!-- ======= Clients Section ======= -->
	<section class="section">
		<div class="container">
			<div class="row justify-content-center text-center mb-4">
				<div class="col-5">
					<h3 class="h3 heading"><?= pll__('My Clients')?></h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.</p>
				</div>
			</div>
			<div class="row">
				<?php
					foreach ( $customers as $customer ):?>
				<div class="col-4 col-sm-4 col-md-2">
					<a href="#" class="client-logo"><img src="<?= $customer['logo']?>" alt="<?= $customer['name']?>"
														 class="img-fluid"></a>
				</div>
				<?php endforeach;?>

			</div>
		</div>
	</section><!-- End Clients Section -->
	<?php endif ;?>
</main>
<?php
get_footer(); ?>
