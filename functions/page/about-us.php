<?php

/**
 * Khai báo meta box
 **/
function contact_meta_box()
{
	if (in_array(get_page_template_slug(), ['page_about-template.php'])) {
		add_meta_box('section-page-info', 'Section page info', 'render_form_contact', 'page', 'normal', 'high');
//        add_meta_box( 'my-post-box', 'Media Field', 'multi_media_uploader_meta_box_func', 'page', 'normal', 'high' );
	}
}

add_action('add_meta_boxes', 'contact_meta_box');


/**
 * @param $post
 * @return void
 */
function render_form_contact($post): void
{
	?>
	<?php for ($i = 1; $i <= 2; $i++): ?>
	<h3>Box section <?= $i ?></h3>
	<table class="form-table" role="presentation">
		<tbody>
		<tr>
			<th scope="row"><label for="heading_s<?= $i ?>">Heading</label></th>
			<td><input type="text" id="heading_s<?= $i ?>" name="heading_s<?= $i ?>" value="<?= esc_attr(get_post_meta($post->ID, '_heading_s'.$i, true))?>" style="width:100%"/></td>
		</tr>
		<tr>
			<th scope="row"><label for="image_url_s<?= $i ?>">Image url</label></th>
			<td><input type="text" id="image_url_s<?= $i ?>" name="image_url_s<?= $i ?>" value="<?= esc_attr(get_post_meta($post->ID, '_image_url_s'.$i, true))?>" style="width:100%"/>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="subtext_s<?= $i ?>">Sub text</label></th>
			<td><input type="text" id="subtext_s<?= $i ?>" name="subtext_s<?= $i ?>" value="<?= esc_attr(get_post_meta($post->ID, '_subtext_s'.$i, true))?>" style="width:100%"/></td>
		</tr>
		<tr>
			<th scope="row"><label for="content_s<?= $i ?>">Content</label></th>
			<td><textarea id="content_s<?= $i ?>" name="content_s<?= $i ?>" style="width:100%"
						  rows="3"><?= esc_attr(get_post_meta($post->ID, '_content_s'.$i, true))?></textarea></td>
		</tr>
		</tbody>
	</table>
<?php endfor; ?>

	<h3>Row analyze - 3 columns</h3>
	<table class="form-table" role="presentation">
		<tbody>
		<?php for ($i = 1; $i <= 3; $i++): ?>
			<tr scope="row">
				<th colspan="2" style="text-align: center">Column <?= $i ?></th>
			</tr>
			<tr>
				<th scope="row"><label for="name_analyze_c<?= $i ?>">Name</label></th>
				<td><input type="text" id="name_analyze_c<?= $i ?>" name="name_analyze_c<?= $i ?>" value="<?= esc_attr(get_post_meta($post->ID, '_name_analyze_c'.$i, true))?>"
						   style="width:100%"/></td>
			</tr>
			<tr>
				<th scope="row"><label for="number_analyze_c<?= $i ?>">Number</label></th>
				<td><input type="number" id="number_analyze_c<?= $i ?>" name="number_analyze_c<?= $i ?>" value="<?= esc_attr(get_post_meta($post->ID, '_number_analyze_c'.$i, true))?>"
						   style="width:100%"/>
				</td>
			</tr>
		<?php endfor; ?>
		</tbody>
	</table>

	<h3>Extend section</h3>
	<table class="form-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row"><label for="enable_projects">View projects</label></th>
				<td><input type="checkbox" id="enable_projects" name="enable_projects" <?= get_post_meta($post->ID, '_enable_projects', true)?'checked="checked"':''?> value="1"/> <span>Enable view the projects section</span></td>
			</tr>
			<tr>
				<th scope="row"><label for="background_image_project_url">Background image url</label></th>
				<td><input type="text" id="background_image_project_url" name="background_image_project_url" value="<?= esc_attr(get_post_meta($post->ID, '_background_image_project_url', true))?>"  style="width:100%" /> </td>
			</tr>
		</tbody>
	</table>
	<?php


}

function contact_meta_box_save($post_id)
{

	if ($_POST['action'] == 'editpost' && $_POST['post_type'] == 'page') {
		for ($i = 1; $i <= 2; $i++) {
			if (isset($_POST['heading_s'.$i])) {
				update_post_meta($post_id, '_heading_s'.$i, $_POST['heading_s'. $i]);
			}
			if (isset($_POST['image_url_s'.$i])) {
				update_post_meta($post_id, '_image_url_s'.$i, $_POST['image_url_s'. $i]);
			}
			if (isset($_POST['subtext_s'.$i])) {
				update_post_meta($post_id, '_subtext_s'.$i, $_POST['subtext_s'. $i]);
			}
			if (isset($_POST['content_s'.$i])) {
				update_post_meta($post_id, '_content_s'.$i, $_POST['content_s'. $i]);
			}
		}

		for ($i = 1; $i <= 3; $i++) {
			if (isset($_POST['name_analyze_c'.$i])) {
				update_post_meta($post_id, '_name_analyze_c'.$i, $_POST['name_analyze_c'. $i]);
			}
			if (isset($_POST['number_analyze_c'.$i])) {
				update_post_meta($post_id, '_number_analyze_c'.$i, $_POST['number_analyze_c'. $i]);
			}
		}

		if (isset($_POST['enable_projects'])) {
			update_post_meta($post_id, '_enable_projects', $_POST['enable_projects']);
		}
		if (isset($_POST['background_image_project_url'])) {
			update_post_meta($post_id, '_background_image_project_url', $_POST['background_image_project_url']);
		}

	}

}

add_action('save_post', 'contact_meta_box_save');
