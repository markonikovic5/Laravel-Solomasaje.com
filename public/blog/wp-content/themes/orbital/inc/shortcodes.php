<?php 
/**
 * Custom shortcodes
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Orbital
 * @since 1.0
 */

/*
 * Add Page Loop Shortcode
 */

if ( ! function_exists( 'orbital_pages_shortcode' ) ) :

	function orbital_pages_shortcode( $atts ){

		ob_start();
		$atts = shortcode_atts(
			array(
				'ids' => '',
			),
			$atts
		);

		$args = array(
			'post__in' => explode(',', $atts['ids']),
			'post_type' => 'page',
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) { ?>
		<div class="flex flex-fluid">
			<?php 
			while ( $query->have_posts() ) {
				$query->the_post(); 
				get_template_part( 'template-parts/loops/loop', 'grid' );
			}
			?>
		</div>

		<?php } 

		wp_reset_postdata();
		return ob_get_clean();

	}

endif;



/*
 * Add Posts Loop Shortcode
 */

if ( ! function_exists( 'orbital_posts_shortcode' ) ) :

	function orbital_posts_shortcode( $atts ){

		ob_start();
		$atts = shortcode_atts(
			array(
				'category' => '',
			),
			$atts
		);

		$args = array(
			'category_name' => $atts['category'],
		);
		
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) { ?>
		<div class="flex flex-fluid">
			<?php 
			while ( $query->have_posts() ) {
				$query->the_post(); 
				get_template_part( 'template-parts/loops/loop', 'grid' );
			}
			?>
		</div>

		<?php } 

		wp_reset_postdata();
		return ob_get_clean();

	}

endif;





function orbital_cluster_media_button_popup(){
	?>

	<div id="orbital_cluster_button_popup" style="display:none;">

		<!-- STYLES ORBITAL CLUSTER -->
		<style>
		.orbital-cluster{

		}

		.orbital-cluster input:not([type='checkbox']), .orbital-cluster select{
			width: 100%;
		}

		.orbital-cluster .section {
			margin-bottom: 2rem;
		}

		.orbital-cluster .section div{
			padding: 1rem;
			text-align: center;
			width: 24%;
			box-sizing: border-box;
			display: inline-block;
		}
		.orbital-cluster .section div a{
			padding: 12px 24px;
			text-decoration: none;
			width: 100%;
			box-sizing: border-box;
			padding: 0.75rem 1.25rem;
			font-size: 16px;
			margin: 0.5rem 0;
			color: white;
			background-color: #0275d8;
			display: inline-block;
			text-align: center;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			border-radius: 4px;
			max-width: 100%;
			border: 0;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,0.14), 0 2px 1px -1px rgba(0,0,0,0.2), 0 1px 3px 0 rgba(0,0,0,0.12);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,0.14), 0 2px 1px -1px rgba(0,0,0,0.2), 0 1px 3px 0 rgba(0,0,0,0.12);
		}

		.orbital-cluster .categories-list {
			padding: 1rem;
			background: #fafafa;
			max-height: 200px;
			overflow-y: scroll;
			margin-bottom: 1rem;
			border: 1px solid #b7b7b7;
		}

		.orbital-cluster .options div {
			margin-bottom: 1rem;
		}

		.thickbox-loading{
			width: auto !important;
			height: auto !important;
		}

		#TB_ajaxContent{
			height: auto !important;
		}


		#TB_window #TB_ajaxContent li::before {
			content: none;
		}
	</style>
	<!-- END STYLES ORBITAL CLUSTER -->

	<div class="wrap orbital-cluster">

		<!--Sections-->
		<div class="section">
			<div><a class="cluster-part-link" href="#orbital_cluster_pages">Pages</a></div>
			<div><a class="cluster-part-link" href="#orbital_cluster_categories">Category</a></div>
			<div><a class="cluster-part-link" href="#orbital_cluster_tags">Tag</a></div>
			<div><a class="cluster-part-link" href="#orbital_cluster_pilar">Pilar</a></div>
		</div>



		<div style="display: none;" id="orbital_cluster_pages" class="cluster-part">
			<h2>Add Pages Cluster</h2>
			<div class="categories-list">
				<?php 
				$pages = get_pages(); 
				foreach ( $pages as $page ) { ?>
				<input id="page_<?php echo $page->ID; ?>" type="checkbox" name="checkfield[]" value="<?php echo $page->ID; ?>" /> <label for="page_<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></label> <br>
				<?php } ?>
			</div>
		</div>
		<div style="display: none;" id="orbital_cluster_categories" class="cluster-part">
			<h2>Add Category Cluster</h2>
			<div class="categories-list">
				<?php wp_category_checklist(); ?>
			</div>
		</div>
		<div style="display: none;" id="orbital_cluster_tags" class="cluster-part">
			<h2>Add Tags Cluster</h2>
			<div class="categories-list">
				<?php wp_terms_checklist(0, array('taxonomy'  => 'post_tag')); ?>
			</div>
		</div>
		<div style="display: none;" id="orbital_cluster_pilar" class="cluster-part">
			<h2>Add Pilar Cluster</h2>
			
			<input type="hidden" id="pilar">
		</div>


		<!-- COMMON OPTIONS -->
		<div class="options" style="display: none;">
			<div class="order">
				<label title="Order">Orden</label><br>
				<select name="order" id="order">
					<option value="DESC" selected>DESC - Default</option>
					<option value="ASC">ASC</option>
				</select>
			</div>
			<div class="orderby">
				<label title="Order by">Order by</label><br>
				<select name="orderby" id="orderby">
					<option selected="" value="">Choose..</option>
					<option value="none">None</option>
					<option value="rand">Random</option>
					<option value="id">ID</option>
					<option value="title">Title</option>
					<option value="name">Slug</option>
					<option value="date">Date - Default</option>
					<option value="modified">Modified Date</option>
					<option value="parent">Parent ID</option>
					<option value="menu_order">Menu Order</option>
					<option value="comment_count">Comment Count</option>
				</select>
			</div>
			<div class="postperpage">
				<label title="Post Per Page">Post Per Page</label><br>
				<input name="posts_per_page" type="number" min="1" step="1" placeholder="Default: 6">
			</div>
				<!--
				<div class="columns">
					<label title="Columns">Columns</label><br>
					<input name="columns" type="number" min="1" max="4" step="1" placeholder="Default: 3">
				</div>
			-->
		</div>
		<div class="submit">
			<button class="button-primary" id="orbital-submit">Añadir Shortcode</button>
		</div>
	</div>

	<!-- SCRIPTS ORBITAL CLUSTER -->
	<script>
		jQuery('.cluster-part-link').click(function() {
			var href = jQuery( this ).attr('href');
			jQuery('.cluster-part').css('display', 'none');
			jQuery('.cluster-part').removeClass('active')
			jQuery(href).addClass('active');
			jQuery(href).fadeIn();
			jQuery('.orbital-cluster .options').fadeIn();
		});
	</script>
	<!-- END SCRIPTS ORBITAL CLUSTER -->

</div>
<?php
}

function orbital_cluster_media($context){
	echo '<a href="#TB_inline?width=800&height=700&inlineId=orbital_cluster_button_popup" class="button thickbox" id="orbital_cluster_button">Cluster</a>';
}


function orbital_cluster_media_add_shortcode_to_editor(){
	?>

	<script>
		jQuery('#orbital-submit').on('click',function(){
			var cluster_categories = jQuery('.orbital-cluster input[name="post_category[]"]:checked:enabled').map(function(){return jQuery(this).val();}).get();
			var cluster_tags = jQuery('.orbital-cluster input[name="tax_input[post_tag][]"]:checked:enabled').map(function(){return jQuery(this).val();}).get();
			var cluster_pages = jQuery('.orbital-cluster #orbital_cluster_pages input[name="checkfield[]"]:checked:enabled').map(function(){return jQuery(this).val();}).get();
			var order = jQuery('.orbital-cluster select[name="order"]').val();
			var orderby = jQuery('.orbital-cluster select[name="orderby"]').val();
			var postperpage = jQuery('.orbital-cluster input[name="posts_per_page"]').val();
			//var columns = jQuery('.orbital-cluster input[name="columns"]').val();
			

			var options = '';

			if(jQuery('#orbital_cluster_pilar').hasClass('active')){
				options = options.concat(' pilar="true"');
			}

			if(cluster_categories.length > 0 ){
				options = options.concat(' categories="'+ cluster_categories +'"');
			}

			if(cluster_tags.length > 0 ){
				options = options.concat(' tags="'+ cluster_tags +'"');
			}

			if(cluster_pages.length > 0 ){
				options = options.concat(' pages="'+ cluster_pages +'"');
			}

			if(order.length > 0 ){
				options = options.concat(' order="'+ order +'"');
			}

			if(orderby.length > 0 ){
				options = options.concat(' orderby="'+ orderby +'"');
			}

			if(postperpage.length > 0 ){
				options = options.concat(' postperpage="'+ postperpage +'"');
			}

/*
			if(columns.length > 0 ){
				options = options.concat(' columns="'+ columns +'"');
			}
			*/

			var shortcode = '[orbital_cluster '+ options +']';
			if( !tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
				jQuery('textarea#content').val(shortcode);
			} else {
				tinyMCE.execCommand('mceInsertContent', false, shortcode);
			}

			self.parent.tb_remove();
		});
	</script>

	<?php
}


add_action('media_buttons','orbital_cluster_media');
add_action('admin_footer','orbital_cluster_media_button_popup');
add_action('admin_footer','orbital_cluster_media_add_shortcode_to_editor');



	//SHORTCODE
add_shortcode( 'orbital_cluster', 'orbital_cluster_shortcode' );





if ( ! function_exists( 'orbital_cluster_shortcode' ) ) :

	function orbital_cluster_shortcode( $atts ){

		ob_start();
		$atts = shortcode_atts(
			array(
				'categories' 		=> '',
				'tags' 				=> '',
				'pages' 			=> 0,
				'order'         	=> 'DESC',
				'orderby'       	=> 'date',
				'tags' 				=>	'',
				'columns'			=> 3,
				'pilar'				=> false,
				'postperpage' 	=> -1			
			),
			$atts
		);

		$args = array(
			'cat'			=> $atts['categories'],
			'tag_id' 		=> $atts['tags'],
			'post_type'		=> array( 'page', 'post' ),
			'order'         => $atts['order'],
			'orderby'       => $atts['orderby'],
			'posts_per_page' => $atts['postperpage']
		);


		if($atts['pages']){
			$args['post__in'] = explode(',', $atts['pages']);
		}

		if($atts['pilar']){
			$args = array(

				'post_type'		=> array( 'page', 'post' ),
				'order'         => $atts['order'],
				'orderby'       => $atts['orderby'],
				'ignore_sticky_posts' => 1,
				'posts_per_page' => $atts['postperpage'],
				'meta_query' => array( 
					array(
						'key'   => '_wp_page_template', 
						'value' => 'templates/page-pilar.php'
					)
				)
			);
		}

		$query = new WP_Query( $args );
		if ( $query->have_posts() ) { ?>
		<div class="flex flex-fluid">
			<?php 
			while ( $query->have_posts() ) {
				$query->the_post(); 
				get_template_part( 'template-parts/loops/loop', 'grid' );
			}
			?>
		</div>

		<?php } 

		wp_reset_postdata();
		return ob_get_clean();

	}

endif;