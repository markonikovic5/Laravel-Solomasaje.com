<?php
/**
 * Meta Box API Generator
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Orbital
 * @since 1.0
 */

/*
*
* text, checkbox, color, date, datetime, datetime-local
* email, media, month, number, password, radio, range,
* select, tel, textarea, time, url, week
*
*/

/*
 * Fields to Meta Box
 */

if ( ! function_exists( 'orbital_get_meta_fields' ) ) :

	function orbital_get_meta_fields(){

		$fields = array(
			array(
				'id' => 'subtitle',
				'label' => 'Subtitle',
				'type' => 'textarea',
			),
			/*
			array(
				'id' => 'button_header_text',
				'label' => 'Button Text',
				'type' => 'text',
			),
			array(
				'id' => 'button_header_url',
				'label' => 'Button Link',
				'type' => 'url',
			),
			*/
			/*
			array(
				'id' => 'contact_form_header',
				'label' => 'Contact Form Header',
				'type' => 'select',
				'options' => orbital_get_contact_form_7(),
			),
			*/
		);
		return $fields;

	}

endif;

/*
 * Select Type of template to Meta Box
 */

if ( ! function_exists( 'orbital_get_meta_screens' ) ) :

	function orbital_get_meta_screens(){
		$screens = array(
			'post',
			'page',
		);
		return $screens;
	}

endif;

/*
 * Launch Meta Box
 */

if ( ! function_exists( 'orbital_add_meta_boxes' ) ) :

	function orbital_add_meta_boxes() {

		$screens = orbital_get_meta_screens();
		foreach ( $screens as $screen ) {
			add_meta_box(
				'option-page',
				__( 'Option Page', 'orbital' ),
				'orbital_add_meta_box_callback',
				$screen,
				'advanced',
				'high'
			);
		}

	}

endif;


/*
 * Meta Box Field Callback
 */

if ( ! function_exists( 'orbital_add_meta_box_callback' ) ) :

	function orbital_add_meta_box_callback( $post ) {
		wp_nonce_field( 'option_page_data', 'option_page_nonce' );
		orbital_generate_fields( $post );
	}

endif;


/*
 * Javascript for Meta Box WP Editor
 */

if ( ! function_exists( 'orbital_admin_footer' ) ) :

	function orbital_admin_footer() {
		?>
		<script>
		jQuery(document).ready(function($){
			if ( typeof wp.media !== 'undefined' ) {
				var _custom_media = true,
				_orig_send_attachment = wp.media.editor.send.attachment;
				$('.rational-metabox-media').click(function(e) {
					var send_attachment_bkp = wp.media.editor.send.attachment;
					var button = $(this);
					var id = button.attr('id').replace('_button', '');
					_custom_media = true;
					wp.media.editor.send.attachment = function(props, attachment){
						if ( _custom_media ) {
							$("#"+id).val(attachment.url);
						} else {
							return _orig_send_attachment.apply( this, [props, attachment] );
						};
					}
					wp.media.editor.open(button);
					return false;
				});
				$('.add_media').on('click', function(){
					_custom_media = false;
				});
			}
		});
		</script>
		<?php
	}

endif;

/*
 * Generate Fields for Meta Box
 */

if ( ! function_exists( 'orbital_generate_fields' ) ) :

	function orbital_generate_fields( $post ) {

		$output = '';
		$fields = orbital_get_meta_fields();
		foreach ( $fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'option_page_' . $field['id'], true );
			switch ( $field['type'] ) {
				case 'checkbox':
				$input = sprintf(
					'<input %s id="%s" name="%s" type="checkbox" value="1">',
					$db_value === '1' ? 'checked' : '',
					$field['id'],
					$field['id']
				);
				break;
				case 'media':
				$input = sprintf(
					'<input class="regular-text" id="%s" name="%s" type="text" value="%s"> <input class="button rational-metabox-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
					$field['id'],
					$field['id'],
					$db_value,
					$field['id'],
					$field['id']
				);
				break;
				case 'radio':
				$input = '<fieldset>';
				$input .= '<legend class="screen-reader-text">' . $field['label'] . '</legend>';
				$i = 0;
				foreach ( $field['options'] as $key => $value ) {
					$field_value = !is_numeric( $key ) ? $key : $value;
					$input .= sprintf(
						'<label><input %s id="%s" name="%s" type="radio" value="%s"> %s</label>%s',
						$db_value === $field_value ? 'checked' : '',
						$field['id'],
						$field['id'],
						$field_value,
						$value,
						$i < count( $field['options'] ) - 1 ? '<br>' : ''
					);
					$i++;
				}
				$input .= '</fieldset>';
				break;
				case 'select':
				$input = sprintf(
					'<select id="%s" name="%s">',
					$field['id'],
					$field['id']
				);
				$input .= '<option value="">---</option>';
				foreach ( $field['options'] as $key => $value ) {
					$field_value = !is_numeric( $key ) ? $key : $value;
					$input .= sprintf(
						'<option %s value="%s">%s</option>',
						$db_value == $key ? 'selected' : '',
						$key,
						$value
					);
				}
				$input .= '</select>';
				break;
				case 'textarea':
				$input = sprintf(
					'<textarea class="large-text" id="%s" name="%s" rows="5">%s</textarea>',
					$field['id'],
					$field['id'],
					$db_value
				);
				break;
				default:
				$input = sprintf(
					'<input %s id="%s" name="%s" type="%s" value="%s">',
					$field['type'] !== 'color' ? 'class="regular-text"' : '',
					$field['id'],
					$field['id'],
					$field['type'],
					$db_value
				);
			}
			$output .= orbital_row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';

	}

endif;


/*
 * Format to Meta Box Fields
 */

if ( ! function_exists( 'orbital_row_format' ) ) :

	function orbital_row_format( $label, $input ) {
		return sprintf( '<tr><th scope="row">%s</th><td>%s</td></tr>', $label, $input );
	}

endif;


/*
 * Save Meta Box data
 */

if ( ! function_exists( 'orbital_save_post' ) ) :

	function orbital_save_post( $post_id ) {

		if ( ! isset( $_POST['option_page_nonce'] ) )
		return $post_id;
		$nonce = $_POST['option_page_nonce'];
		if ( !wp_verify_nonce( $nonce, 'option_page_data' ) )
		return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;
		$fields = orbital_get_meta_fields();
		foreach ( $fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
					$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
					break;
					case 'text':
					$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
					break;
				}
				update_post_meta( $post_id, 'option_page_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'option_page_' . $field['id'], '0' );
			}
		}

	}

endif;

/*
 * Get Meta Post Options
 */

if ( ! function_exists( 'orbital_get_option_page' ) ) :

	function orbital_get_option_page($option, $default = ''){

		if(get_post_meta( get_the_ID() , 'option_page_' . $option, true ))
		return get_post_meta( get_the_ID() , 'option_page_' . $option, true );
		return $default;

	}

endif;


/*
 * Future featured
 */

if ( ! function_exists( 'orbital_get_contact_form_7' ) ) :

	function orbital_get_contact_form_7(){

		$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
		$contactforms = get_posts( $args );
		$contactform7 = array();
		foreach ($contactforms as $contactform) {
			$contactform7[$contactform->ID] = $contactform->post_title;
		}
		return $contactform7;

	}

endif;