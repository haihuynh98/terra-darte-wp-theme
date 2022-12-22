<?php
 $suffix = pll_current_language()!='en'?pll_current_language():'';
 $videoOption = getTigerOption('enable_video_fullscreen');
 $bannerContent = getTigerOption('enable_banner_content');
 $bannerContentIsEnable = false;
 $videoIsEnable = false;
$videoMobile = $videoPC = '';
 if (!empty($videoOption) && $videoOption == 1){
	 $videoIsEnable = true;
	 $videoPC = getTigerOption('fullscreen_video_pc_url');
	 $videoMobile = getTigerOption('fullscreen_video_mobile_url');
	 if (empty($videoMobile)) {
		 $videoMobile = $videoPC;
	 }
 }
if (!empty($bannerContent) && $bannerContent == 1){
	$bannerContentIsEnable = true;
}
if($bannerImage = getTigerOption('banner_image_url', $suffix)):
	?>

<section class="banner-image" id="banner_image"
		 style="background-image: url('<?= $bannerImage?>')">

	<?php if($videoIsEnable): ?>
	<div class="fullscreen-video">
	<video autoplay muted loop playsinline id="fullscreen_video">
		<source src="wp-content/themes/terra-darte/images/DeCastelli-Brand.mp4" type="video/mp4">
	</video>
	</div>

		<script>
			var width = window.innerWidth, url = '', source;
			if(width <= 500)
				url ='<?= esc_attr($videoMobile)?>';
			else if(500) {
				url = '<?= esc_attr($videoPC)?>';

			}

			source = '<source type="video/mp4;codecs=&quot;avc1.42E01E, mp4a.40.2&quot;" src="'+url+'" media="all"></source><small>THIS BROWSER DOES NOT HAVE NATIVE VIDEO SUPPORT</small>';
			document.getElementById('fullscreen_video').innerHTML = source;
		</script>
	<?php endif;?>
	<?php if ($bannerContentIsEnable):?>
	<div class="overlay"></div>
	<div class="content-center">
		<div class="content">
			<h1 class="title text-uppercase"><?= getTigerOption('heading_banner', $suffix)?></h1>
			<h5 class="subtext text-uppercase text-long-space"><?= getTigerOption('subtext_banner', $suffix)?></h5>
		</div>
		<a class="nice-button d-flex" href="<?= getTigerOption('contact_page_uri', $suffix)?>">
			<span><?= pll__('Schedule Your Design Consultation')?></span>
			<span class="icon-arrow-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
					 class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
						  d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
		</a>
	</div>
	<?php endif ;?>
	<div class="icon-arrow-down">
		<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-down"
			 viewBox="0 0 16 16">
			<path fill-rule="evenodd"
				  d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
		</svg>
	</div>
</section>
<?php endif;?>
