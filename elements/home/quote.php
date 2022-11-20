<?php if (function_exists('getTigerOption')): $suffix = pll_current_language()!='en'?pll_current_language():'';?>
	<?php if (getTigerOption('home_quote_content', $suffix)): ?>
		<section class="quote" id="quote">
			<div class="container-fluid">
				<div class="quote-wrap"
					 style="background-image: url('<?= getTigerOption('home_quote_background_image', $suffix) ?>')">
					<div class="overlay"></div>
					<div class="icon-quote">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
							 class="bi bi-quote"
							 viewBox="0 0 16 16">
							<path
								d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
						</svg>
					</div>
					<div class="content-wrap">
						<h4 class="content"><?= getTigerOption('home_quote_content', $suffix) ?></h4>
						<h4 class="name-writer"><?= getTigerOption('home_quote_writer', $suffix) ?></h4>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?>
