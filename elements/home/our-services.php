<?php $suffix = pll_current_language()!='en'?pll_current_language():''; ?>
<section class="our-services" id="our_services">
	<div class="container-fluid">
		<h2 class="title-section text-uppercase"><?= pll__('Our Services')?></h2>
		<div class="row-services">
			<?php for ($i = 1; $i <= 5; $i++):
				if (getTigerOption('home_services_heading_' . $i, $suffix)):?>
					<div class="item <?= $i==1?'active':'' ?>">
						<a href="<?= getTigerOption('home_services_url_' . $i, $suffix) ?>">
							<img src="<?= getTigerOption('home_services_image_' . $i, $suffix) ?>" alt="<?= bloginfo('name') ?>"
								 style="background-color: darkgrey">
							<div class="content overlay">
								<h2 class="name"><?= getTigerOption('home_services_heading_' . $i, $suffix) ?></h2>
								<p class="text-extra"><?= getTigerOption('home_services_description_' . $i, $suffix) ?></p>
								<?= getTigerOption('home_services_icon_' . $i, $suffix) ?>
							</div>
						</a>
					</div>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
	</div>
</section>

