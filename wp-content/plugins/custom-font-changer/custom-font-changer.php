<?php
/*
Plugin Name: Custom Font Changer
Description: Changes the website font to Times New Roman and color to green upon activation, and red upon deactivation.
Version: 1.0
Author: Your Name
*/

function register_testmenu_page(){
    add_menu_page( 'TestMenuPage', 'TestMenu', 'manage_options','TestMenu', 'testmenu', 'dashicons-tickets
', '60X' );
}

// Hook the function to 'wp_head' to inject CSS into the frontend
add_action('admin_menu', 'register_testmenu_page');


// Cleanup on uninstall (optional)
function uninstall_custom_font_changer() {
    // Remove the custom CSS option when the plugin is uninstalled
    delete_option('custom_font_changer_css');
}

// Register uninstall hook
register_uninstall_hook(__FILE__, 'uninstall_custom_font_changer');
