<?php function jQueryScripts(){
    
    wp_register_script("jquery-script-loader", get_bloginfo('template_directory').'/js/scriptLoader.js', false);
    wp_enqueue_script("jquery-script-loader");
}
add_action('wp_print_scripts','jQueryScripts'); ?>