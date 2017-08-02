<?php
   /*
   Plugin Name: Cattastic
   Plugin URI: www.thanhletran.com
   Description: A plugin that shows cats in widget area or any post or page.
   Version: 1.0
   Author: Thanh Tran
   Author URI: www.thanhletran.com
   License: GPL2
   */

//include Admin Menu PHP File
include 'settings_menu.php';

//Enqueue scripts and styles
function scripts_enqueue()
{
    // Register the script like this for a plugin:
    wp_register_script( 'my-script', plugins_url( 'script.js', __FILE__ ) );

    // Enqueue jquery
    wp_enqueue_script('jquery');
 
    // Enqueue custom script
    wp_enqueue_script( 'my-script' );

    //Register styles
    wp_register_style( 'my-style', plugins_url('style.css', __FILE__) );

    // Enqueue custom style
    wp_enqueue_style( 'my-style' );

}

//Add hooks
add_action( 'wp_enqueue_scripts', 'scripts_enqueue' );

//Function that shows the cat images
function cattastic_show () {

 	$results_number = get_option('number_of_results', '5');

 	$url = "http://thecatapi.com/api/images/get?api_key=MjEwNDQ3&format=html&&size=med&results_per_page=" . $results_number;

 	$response = file_get_contents($url);

 	echo "<div id = 'cat-box'>" . $response . "</div>";

 }

//Shortcode to be added to widgets, posts, pages to display the plugin
function wp_first_shortcode(){

	cattastic_show();

}

//Shortcode hook
add_shortcode('cattastic', 'wp_first_shortcode');



?>
