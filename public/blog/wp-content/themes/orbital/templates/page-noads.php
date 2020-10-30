<?php 
/*
*
* Template Name: Page without Ads
*
*/
get_header();

while ( have_posts() ) : the_post();

get_template_part( 'template-parts/page/content', 'no-ads' );

endwhile;

get_footer();
