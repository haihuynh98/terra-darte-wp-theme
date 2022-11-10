<section class="about-us" id="about_us">
	<div class="container-fluid">
		<div class="content-quote">
			<div class="col-title hide-pc">
				<h2 class="title">About Us</h2>
			</div>
			<div class="col-image hide-tablet hide-mobile"
				 style="background-image: url('<?= getTigerOption('home_image_right_col_about_us')?>')">
			</div>
			<div class="col-content">
				<div class="content">
					<h2 class="title"><?= getTigerOption('home_about_us')?></h2>
					<p><?= getTigerOption('home_about_us_description')?></p>
					<a href="<?= getTigerOption('home_read_more_about_us')?>" class="btn btn-readmore"><?= __('Read more')?></a>
				</div>
				<div class="image">
					<img src="<?= getTigerOption('home_image_about_us')?>" alt="<?= bloginfo( 'name' )?>">
					<div class="shape-below"></div>
				</div>
			</div>
			<div class="col-title-vertical hide-tablet hide-mobile">
				<h2 class="title-vertical">About Us</h2>
			</div>
		</div>
	</div>
</section>
