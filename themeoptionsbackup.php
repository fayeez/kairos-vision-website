<?php
    $themename = "sleektheme";
    $shortname = "slk";
    
    $options = array(
        //Sidebar Alignmment
        array("name" => "Sidebar Alignment",
            "id" => $shortname."_sidebar_alignment",
            "type" => "radio",
            "desc" => "Which side would you like the sidebar?",
            "options" => array("left" => "Left", "right" => "Right"),
            "default" => "right",
            ),
        
        //Logo Image
        array("name" => "Logo Image",
            "id" => $shortname."_logo_image",
            "type" => "text",
            "desc" => "Set the image you wish to use for your logo",
            "default" => "",
            ),
        
        //Custom Google Analytics tracking code
        array("name" => "Google Analytics tracking code",
            "id" => $shortname."_custom_analytics_code",
            "type" => "textarea",
            "default" => "",
            ),
    );
    
    //HTML output for radio selection
    function create_section_for_radio($value)
    {
        //create_opening_tag($value);
        foreach ($value['options'] as $option_key => $option_value)
        {
            $checked = '';
            if ($value['id'] == $option_key)
            {
                $checked = ' checked="checked" ';
            }
            else if (get_option($value['id'] === FALSE && $value['default'] == $option_key))
            {
                $checked = ' checked="checked" ';
            }
            else
            {
                $checked = ' ';
            }
            echo '<div class="slk-radio"><input type="radio" name="' .$value['id']. '" value="' .$option_key. '" ' .$checked. '/>'.$option_value.' </div>';
        }
        //create_closing_tag($value);
    }
    
    //HTML output for text
    function create_section_for_text($value)
    {
        //create_opening_tag($value);
        $text = "";
        if (get_option($value['id'] === FALSE))
        {
            $text = $value['default'];
        }
        else
        {
            $text = $value['id'];
        }
        
        echo '<input type="text" id="'.$value['id'].'" name="'.$value['id'].'" value="'.$text.'" />';
        //create_closing_tag($value);
    }
    
    //HTML output for text area
    function create_section_for_textarea($value) {
        //create_opening_tag($value);
        echo '<textarea name="'.$value['id'].'" type="textarea" cols="" rows="">';
        if ( get_option( $value['id'] ) != "") {
            echo get_option( $value['id'] );
        }
        else {
            echo $value['default'];
        }
        echo '</textarea>';
        //create_closing_tag();
    }
    
    //HTML output for form
    function create_form($options)
    {
        echo "<form method='post' name='form'>";
        //Select the output depending on which form we are wanting to create
        foreach($options as $value)
        {
            switch($value['type'])
            {
            case "sub-section-3":
                create_suf_header_3($value);
                break;
 
            case "text";
                create_section_for_text($value);
                break;
 
            case "textarea":
                create_section_for_textarea($value);
                break;
 
            case "multi-select":
                create_section_for_multi_select($value);
                break;
 
            case "radio":
                create_section_for_radio($value);
                break;
 
            case "color-picker":
                create_section_for_color_picker($value);
                break;
            }
        }
        
        ?>
        <script>
            function formSubmit()
            {
            document.getElementById("frm1").submit();
            }
        </script>
        <?php
        
        echo '<input name="save" type="button" value="Save" class="button" onclick="formSubmit();" />';
        echo '<input name="reset_all" type="button" value="Reset to default values" class="button" onclick="submit_form(this, document.forms["form"])" />';
        echo '<input type="hidden" name="formaction" value="default" />';
        echo '</form>';
    }
    
    
    
    //Menu building code
    function sleektheme_add_admin() {
        echo "TODO: <br/> GOT TO MAKE THE SUBMIT AND RESET FIELDS BUTTONS WORK, USING JAVASCRIPT!!!";
        global $themename, $shortname, $options, $spawned_options;
     
        if ( $_GET['page'] == basename(__FILE__) ) {
            print isset($_REQUEST['formaction']) == FALSE;
            if ( isset($_REQUEST['formaction']) && $_REQUEST['formaction'] == 'save' ) {
                print "save";
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) {
                        update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
                    }
                    else {
                        delete_option( $value['id'] );
                    }
                }
     
                foreach ($spawned_options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) {
                        update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
                    }
                    else {
                        delete_option( $value['id'] );
                    }
                }
     
                header("Location: themes.php?page=functions.php&saved=true");
                die;
            }
            else if(isset($_REQUEST['formaction']) && $_REQUEST['formaction'] == 'reset_all' ){
                print "reset";
                foreach ($options as $value) {
                    delete_option( $value['id'] );
                }
     
                foreach ($spawned_options as $value) {
                    delete_option( $value['id'] );
                }
     
                header("Location: themes.php?page=functions.php&".$_REQUEST['formaction']."=true");
                die;
            }
            else {
                print "umm";
            }
        }
        add_theme_page($themename." Theme Options", "".$themename." Theme Options", 'edit_themes', basename(__FILE__), 'sleektheme_admin');
    }
   
    function sleektheme_admin()
    {
        global $themename, $shortname, $options, $spawned_options, $theme_name;
        echo "sleektheme_admin()!!";
        
        if (isset($_REQUEST['saved']) && $_REQUEST['saved']) {
            echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved for this page.</strong></p></div>';
        }
        if (isset($_REQUEST['reset_all']) && $_REQUEST['reset_all']) {
            echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
        }
        ?>
        <div class="wrap">
            <h2>Settings for <?php echo $themename; ?></h2>
            <div class="slk-options">
                <?php print "calling createform";create_form($options);?>
            </div><!-- slk-options -->
        </div><!-- wrap -->
        <?php
    } //end function sleektheme_admin()
    //Invoke our sleektheme_add_admin function
    add_action('admin_menu', 'sleektheme_add_admin');
    
?>