<?php
/**
 * Plugin Name:       My Test Plugin
 * Plugin URI:        https://www.Designo.com/MyTestPugin
 * Description:       This is a custom plugin that adds specific functionality to WordPress.
 * Version:           1.0.0
 * Author:            MKashifKhan
 * Author URI:        https://www.Designo.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt

 */


 if(!defined(ABSPATH))
 {
    die('WRONG PATH');
 }

 register_activation_hook(
	__FILE__,
	'pluginprefix_function_to_run'
);

 if(!defined('TestPluginVersion'))
    {
        define('TestPluginVersion','1.0.0');
    }
if(!defined('TestPluginDir'))
    {
        define('TestPluginDir',plugin_dir_url(__FILE__));
    }

if(!function_exists('TP_design_files'))
{
    function TP_design_files(){

            wp_enqueue_style( 'TestPlugin-css', TestPluginDir. 'assets/css/style.css' )
    }
}









 if(!class_exists('TestPlugin'))
 {
    class TestPlugin{


    }
new TestPlugin;





 }


 //date_default_timezone_set("Asia/Karachi");
 //echo " time is ". date("h:i:sa")