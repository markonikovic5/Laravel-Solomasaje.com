<?php
// Get current page URL
$socialURL = get_permalink();
// Get current page title
$socialTitle = str_replace( ' ', '%20', get_the_title());
// Get Post Thumbnail for pinterest
$socialThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
$twitterURL = 'https://twitter.com/intent/tweet?text='.$socialTitle.'&amp;url='.$socialURL;
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$socialURL;
$googleURL = 'https://plus.google.com/share?url='.$socialURL;
$bufferURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$socialURL.'&title='.$socialTitle;
$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$socialURL.'&amp;media='.$socialThumbnail[0].'&amp;description='.$socialTitle;
?>
<div class="entry-social social-type-1">
	<h4 class="entry-social-title">Compartir</h4>
	<a class="social-link social-twitter" href="<?php echo $twitterURL ?>" target="_blank"><i class="fa fa-twitter"></i></a>
	<a class="social-link social-facebook" href="<?php echo $facebookURL ?>" target="_blank"><i class="fa fa-facebook"></i></a>
	<a class="social-link social-googleplus" href="<?php echo $googleURL ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
	<a class="social-link social-linkedin" href="<?php echo $bufferURL ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
</div>
