
jQuery(function ($) {
	$(document).ready(function () {
		let checked ='';
		if (myThemeParams.hidePageTitle) {
			checked = 'checked="checked"';
		}
		let html = "<div class=\"components-panel__row edit-post-post-hide-title\"><span>Title</span><div class=\"components-dropdown\" tabindex=\"-1\"><input type=\"checkbox\" id=\"_hide_page_title\" name=\"_hide_page_title\" "+checked+" \">\n" +
			"<label for=\"hide_page_title\">Hide the title</label></div></div>";
		$(html).insertBefore(".edit-post-post-visibility");

		let htmlHide = "<input type=\"hidden\" id=\"hide_page_title\" value='"+ myThemeParams.hidePageTitle +"' name=\"hide_page_title\" \">"
		$("form.metabox-location-normal").append(htmlHide);

		$("#_hide_page_title").change(function () {
			if ($(this).is(':checked')){
				$("#hide_page_title").val(1);
			}else  {
				$("#hide_page_title").val('');
			}
		})

	})

})
