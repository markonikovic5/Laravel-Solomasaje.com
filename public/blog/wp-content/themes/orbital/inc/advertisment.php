<?php
/**
 * Advertisment Functionality
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Orbital
 * @since 1.0
 */


/*
orbital_advertisment_before_home
orbital_advertisment_after_featured_home
orbital_advertisment_after_home
orbital_advertisment_before_single_content
orbital_advertisment_middle_single_content
orbital_advertisment_after_single_content
orbital_advertisment_before_page_content
orbital_advertisment_middle_page_content
orbital_advertisment_after_page_content
orbital_advertisment_before_archive
orbital_advertisment_after_featured_archive
orbital_advertisment_after_archive
orbital_advertisment_after_description_archive
*/

/*
 * Advertisment Hook Before Home
 */

function orbital_advertisment_before_home(){
	if( ! orbital_customize_option('orbital_advertisment_before_home_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_before_home_device') . '">' . orbital_customize_option('orbital_advertisment_before_home_code') . '</div>';
}

function orbital_advertisment_before_home_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_before_home_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_before_home_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_before_home_mobile_code') . '</div>';
}


/*
 * Advertisment Hook After Featured Home
 */

function orbital_advertisment_after_featured_home(){
	if( ! orbital_customize_option('orbital_advertisment_after_featured_home_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop banner-block' . orbital_customize_option('orbital_advertisment_after_featured_home_device') . '">' . orbital_customize_option('orbital_advertisment_after_featured_home_code') . '</div>';
}

function orbital_advertisment_after_featured_home_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_after_featured_home_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile banner-block' . orbital_customize_option('orbital_advertisment_after_featured_home_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_after_featured_home_mobile_code') . '</div>';
}


/*
 * Advertisment Hook After Home
 */

function orbital_advertisment_after_home(){
	if( ! orbital_customize_option('orbital_advertisment_after_home_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_after_home_device') . '">' . orbital_customize_option('orbital_advertisment_after_home_code') . '</div>';
}

function orbital_advertisment_after_home_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_after_home_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_after_home_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_after_home_mobile_code') . '</div>';
}


/*
 * Advertisment Hook Before Single Content
 */

function orbital_advertisment_before_single_content(){
	if( ! orbital_customize_option('orbital_advertisment_before_single_content_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_before_single_content_device') . '">' . orbital_customize_option('orbital_advertisment_before_single_content_code') . '</div>';
}

function orbital_advertisment_before_single_content_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_before_single_content_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_before_single_content_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_before_single_content_mobile_code') . '</div>';
}


/*
 * Advertisment Hook Middle Single Content
 */

function orbital_advertisment_middle_single_content( $content ){
	if( ! orbital_customize_option('orbital_advertisment_middle_single_content_code') && orbital_check_advertisment_template('no-ads'))
		return $content;

	$ad_code = '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_middle_single_content_device') . '">' . orbital_customize_option('orbital_advertisment_middle_single_content_code') . '</div>'; 

	if ( is_single() && ! is_admin() ) 
		return orbital_prefix_insert_after_paragraph( $ad_code, 2, $content );
	
	
	return $content;

}

function orbital_advertisment_middle_single_content_mobile( $content ){
	if( ! orbital_customize_option('orbital_advertisment_middle_single_content_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return $content;

	$ad_code = '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_middle_single_content_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_middle_single_content_mobile_code') . '</div>'; 

	if ( is_single() && ! is_admin() ) 
		return orbital_prefix_insert_after_paragraph( $ad_code, 2, $content );
	
	
	return $content;

}


/*
 * Advertisment Hook After Single Content
 */

function orbital_advertisment_after_single_content(){
	if( ! orbital_customize_option('orbital_advertisment_after_single_content_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_after_single_content_device') . '">' . orbital_customize_option('orbital_advertisment_after_single_content_code') . '</div>';
}


function orbital_advertisment_after_single_content_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_after_single_content_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_after_single_content_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_after_single_content_mobile_code') . '</div>';
}

/*
 * Advertisment Hook Before Page Content
 */

function orbital_advertisment_before_page_content(){
	if( ! orbital_customize_option('orbital_advertisment_before_page_content_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_before_page_content_device') . '">' . orbital_customize_option('orbital_advertisment_before_page_content_code') . '</div>';
}

function orbital_advertisment_before_page_content_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_before_page_content_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_before_page_content_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_before_page_content_mobile_code') . '</div>';
}


/*
 * Advertisment Hook Middle Page Content
 */

function orbital_advertisment_middle_page_content( $content ){
	if( ! orbital_customize_option('orbital_advertisment_middle_page_content_code') && orbital_check_advertisment_template('no-ads'))
		return $content;

	$ad_code = '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_middle_page_content_device') . '">' . orbital_customize_option('orbital_advertisment_middle_page_content_code') . '</div>'; 

	if ( is_page() && ! is_admin() ) 
		return orbital_prefix_insert_after_paragraph( $ad_code, 2, $content );
	
	
	return $content;
}


function orbital_advertisment_middle_page_content_mobile( $content ){
	if( ! orbital_customize_option('orbital_advertisment_middle_page_content_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return $content;

	$ad_code = '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_middle_page_content_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_middle_page_content_mobile_code') . '</div>'; 

	if ( is_page() && ! is_admin() ) 
		return orbital_prefix_insert_after_paragraph( $ad_code, 2, $content );
	
	
	return $content;
}


/*
 * Advertisment Hook After Page Content
 */

function orbital_advertisment_after_page_content(){
	if( ! orbital_customize_option('orbital_advertisment_after_page_content_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_after_page_content_device') . '">' . orbital_customize_option('orbital_advertisment_after_page_content_code') . '</div>';
}


function orbital_advertisment_after_page_content_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_after_page_content_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_after_page_content_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_after_page_content_mobile_code') . '</div>';
}


/*
 * Advertisment Hook Before Archive
 */

function orbital_advertisment_before_archive(){
	if( ! orbital_customize_option('orbital_advertisment_before_archive_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_before_archive_device') . '">' . orbital_customize_option('orbital_advertisment_before_archive_code') . '</div>';
}


function orbital_advertisment_before_archive_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_before_archive_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_before_archive_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_before_archive_mobile_code') . '</div>';
}

/*
 * Advertisment Hook After Featured Archive
 */

function orbital_advertisment_after_featured_archive(){
	if( ! orbital_customize_option('orbital_advertisment_after_featured_archive_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop banner-block' . orbital_customize_option('orbital_advertisment_after_featured_archive_device') . '">' . orbital_customize_option('orbital_advertisment_after_featured_archive_code') . '</div>';
}


function orbital_advertisment_after_featured_archive_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_after_featured_archive_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile banner-block' . orbital_customize_option('orbital_advertisment_after_featured_archive_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_after_featured_archive_mobile_code') . '</div>';
}


/*
 * Advertisment Hook After Archive
 */

function orbital_advertisment_after_archive(){
	if( ! orbital_customize_option('orbital_advertisment_after_archive_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_after_archive_device') . '">' . orbital_customize_option('orbital_advertisment_after_archive_code') . '</div>';
}


function orbital_advertisment_after_archive_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_after_archive_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_after_archive_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_after_archive_mobile_code') . '</div>';
}

/*
 * Advertisment Hook After Description Archive
 */

function orbital_advertisment_after_description_archive(){
	if( ! orbital_customize_option('orbital_advertisment_after_description_archive_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner desktop ' . orbital_customize_option('orbital_advertisment_after_description_archive_device') . '">' . orbital_customize_option('orbital_advertisment_after_description_archive_code') . '</div>';
}


function orbital_advertisment_after_description_archive_mobile(){
	if( ! orbital_customize_option('orbital_advertisment_after_description_archive_mobile_code') && orbital_check_advertisment_template('no-ads'))
		return;

	echo '<div class="banner mobile ' . orbital_customize_option('orbital_advertisment_after_description_archive_device_mobile') . '">' . orbital_customize_option('orbital_advertisment_after_description_archive_mobile_code') . '</div>';
}



 
 
function orbital_prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
	$closing_p = '</p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {

		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}

		if ( $paragraph_id == $index + 1 ) {
			$paragraphs[$index] .= $insertion;
		}
	}
	
	return implode( '', $paragraphs );
}


/*
 * Check if template can print advertisment
 */

if ( ! function_exists( 'orbital_check_advertisment_template' ) ) :

	function orbital_check_advertisment_template( $slug ) {

		switch ( $slug ) {
			case 'no-ads':
			if(is_page_template('templates/single-noads.php') || is_page_template('templates/page-noads.php')){
				return false;
			}
			break;

			default:
				return true;
			break;
		}
		return true;

	}

endif;