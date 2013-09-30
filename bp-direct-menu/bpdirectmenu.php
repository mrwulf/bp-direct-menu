<?php

/*
Plugin Name: BP Direct Menus
Plugin URI: http://github.com/mrwulf/bp-direct-menu
Description: Add menu links that go directly to a user's buddypress pages
Version: 1.0.1
Author: mrwulf
Author URI: http://github.com/mrwulf
*/



define( 'BPDIRECTMENU_VERSION', '1.0.1' );



add_action( 'plugins_loaded', create_function( '', '

	$filename  = "inc/";

	$filename .= is_admin() ? "backend-" : "frontend-";

	$filename .= defined( "DOING_AJAX" ) && DOING_AJAX ? "" : "no";

	$filename .= "ajax.inc.php";

	if( file_exists( plugin_dir_path( __FILE__ ) . $filename ) )

		include( plugin_dir_path( __FILE__ ) . $filename );

	$filename  = "inc/";

	$filename .= "bothend-";

	$filename .= defined( "DOING_AJAX" ) && DOING_AJAX ? "" : "no";

	$filename .= "ajax.inc.php";

	if( file_exists( plugin_dir_path( __FILE__ ) . $filename ) )

		include( plugin_dir_path( __FILE__ ) . $filename );

' )

 );
