<?php
/************* AUXBETA SIZE OPTIONS *************/

add_image_size( 'ab-thumb-square', 600, 600, true );
add_image_size( 'ab-thumb-portrait', 400, 600, true );
add_image_size( 'ab-thumb-landscape', 600, 400, true );

/********* PORTFOLIO EVENT DATE METABOX *********/

function add_eventdate_meta_box() {
    $screens = [ 'portfolio' ];
    foreach ( $screens as $screen ) {		
	add_meta_box(
		'event_date_meta_box', // Unique ID
		'Event Date',    // Meta Box title
		'meta_box_datepicker_html',    // Callback function
		$screen                        // The selected post type
	);
	}
}

add_action( 'add_meta_boxes', 'add_eventdate_meta_box' );

function meta_box_datepicker_html( $post ) {

	$custom_date = get_post_meta( $post->ID, '_custom_date_meta_key', true );

	?>

	<label for="custom_date">Event date</label>
	<input name="custom_date" type="date" data-date-format="DD MMMM YYYY" value="<?php echo esc_attr($custom_date); ?>">

    <?php

}

function meta_box_datepicker_save( $post_id ) {
   if ( array_key_exists( 'custom_date', $_POST ) ) {
      update_post_meta(
         $post_id,
         '_custom_date_meta_key',
         $_POST['custom_date']
      );
   }
}

add_action( 'save_post', 'meta_box_datepicker_save' );

?>