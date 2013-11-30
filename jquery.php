<?php function jQueryScripts(){
    
    //wp_register_script("jquery","https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false);
    //wp_register_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js', array('jquery'), '1.10.0');
    //wp_enqueue_script("jquery");
    //wp_enqueue_script("jquery-ui");
    //
    //wp_register_script("background-fader",get_bloginfo('template_directory').'/js/background-fader.js', array('jquery'));
    //wp_enqueue_script('background-fader');
    //
    //wp_register_script('dynamic-flow', get_bloginfo('template_directory').'/js/dynamic-flow.js', array('jquery'));
    //wp_enqueue_script('dynamic-flow');
    //
    //wp_register_script('check-screen-size', get_bloginfo('template_directory').'/js/check-screen-size.js', array('jquery'));
    //wp_enqueue_script('check-screen-size');
    
    wp_register_script("jquery-script-loader", get_bloginfo('template_directory').'/js/scriptLoader.js', false);
    wp_enqueue_script("jquery-script-loader");
}
add_action('wp_print_scripts','jQueryScripts'); ?>