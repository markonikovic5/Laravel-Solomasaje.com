<?php 
/*
*
* Template Name: Page without Sidebar
*
*/
get_header();

while ( have_posts() ) : the_post();

get_template_part( 'template-parts/page/content', 'no-sidebar' );

endwhile;

get_footer();
