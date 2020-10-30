<?php 
/*
*
* Template Name: Single without Sidebar
* Template Post Type: Post
*
*/
get_header();

while ( have_posts() ) : the_post();

get_template_part( 'template-parts/single/content', 'no-sidebar' );

endwhile;

get_footer();
