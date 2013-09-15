<?php
/*
Plugin Name: BAW Login/Logout menu
Plugin URI: http://www.boiteaweb.fr/llm
Description: You can now add a correct login & logout link in your WP menus.
Version: 1.3.2
Author: Juliobox
Author URI: http://www.boiteaweb.fr
*/

define( 'BAWLLM_VERSION', '1.3.2' );

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