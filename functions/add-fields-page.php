<?php
/**
 * Calls the class on the post edit screen.
 */
function call_addFieldsPage() {
	new addFieldsPage();
}

if ( is_admin() ) {
	add_action( 'load-post.php',     'call_addFieldsPage' );
	add_action( 'load-post-new.php', 'call_addFieldsPage' );
}

/**
 * The Class.
 */
class addFieldsPage {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post',      array( $this, 'save'         ) );
		add_action( 'admin_footer',  array( $this, 'wpse_189693_hide_on_template_toggle'));
	}

	/**
	 * Adds the meta box container.
	 */
	public function add_meta_box( $post_type ) {
		// Limit meta box to certain post types.
		$post_types = array('page');

		if ( in_array( $post_type, $post_types ) ) {
			add_meta_box(
				'some_meta_box_name',
				__( 'Some Meta Box Headline', 'textdomain' ),
				array( $this, 'render_meta_box_content' ),
				$post_type,
				'advanced',
				'high'
			);
		}
	}

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save( $post_id ) {

		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) ) {
			return $post_id;
		}

		$nonce = $_POST['myplugin_inner_custom_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) ) {
			return $post_id;
		}

		/*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		/* OK, it's safe for us to save the data now. */

		// Sanitize the user input.
		$mydata = sanitize_text_field( $_POST['myplugin_new_field'] );

		// Update the meta field.
		update_post_meta( $post_id, '_my_meta_value_key', $mydata );
	}


	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_meta_box_content( $post ) {

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$value = get_post_meta( $post->ID, '_my_meta_value_key', true );

		// Display the form, using the current value.
		?>
		<label for="myplugin_new_field">
			<?php _e( 'Description for this field', 'textdomain' ); ?>
		</label>
		<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?php echo esc_attr( $value ); ?>" size="25" />
		<?php

	}

	public function wpse_189693_hide_on_template_toggle() {
		$screen = get_current_screen();
		if ( $screen && $screen->id === 'page' ) :
			?>

			<script>

				jQuery(function ($) {
					$(".popover-slot").each(function( index ) {
						console.log('hai');
						$(this).on('DOMSubtreeModified', function(){
							console.log('changed');
						});
					});

				})
				//
				// jQuery().change(
				// 	function() {
				// 		jQuery( ".edit-post-post-template__dialog select" ).change(
				// 			console.log('haiah');
				// 		function() {
				// 			console.log('haiah');
				// 			jQuery( "#postdivrich" ).toggle( jQuery( this ).val() === "my-template.php" );
				// 		}
				// 	).trigger( "change" );
				// 	}
				// ).trigger( "change" );
			</script>

		<?php
		endif;
	}

}
