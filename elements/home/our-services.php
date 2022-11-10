<section class="our-services" id="our_services">
	<div class="container-fluid">
		<h2 class="title-section text-uppercase">Our Services</h2>
		<div class="row-services">
			<?php for ($i = 1; $i <= 5; $i++):
				if (getTigerOption('home_services_heading_' . $i)):?>
					<div class="item <?= $i==1?'active':'' ?>">
						<a href="<?= getTigerOption('home_services_url_' . $i) ?>">
							<img src="<?= getTigerOption('home_services_image_' . $i) ?>" alt="<?= bloginfo('name') ?>"
								 style="background-color: darkgrey">
							<div class="content overlay">
								<h2 class="name"><?= getTigerOption('home_services_heading_' . $i) ?></h2>
								<p class="text-extra"><?= getTigerOption('home_services_description_' . $i) ?></p>
								<?= getTigerOption('home_services_icon_' . $i) ?>
							</div>
						</a>
					</div>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
	</div>
</section>

