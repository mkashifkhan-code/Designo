<?php
/* Plugin Name : first shortcode
Description: this is a shortcode plugin
version: 1.0.0
Author: ali
*/


define('ShortCodePluginDirPath',plugin_dir_path(__file__ ));
    add_shortcode( 'scname', 'scname1' );
    function scname1(){
        return " this is a simple short code"
    }