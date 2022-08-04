<?php 
	
function auxbeta_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  // Uncomment the below lines to remove the default customize sections 
  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  $wp_customize->remove_section('nav');
  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );

// ADD THEME PANEL
$wp_customize->add_panel('theme_options',array(
		    'title'=>'Custom Theme Options',
		    'description'=> 'The controls for this Theme',
		    'priority'=> 10,
));
// ADD SECTIONS
$wp_customize->add_section('general_customizer',array(
            'title' 		=> 'General Options',
            'description' 	=> 'This is where General Options are edited.',
			'panel'			=>'theme_options',
			'priority' 		=> 35,
) );
$wp_customize->add_section('header_customizer',array(
            'title' 		=> 'Header Options',
            'description' 	=> 'This is where Header options are edited.',
			'panel'			=>'theme_options',
            'priority' 		=> 36,
) );
$wp_customize->add_section('footer_customizer',array(
            'title' 		=> 'Footer Options',
            'description' 	=> 'This is where Footer options are edited.',
			'panel'			=>'theme_options',
            'priority' 		=> 37,
) );
$wp_customize->add_section('social_customizer',array(
            'title' 		=> 'Social Options',
            'description' 	=> 'This is where Social Media options are edited.',
			'panel'			=>'theme_options',
            'priority' 		=> 38,
) );
$wp_customize->add_section('contact_information',array(
            'title' 		=> 'Contact Information',
            'description' 	=> 'This is where Contact Information is edited.',
			'panel'			=>'theme_options',
            'priority' 		=> 39,
) );
// GENERAL OPTIONS
	// LOGO UPLOAD
$wp_customize->add_setting( 'logo-upload', array(
		'default'			=>'',
) );
$wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize, 'logo-upload', array(
            'label' 	=> 'Upload Site Logo',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'logo-upload',
) ) );
	// BACKGROUND COLOR
$wp_customize->add_setting( 'custom_bg_color', array(
	        'default' 			=> '#ffffff',
	        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'custom_bg_color', array(
            'label' 	=> 'Background Color',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'custom_bg_color',
) ) );
	// FONT COLORS
$wp_customize->add_setting( 'heading_color', array(
        'default' 			=> '#5a5a5a',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'heading_color', array(
            'label' 	=> 'Heading Color (H1, H2, H3, etc)',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'heading_color',
) ) );
$wp_customize->add_setting( 'bodytext_color', array(
        'default' 			=> '#5a5a5a',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bodytext_color', array(
            'label' 	=> 'Body Text Color',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'bodytext_color',
) ) );
$wp_customize->add_setting( 'bodytext_color2', array(
        'default' 			=> '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bodytext_color2', array(
            'label' 	=> 'Body Text Color 2',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'bodytext_color2',
) ) );
$wp_customize->add_setting( 'link_color', array(
        'default' 			=> '#5a5a5a',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'link_color', array(
            'label' 	=> 'Link Color',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'link_color',
) ) );
$wp_customize->add_setting( 'link_color_hover', array(
        'default' 			=> '#969696',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'link_color_hover', array(
            'label' 	=> 'Link Color Hover',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'link_color_hover',
) ) );
	// BUTTONS
$wp_customize->add_setting( 'button_color', array(
        'default' 			=> '#5a5a5a',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'button_color', array(
            'label' 	=> 'Button Color',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'button_color',
) ) );
$wp_customize->add_setting( 'button_color_hover', array(
        'default' 			=> '#969696',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'button_color_hover', array(
            'label' 	=> 'Button Color Hover',
            'section' 	=> 'general_customizer',
            'settings' 	=> 'button_color_hover',
) ) );

// HEADER
	// LAYOUT
$wp_customize->add_setting( 'header_layout', array(
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'ab_sanitize_select',
  'default' => 'full',
) );

$wp_customize->add_control( 'header_layout', array(
  'type' => 'select',
  'section' => 'header_customizer', // Add a default or your own section
  'label' => __( 'Header Layout' ),
  'description' => __( 'Select the layout for the header' ),
  'choices' => array(
    'full' => __( 'Full Width' ),
    'contained' => __( 'Contained' ),
    'centerlogo' => __( 'Center Logo' ),
  ),
) );


	// COLORS
	
$wp_customize->add_setting( 'sample_alpha_color',
   array(
      'default' => 'rgba(209,0,55,0.7)',
      'transport' => 'postMessage',
      'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
   )
);
 
$wp_customize->add_control( new Skyrocket_Customize_Alpha_Color_Control( $wp_customize, 'sample_alpha_color_picker',
   array(
      'label' => __( 'Alpha Color Picker Control' ),
      'description' => esc_html__( 'Sample custom control description' ),
      'section' => 'sample_custom_controls_section',
      'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
      'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
         '#000',
         '#fff',
         '#df312c',
         '#df9a23',
         '#eef000',
         '#7ed934',
         '#1571c1',
         '#8309e7'
      )
   )
) );    

/*
$wp_customize->add_setting( 'header_background_color', array(
		'default'           => 'transparent',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_color_option',
) );
$wp_customize->add_control( 'header_background_color', array(
		'type'     => 'radio',
		'label'    => __( 'Header Background Color' ),
		'choices'  => array(
			'default' => _x( 'Transparent', 'transparent' ),
			'custom'  => _x( 'Custom Header Background', 'primary color' ),
		),
		'section'  => 'header_customizer',
		'priority' => 10,
) );
*/

// Add primary color hue setting and control.
$wp_customize->add_setting(
	'header_color',
	array(
		'default'           => 'transparent',
		'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'header_color', array(
            'label' 	=> 'Custom Header Background Color',
			'description' => __( 'Apply a custom color for the Header Background' ),
			'section'     => 'header_customizer',
			'mode'        => 'hsl',
            'settings' 	=> 'header_color',
) ) );

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function ab_customize_preview_js() {
	wp_enqueue_script( 'ab-customize-preview', get_theme_file_uri( '/src/assets/js/lib/customize-preview.js' ), array( 'customize-preview' ), '20181231', true );
}
add_action( 'customize_preview_init', 'ab_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function ab_panels_js() {
	wp_enqueue_script( 'ab-customize-controls', get_theme_file_uri( '/src/assets/js/lib/customize-controls.js' ), array(), '20181231', true );
}
add_action( 'customize_controls_enqueue_scripts', 'ab_panels_js' );

/*
$wp_customize->add_setting( 'header_color', array(
        'default' 			=> 'transparent !important',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'header_color', array(
            'label' 	=> 'Header Background Color',
            'section' 	=> 'header_customizer',
            'settings' 	=> 'header_color',
) ) );
*/
$wp_customize->add_setting( 'nav_text_current', array(
        'default' 			=> '#5a5a5a',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'nav_text_current', array(
            'label' 	=> 'Nav Current Text Color',
            'section' 	=> 'header_customizer',
            'settings' 	=> 'nav_text_current',
) ) );
$wp_customize->add_setting( 'nav_color', array(
        'default' 			=> '#5a5a5a',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'nav_color', array(
            'label' 	=> 'Nav Color',
            'section' 	=> 'header_customizer',
            'settings' 	=> 'nav_color',
) ) );
$wp_customize->add_setting( 'nav_color_hover', array(
        'default' 			=> '#969696',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'nav_color_hover', array(
            'label' 	=> 'Nav Color Hover',
            'section' 	=> 'header_customizer',
            'settings' 	=> 'nav_color_hover',
) ) );

// FOOTER
$wp_customize->add_setting( 'footer_color', array(
        'default' 			=> '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'footer_color', array(
            'label' 	=> 'Footer Background Color',
            'section' 	=> 'footer_customizer',
            'settings' 	=> 'footer_color',
) ) );
// SOCIAL
$wp_customize->add_setting( 'facebook', array(
        'default' 			=> 'https://www.facebook.com/wordpress',
		'sanitize_callback' => 'auxbeta_sanitize_text',
) );
$wp_customize->add_control( 'facebook', array(
        'label' 		=> 'Facebook Link',
        'section' 		=> 'social_customizer',
        'description' 	=> 'Link to Facebook Page',
        'type' 			=> 'text',
) ); 
$wp_customize->add_setting( 'twitter', array(
        'default' 			=> 'https://www.twitter.com/wordpress',
		'sanitize_callback' => 'auxbeta_sanitize_text',
) );
$wp_customize->add_control( 'twitter', array(
        'label' 		=> 'Twitter Link',
        'description' 	=> 'Link to Twitter Timeline',
        'section' 		=> 'social_customizer',
        'type' 			=> 'text',
) ); 
$wp_customize->add_setting( 'instagram', array(
        'default' 			=> 'https://www.instagram.com/wordpress',
		'sanitize_callback' => 'auxbeta_sanitize_text',
) );
$wp_customize->add_control( 'instagram', array(
        'label' 		=> 'Instagram Link',
        'description' 	=> 'Link to Instagram Page',
        'section' 		=> 'social_customizer',
        'type' 			=> 'text',
) ); 
$wp_customize->add_setting( 'youtube', array(
        'default' 			=> 'https://www.youtube.com/wordpress',
		'sanitize_callback' => 'auxbeta_sanitize_text',
) );
$wp_customize->add_control( 'youtube', array(
        'label' 		=> 'YouTube Link',
        'description' 	=> 'Link to YouTube Page',
        'section' 		=> 'social_customizer',
        'type' 			=> 'text',
) ); 

$wp_customize->add_setting( 'facebook_plugin', array(
        'default' 			=> '<div class="fb-page" data-href="https://www.facebook.com/wordpress" data-tabs="timeline" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/wordpress" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/wordpress">WordPress</a></blockquote></div>',
		'sanitize_callback' => 'auxbeta_sanitize_text',
) );
$wp_customize->add_control( 'facebook_plugin', array(
        'label' 		=> 'Facebook Plugin',
        'description' 	=> 'Customize your plugin <a href= "https://developers.facebook.com/docs/plugins/page-plugin/" target="_blank">here</a>',
        'section' 		=> 'social_customizer',
        'type' 			=> 'textarea',
) ); 
$wp_customize->add_setting( 'twitter_timeline', array(
        'default' 			=> '<a href="https://twitter.com/intent/tweet?button_hashtag=wordpress&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #wordpress</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>',
		'sanitize_callback' => 'auxbeta_sanitize_text',
) );
$wp_customize->add_control( 'twitter_timeline', array(
        'label' 	=> 'Twitter Timeline',
        'description' 	=> 'Customize your timeline <a href= "https://publish.twitter.com/#" target="_blank">here</a>',
        'section' 	=> 'social_customizer',
        'type' 		=> 'textarea',
) ); 

// CONTACT
$wp_customize->add_setting( 'phone_textbox', array(
        'default' 			=> '504-555-5555',
		'sanitize_callback' => 'auxbeta_sanitize_text',
) );
$wp_customize->add_control( 'phone_textbox', array(
        'label' 	=> 'Phone Number',
        'section' 	=> 'contact_information',
        'type' 		=> 'text',
) ); 
$wp_customize->add_setting( 'street_address_textbox', array(
        'default' 			=> 'Enter Street Address',
		'sanitize_callback' => 'auxbeta_sanitize_text',
) );
$wp_customize->add_control( 'street_address_textbox', array(
        'label' 	=> 'Street Address',
        'section' 	=> 'contact_information',
        'type' 		=> 'text',
) ); 
$wp_customize->add_setting( 'city_state_zip', array(
        'default' 			=> 'Enter City, State and Zip Code',
		'sanitize_callback' => 'auxbeta_sanitize_text',    
) );
$wp_customize->add_control( 'city_state_zip', array(
        'label' 	=> 'City, State, Zip',
        'section' 	=> 'contact_information',
        'type' 		=> 'text',
) );
$wp_customize->add_setting( 'email_textbox', array(
        'default' 			=> 'Contact e-mail',
		'sanitize_callback' => 'auxbeta_sanitize_text',    
) );
$wp_customize->add_control( 'email_textbox', array(
        'label' 	=> 'Contact e-mail',
        'section' 	=> 'contact_information',
        'type' 		=> 'text',
) );
}


function auxbeta_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function ab_sanitize_select( $input, $setting ) {
  // Ensure input is a slug.
  $input = sanitize_key( $input );
  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function sanitize_color_option( $choice ) {
	$valid = array(
		'default',
		'custom',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'default';
}



//STYLES
function auxbeta_customizer_css() {
    ?>
    <style type="text/css">
	    /* THEME CUSTOMIZER */

	    body { background-color: <?php echo get_theme_mod( 'custom_bg_color' ) ?>;
	    	   color: <?php echo get_theme_mod( 'bodytext_color' ) ?>;		}	    
/* 	    .top-bar, .hover-effect, .button, .top-bar, .top-bar ul, .title-bar { background-color: <?php echo get_theme_mod( 'header_color' ) ?> !important ;} */
        .main-content h1, .main-content .h1, .main-content h2, .main-content .h2, .main-content h3, 
        .main-content .h3, .main-content h4, .main-content .h4, .main-content h5, .main-content .h5 { color: <?php echo get_theme_mod( 'heading_color' ) ?>; }
        a, a:visited,
        .pagination .current { color: <?php echo get_theme_mod( 'link_color' ) ?>; }
        a:hover, a:focus, a:visited:hover, a:visited:focus,
        .pagination a, .pagination span, .fwidget-title { color: <?php echo get_theme_mod( 'link_color_hover' ) ?>; }
		.top-bar .menu a:hover:not(.button),
		.button:hover, .button:focus { background-color: <?php echo get_theme_mod( 'button_color_hover' ) ?> !important; }
		.button, .wp-block-button .wp-block-button__link {background-color: <?php echo get_theme_mod( 'button_color' ) ?> !important; }
	    .pagination a:hover, .pagination a:focus, .pagination span:hover, .pagination span:focus { 
		    background-color: <?php echo get_theme_mod( 'button_color' ) ?> !important; 
		    color: white; }
	    .pagination .current:hover, .pagination .current:focus { 
		    background-color: <?php echo get_theme_mod( 'button_color' ) ?> !important ; 
		    color: <?php echo get_theme_mod( 'link_color_hover' ) ?> !important; }

		/* HEADER */
	    .ab-header { background-color: <?php echo get_theme_mod( 'header_color' ) ?>;}	    
        #menu-main-menu a, #menu-main-menu a:visited { color: <?php echo get_theme_mod( 'nav_color' ) ?>; }
        #menu-main-menu a:hover, #menu-main-menu a:focus, #menu-main-menu a:visited:hover, #menu-main-menu a:visited:focus {color: <?php echo get_theme_mod( 'nav_color_hover' ) ?>;}
        .menu-icon::after {box-shadow: 0 7px 0 <?php echo get_theme_mod( 'nav_color' ) ?>, 0 14px 0 <?php echo get_theme_mod( 'nav_color' ) ?>; background: <?php echo get_theme_mod( 'nav_color' ) ?>;}
        .mobile-menu .menu .is-active > a, .mobile-off-canvas-menu .menu .is-active > a { background-color: <?php echo get_theme_mod( 'button_color' ) ?> !important; }
		.dropdown.menu > li.is-active > a { color: <?php echo get_theme_mod( 'nav_text_current' ) ?> !important; }
 	   .header .nav li a:hover, .header .nav li a:focus,
        .footer .nav li a:hover, .footer .nav li a:focus,
        #menu-main-menu li.current-menu-item a { color: <?php echo get_theme_mod( 'nav_color_link' ) ?> !important; }
        .blue-btn, .comment-reply-link, #submit,
        .entry-content blockquote,
        .hover-effect:before { border-left: 3px solid <?php echo get_theme_mod( 'button_color' ) ?> !important ; }

		/* FOOTER */
	    .ab-footer { background-color: <?php echo get_theme_mod( 'footer_color' ) ?>;}
		body .footer-container {color: <?php echo get_theme_mod( 'bodytext_color2' ) ?>}

/*         .blue-btn:hover, .comment-reply-link:hover, #submit:hover, .blue-btn:focus, .comment-reply-link:focus, #submit:focus { background-color: <?php echo get_theme_mod( 'button_color_hover' ) ?> !important;  } */
    </style>
    <?php
}

add_action( 'wp_footer', 'auxbeta_customizer_css' );

add_action( 'customize_register', 'auxbeta_theme_customizer' );

?>
