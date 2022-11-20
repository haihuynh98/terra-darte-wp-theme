<?php if (function_exists('getTigerOption')): $suffix = pll_current_language()!='en'?pll_current_language():'';?>
	<?php if (getTigerOption('home_partner_content', $suffix)): ?>
		<section class="our-partner" id="our_partner">
			<div class="container-fluid">
				<div class=" content-partner-wrapper">
					<div class="row">
						<div class="col-lg-6 col-12 col-md-12 col-sm-12 col-image hide-tablet hide-mobile">
							<img src="<?= getTigerOption('home_partner_big_image', $suffix) ?>" alt="<?= bloginfo('name') ?>">
						</div>
						<div class="col-lg-6 col-12 col-md-12 col-sm-12 col-content-partner">
							<div class="content-partner">
								<div class="content">
									<h2 class="title">Our Partners</h2>
									<p><?= getTigerOption('home_partner_content', $suffix) ?></p>
									<a href="<?= getTigerOption('home_partner_read_more_url', $suffix) ?>">Read more about our
										partners</a>
								</div>
								<ul class="row-image">
									<?php for ($i = 1; $i <= 4; $i++): ?>
										<?php if (getTigerOption('home_partner_image_' . $i, $suffix)): ?>
											<li class="item-image">
												<img src="<?= getTigerOption('home_partner_image_' . $i, $suffix) ?>"
													 alt="<?= bloginfo('name') ?>">
											</li>
										<?php endif; ?>
									<?php endfor; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php
	endif;
endif; ?>
