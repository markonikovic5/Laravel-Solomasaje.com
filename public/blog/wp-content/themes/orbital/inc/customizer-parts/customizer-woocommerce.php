<?php
function orbital_woocommerce_customizer( $wp_customize ) {
	if(!orbital_check_woocommerce())
	return;
	$wp_customize->add_section('orbital_home_shop', array(
		'title' => __('Woocommerce Home', 'orbital'),
		'description' => __('Shop configuration ', 'orbital'). get_permalink( wc_get_page_id( 'shop' ) ),
		'priority' => 1000,
	));
	$number_home_shop_sections = 2;
	$product_cats = get_terms( 'product_cat' );
	$product_cat_options = array( 0 => 'Choose category');
	foreach ($product_cats as $product_cat) {
		$product_cat_options[$product_cat->term_id] =  $product_cat->name;
	}
	$order_options = array(
		'rand' => __('Random', 'orbital'),
		'date' => __('Novedades', 'orbital'),
		'price' => __('Precio', 'orbital')
	);
	for ($i=1; $i <= $number_home_shop_sections; $i++) {
		$wp_customize->add_setting('orbital_home_section_category_' . $i, array(
			'default' => 0,
			'transport' => 'refresh'
		));
		$wp_customize->add_setting('orbital_home_section_order_' . $i, array(
			'default' => 'date',
			'transport' => 'refresh'
		));
		$wp_customize->add_setting('orbital_home_section_number_products_' . $i, array(
			'default' => 5,
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'orbital_home_section_category_' . $i, array(
			'label' => __('Home Section', 'orbital') . ' ' . $i,
			'section' => 'orbital_home_shop',
			'settings' => 'orbital_home_section_category_' . $i,
			'type' => 'select',
			'choices' => $product_cat_options,
		)));
		$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'orbital_home_section_order_' . $i, array(
			'section' => 'orbital_home_shop',
			'label' => __('Order by', 'orbital'),
			'settings' => 'orbital_home_section_order_' . $i,
			'type' => 'select',
			'choices' => $order_options,
			'input_attrs' => array(
				'placeholder' => __('Ordenar por ...', 'orbital'),
			),
		)));
		$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'orbital_home_section_number_products_' . $i, array(
			'label' => __('Number of products', 'orbital'),
			'section' => 'orbital_home_shop',
			'settings' => 'orbital_home_section_number_products_' . $i,
			'type' => 'number',
			'input_attrs' => array(
				'min' => 4,
				'max' => 12,
				'placeholder' => __('Cantidad de productos', 'orbital'),
			),
		)));
		$wp_customize->add_control( new orbital_Customize_Misc_Control( $wp_customize, 'orbital_home_line_' . $i, array(
			'section'     => 'orbital_home_shop',
			'description' => __( '', 'orbital' ),
			'type'        => 'line',
			)
			)
		);
	}
}
