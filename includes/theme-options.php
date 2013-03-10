<?php

/**
 * Add theme options in the Customizer
 */
function responsive_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'responsive_theme_options', array(
		'title'         => __( 'Theme Options', 'responsive' ),
		'priority'      => 35,
	) );

	$wp_customize->add_section( 'responsive_social_options', array(
		'title'         => __( 'Social Links', 'responsive' ),
		'priority'      => 36,
	) );

	//Breadcrumbs
	$wp_customize->add_setting( 'breadcrumbs', array(
		'default'       => 'yes',
	) );

	$wp_customize->add_control( 'breadcrumbs', array(
		'label'         => __( 'Enable Breadcrumbs', 'responsive' ),
		'section'       => 'responsive_theme_options',
		'type'          => 'radio',
		'choices'       => array(
			'yes'       => __( 'Yes', 'responsive' ),
			'no'        => __( 'No', 'responsive' ),
		),
		'priority'      => 1,
	) );

	//Excerpted blog index
	$wp_customize->add_setting( 'blog_excerpt', array(
		'default'       => 'no',
	) );

	$wp_customize->add_control( 'blog_excerpt', array(
		'label'         => __( 'Blog Post Excerpts', 'responsive' ),
		'section'       => 'responsive_theme_options',
		'type'          => 'radio',
		'choices'       => array(
			'yes'       => __( 'Yes', 'responsive' ),
			'no'        => __( 'No', 'responsive' ),
		),
		'priority'      => 1,
	) );

	//Homepage call to action
	$wp_customize->add_setting( 'homepage_callout[link_to]', array(
		'default'       => 'no',
	) );

	$wp_customize->add_control( 'homepage_callout[link_to]', array(
		'label'         => __( 'Homepage Call to Action: Use custom link', 'responsive' ),
		'section'       => 'responsive_theme_options',
		'type'          => 'radio',
		'choices'       => array(
			'yes'       => __( 'Yes', 'responsive' ),
			'no'        => __( 'No', 'responsive' ),
		),
		'priority'      => 2,
	) );

	$wp_customize->add_setting( 'homepage_callout[text]', array(
		'default'       => __( 'Read more &#8250;', 'responsive' ),
	) );

	$wp_customize->add_control( 'homepage_callout[text]', array(
		'label'         => __( 'Homepage Call to Action: Custom link text', 'responsive' ),
		'section'       => 'responsive_theme_options',
		'type'          => 'text',
		'priority'      => 3,
	) );

	$wp_customize->add_setting( 'homepage_callout[url]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'homepage_callout[url]', array(
		'label'         => __( 'Homepage Call to Action: Custom link url', 'responsive' ),
		'section'       => 'responsive_theme_options',
		'type'          => 'text',
		'priority'      => 4,
	) );

	//Social links
	$wp_customize->add_setting( 'responsive_social_links[twitter]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[twitter]', array(
		'label'         => __( 'Twitter Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 5,
	) );

	$wp_customize->add_setting( 'responsive_social_links[facebook]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[facebook]', array(
		'label'         => __( 'Facebook Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 6,
	) );

	$wp_customize->add_setting( 'responsive_social_links[linkedin]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[linkedin]', array(
		'label'         => __( 'LinkedIn Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 7,
	) );

	$wp_customize->add_setting( 'responsive_social_links[youtube]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[youtube]', array(
		'label'         => __( 'YouTube Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 8,
	) );

	$wp_customize->add_setting( 'responsive_social_links[stumbleupon]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[stumbleupon]', array(
		'label'         => __( 'StumbleUpon Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 9,
	) );

	$wp_customize->add_setting( 'responsive_social_links[google_plus]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[google_plus]', array(
		'label'         => __( 'Google Plus Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 10,
	) );

	$wp_customize->add_setting( 'responsive_social_links[instagram]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[instagram]', array(
		'label'         => __( 'Instagram Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 11,
	) );

	$wp_customize->add_setting( 'responsive_social_links[pinterest]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[pinterest]', array(
		'label'         => __( 'Pinterest Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 12,
	) );

	$wp_customize->add_setting( 'responsive_social_links[yelp]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[yelp]', array(
		'label'         => __( 'Yelp Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 13,
	) );

	$wp_customize->add_setting( 'responsive_social_links[vimeo]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[vimeo]', array(
		'label'         => __( 'Vimeo Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 14,
	) );

	$wp_customize->add_setting( 'responsive_social_links[foursquare]', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'responsive_social_links[foursquare]', array(
		'label'         => __( 'Foursquare Link', 'responsive' ),
		'section'       => 'responsive_social_options',
		'type'          => 'text',
		'priority'      => 15,
	) );
}
add_action( 'customize_register', 'responsive_customize_register' );