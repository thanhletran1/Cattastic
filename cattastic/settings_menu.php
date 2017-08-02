<?php

//Add admin menu as requested to allow users to control the number of results

add_action('admin_menu', 'create_cattastic_menu');
function create_cattastic_menu() {

    $page_title = 'Cattastic Admin Page';
    $menu_title = 'Cattastic Settings';
    $capability = 'edit_posts';
    $menu_slug = 'cattastic';
    $function = 'cattastic_display';
    $icon_url = '';
    $position = 99;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}

//function to manage updating results

function cattastic_display() {

    //Check if user is authorized
    if (!current_user_can('manage_options')) {

        wp_die('Unauthorized user');

    }

    //Update results if user changes the input field
    if (isset($_POST['number_of_results'])) {

        update_option('number_of_results', $_POST['number_of_results']);

        $value = $_POST['number_of_results'];

    } 

    //Grab current value of results number using get_option call
    $value = get_option('number_of_results', '5');

    //Include template view for settings
    include 'settings-form.php';
}

?>