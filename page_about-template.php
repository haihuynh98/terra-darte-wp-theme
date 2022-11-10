<?php

/**
 * Template Name: About us page template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage terra_derate
 * @since TigerGentlemen
 */

get_header();
?>

<main class="main-page">

	<section class="banner-title-page" id="banner_tittle_page"
			 style="background-image: url('<?=get_the_post_thumbnail_url(get_the_ID(), 'lager')?>')">
		<div class="container-fluid d-flex justify-content-between align-items-center title-wrap">
			<h2 class="title" ><?= get_the_title();?></h2>
			<p id="breadcrumbs"><span><span><a href="/">Home</a> <i class="fa-solid fa-chevron-right"></i> <span><a
								href="#"><?= get_the_title();?></a></span></span></span></p>
		</div>
		<div class="overlay"></div>
	</section>
	<div class="body-content">
		<div class="container-fluid content-wrap all-child-mt-20" >
			<div data-aos="fade-up">
				<p class="px-lg-5" ><?= get_the_content();?></p>
			</div>

			<div class="row-2-side bg-gray-light">
				<div class="left-side col-image" data-aos="fade-right" >
					<img src="<?= get_post_meta(get_the_ID(), '_image_url_s1',true)?>" alt="terra">
				</div>
				<div class="right-side col-content d-flex align-items-center">
					<div class="content p-5" data-aos="fade-left" data-aos-delay="100">
						<h2 class="title text-uppercase"><?= get_post_meta(get_the_ID(), '_heading_s1',true)?></h2>
						<div class="text-middle-line text-secondary middle-line-secondary bg">
							<p class="text text-uppercase bg-gray-light font-size-15"><span class="bg-gray-light"><?= get_post_meta(get_the_ID(), '_subtext_s1',true)?></span></p>
						</div>
						<p class="mt-3"><?= get_post_meta(get_the_ID(), '_content_s1',true)?></p>
					</div>
				</div>
			</div>

			<ul class="row-analyze">
				<?php for ($i = 1; $i <= 3; $i++): ?>
				<li class="d-flex flex-column justify-content-center text-center"  data-aos="fade-up" data-aos-delay="<?=$i*2?>00">
					<span class="font-size-30 text-bold d-block"><?= get_post_meta(get_the_ID(), '_number_analyze_c'.$i,true)?></span>
					<span class="font-size-18 d-block text-secondary"><?= get_post_meta(get_the_ID(), '_name_analyze_c'.$i,true)?></span>
				</li>
				<?php endfor;?>
			</ul>

			<?php if (get_post_meta(get_the_ID(), '_enable_projects', true)):?>
			<div class="bg-img-content-center"
				 style="background-image: url('<?= get_post_meta(get_the_ID(), '_background_image_project_url', true)?>')" data-aos="fade-up">
				<div class="container-fluid d-flex justify-content-between align-items-center title-wrap" data-aos="flip-left" data-aos-delay="200">
					<h2 class="title">Projects</h2>
					<a href="#view-projects" class="btn btn-readmore">View Projects</a>
				</div>
				<div class="overlay"></div>
			</div>
			<?php endif;?>

			<div class="row-2-side bg-gray-light">
				<div class="left-side col-image" data-aos="fade-right" >
					<img src="<?= get_post_meta(get_the_ID(), '_image_url_s2',true)?>" alt="terra">
				</div>
				<div class="right-side col-content d-flex align-items-center">
					<div class="content p-5" data-aos="fade-left" data-aos-delay="100">
						<h2 class="title text-uppercase"><?= get_post_meta(get_the_ID(), '_heading_s2',true)?></h2>
						<div class="text-middle-line text-secondary middle-line-secondary bg" >
							<p class="text text-uppercase bg-gray-light font-size-15"><span class="bg-gray-light"><?= get_post_meta(get_the_ID(), '_subtext_s2',true)?></span></p>
						</div>
						<p class="mt-3"><?= get_post_meta(get_the_ID(), '_content_s2',true)?></p>
					</div>
				</div>
			</div>


		</div>
	</div>
</main>
<?php
get_footer(); ?>
