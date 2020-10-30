<article id="post-<?php the_ID(); ?>" class="featured-item">
	<div class="featured-wrapper">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php
			if( has_post_thumbnail() ) {
				the_post_thumbnail('thumbnail-featured');
			}
			the_title( '<h3 class="entry-title">', '</h3>' );
			?>
		</a>
	</div>
</article>
