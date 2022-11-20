<?php $suffix = pll_current_language()!='en'?pll_current_language():''; ?>
<section class="about-us" id="about_us">
	<div class="container-fluid">
		<div class="content-quote">
			<div class="col-title hide-pc">
				<h2 class="title"><?= pll__('About us')?></h2>
			</div>
			<div class="col-image hide-tablet hide-mobile"
				 style="background-image: url('<?= getTigerOption('home_image_right_col_about_us', $suffix)?>')">
			</div>
			<div class="col-content">
				<div class="content">
					<h2 class="title"><?= getTigerOption('home_about_us', $suffix)?></h2>
					<p><?= getTigerOption('home_about_us_description', $suffix)?></p>
					<a href="<?= getTigerOption('home_read_more_about_us', $suffix)?>" class="btn btn-readmore"><?= __('Read more')?></a>
				</div>
				<div class="image">
					<img src="<?= getTigerOption('home_image_about_us', $suffix)?>" alt="<?= bloginfo( 'name' )?>">
					<div class="shape-below"></div>
				</div>
			</div>
			<div class="col-title-vertical hide-tablet hide-mobile">
				<h2 class="title-vertical"><?= pll__('About us')?></h2>
			</div>
		</div>
	</div>
</section>
