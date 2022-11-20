<?php
 $suffix = pll_current_language()!='en'?pll_current_language():'';
if($bannerImage = getTigerOption('banner_image_url', $suffix)):?>
<section class="banner-image" id="banner_image"
		 style="background-image: url('<?= $bannerImage?>')">
	<div class="overlay"></div>
	<div class="content-center">
		<div class="content">
			<h1 class="title text-uppercase"><?= getTigerOption('heading_banner', $suffix)?></h1>
			<h5 class="subtext text-uppercase text-long-space"><?= getTigerOption('subtext_banner', $suffix)?></h5>
		</div>
		<a class="nice-button d-flex" href="<?= getTigerOption('contact_page_uri', $suffix)?>">
			<span>Schedule Your Design Consultation</span>
			<span class="icon-arrow-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
					 class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
						  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
		</a>
	</div>
	<div class="icon-arrow-down">
		<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-down"
			 viewBox="0 0 16 16">
			<path fill-rule="evenodd"
				  d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
		</svg>
	</div>
</section>
<?php endif;?>
