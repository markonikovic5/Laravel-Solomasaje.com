<?php

//HOME
// arriba de la home
// debajo de los featured snippets
// debajo de la home

// SINGLE
// Arriba del contenido
// Dejado del contenido
// En medio del contenido

// PAGE
// Arriba del contenido
// Dejado del contenido
// En medio del contenido

//ARCHIVE
// arriba de la taxonomia
// debajo de los featured snippets
// debajo de la taxonomia
// debajo de la descripcion


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


function orbital_advertisment_customizer( $wp_customize ) {
	
	global $orbital_customizer_defaults;

	$position_options = array(
		'orbital_advertisment_before_home' => __('Before Home', 'orbital'),
		'orbital_advertisment_before_home_mobile' => __('Before Home Mobile', 'orbital'),
		'orbital_advertisment_after_featured_home' => __('After Featured Home', 'orbital'),
		'orbital_advertisment_after_featured_home_mobile' => __('After Featured Home Mobile', 'orbital'),
		'orbital_advertisment_after_home' => __('After Home', 'orbital'),
		'orbital_advertisment_after_home_mobile' => __('After Home Mobile', 'orbital'),
		'orbital_advertisment_before_single_content' => __('Before Single Content', 'orbital'),
		'orbital_advertisment_before_single_content_mobile' => __('Before Single Content Mobile', 'orbital'),
		'orbital_advertisment_middle_single_content' => __('Middle Single Content', 'orbital'),
		'orbital_advertisment_middle_single_content_mobile' => __('Middle Single Content Mobile', 'orbital'),
		'orbital_advertisment_after_single_content' => __('After Single Content', 'orbital'),
		'orbital_advertisment_after_single_content_mobile' => __('After Single Content Mobile', 'orbital'),
		'orbital_advertisment_before_page_content' => __('Before Page Content', 'orbital'),
		'orbital_advertisment_before_page_content_mobile' => __('Before Page Content Mobile', 'orbital'),
		'orbital_advertisment_middle_page_content' => __('Middle Page Content', 'orbital'),
		'orbital_advertisment_middle_page_content_mobile' => __('Middle Page Content Mobile', 'orbital'),
		'orbital_advertisment_after_page_content' => __('After Page Content', 'orbital'),
		'orbital_advertisment_after_page_content_mobile' => __('After Page Content Mobile', 'orbital'),
		'orbital_advertisment_before_archive' => __('Before Archive', 'orbital'),
		'orbital_advertisment_before_archive_mobile' => __('Before Archive Mobile', 'orbital'),
		'orbital_advertisment_after_featured_archive' => __('After Featured Archive', 'orbital'),
		'orbital_advertisment_after_featured_archive_mobile' => __('After Featured Archive Mobile', 'orbital'),
		'orbital_advertisment_after_archive' => __('After Archive', 'orbital'),
		'orbital_advertisment_after_archive_mobile' => __('After Archive Mobile', 'orbital'),
		'orbital_advertisment_after_description_archive' => __('After Description Archive', 'orbital'),
		'orbital_advertisment_after_description_archive_mobile' => __('After Description Archive Mobile', 'orbital'),
	);




	foreach ($position_options as $position_option => $position_value ) {

		$wp_customize->add_setting($position_option . '_code', array(
			'default' => '',
			'transport' => 'refresh'
		));


		$wp_customize->add_control( new orbital_Customize_Misc_Control( $wp_customize, 'orbital_advertisment_line_' . $position_option, array(
				'section'     => 'orbital_ads',
				'description' => __( '', 'orbital' ),
				'type'        => 'line',
				)
			)
		);

		$wp_customize->add_control(new WP_Customize_Control( $wp_customize, $position_option . '_code', array(
			'section' => 'orbital_ads',
			'label' => $position_value,
			'settings' => $position_option . '_code',
			'type' => 'textarea',
		)));

	}
}