<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'orbital_Customize_Misc_Control' ) ) {
	class orbital_Customize_Misc_Control extends WP_Customize_Control {
		public $settings = 'blogname';
		public $description = '';
		public function render_content() {
			switch ( $this->type ) {
				default:
				case 'text' :
				echo '<p class="description">' . $this->description . '</p>';
				break;
				case 'heading':
				echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
				break;
				case 'line' :
				echo '<hr />';
				break;
			}
		}
	}
}
