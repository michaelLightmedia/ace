<?php

add_shortcode( 'yourname', 'your_name' );
function your_name( $attr = false ) {

	$innerHTML = '';

	if( $attr ) {
		foreach( $attr as $at ) {
			$innerHTML .= $at;
		}
	}

	$innerHTML .= 'Hello World';
	return $innerHTML ;

}

function kitty( $attr ) {
	echo '<pre />';

	print_r( $attr );
	
}


add_shortcode( 'hello_kitty', 'kitty' );





