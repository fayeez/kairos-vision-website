<?php
$themename = "sleektheme";

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );


/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
    global $themename;
	register_setting( 'sample_options', 'sleek_theme_options', 'theme_options_validate' );
}
function my_admin_scripts() {
    //Farbastic colour picker tool
    wp_enqueue_style( 'farbtastic' );
    wp_enqueue_script( 'farbtastic' );
    //wp_enqueue_script( 'sleek_theme_options', get_template_directory_uri() . '/js/theme-options.js', array( 'farbtastic', 'jquery' ) );
}
/**
 * Load up the menu page
 */
function theme_options_add_page() {
    global $themename;
	add_theme_page( __( 'Theme Options', $themename ), __( 'Theme Options', $themename ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
    add_action( 'admin_print_styles', 'my_admin_scripts' );
}

/**
 * Create arrays for our select and radio options
 */
$colour_scheme = array(
	'Light' => array(
		'value' =>	'Light',
		'label' => __( 'Light', 'sampletheme' )
	),
	'Dark' => array(
		'value' =>	'Dark',
		'label' => __( 'Dark', 'sampletheme' )
	),
    
);

$front_page = array(
	'staticimage' => array(
		'value' => 'staticimage',
		'label' => __( 'Static Image', $themename )
	),
	'dynamicimages' => array(
		'value' => 'dynamicimages',
		'label' => __( 'Dynamic Images', $themename )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $colour_scheme, $front_page, $themename;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', $themename ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', $themename ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'sleek_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A sample checkbox option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'A checkbox', $themename ); ?></th>
					<td>
						<input id="sleek_theme_options[option1]" name="sleek_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
						<label class="description" for="sleek_theme_options[option1]"><?php _e( 'Sample checkbox', $themename ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select Logo', $themename ); ?></th>
					<td>
						<input id="sleek_theme_options[logo]" class="regular-text" type="text" name="sleek_theme_options[logo]" value="<?php if(isset($options['logo'])) { esc_attr_e( $options['logo']); } ?>" />
						<label class="description" for="sleek_theme_options[logo]"><?php _e( 'Path to the location of your logo relative to the root of the template directory', $themename ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample select input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Colour Scheme', $themename ); ?></th>
					<td>
						<select name="sleek_theme_options[colourscheme]">
							<?php
								$selected = $options['colourscheme'];
								$p = '';
								$r = '';

								foreach ( $colour_scheme as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="sleek_theme_options[colourscheme]"><?php _e( 'Select a base colour scheme.', $themename ); ?></label>
					</td>
				</tr>
                <?php
                /**
                 * Highlight colours for the borders
                 */
                ?>
                <tr>
                    <th scope="row"><?php _e( 'Highlight Colours', $themename ); ?></th>
                    <td class="color-picker" style="position: relative;">
                        <input type="text" name="sleek_theme_options[color]" id="color" value="<?php if(isset($options['color'])) { esc_attr_e( $options['color']); } ?>"/>
                        <div style="position: absolute;" id="colorpicker"></div>
                        <label class="description" for="sleek_theme_options[color]"><?php _e('Default hex value for Light theme: #1a4f70. Default hex value for Dark theme: #808080', $themename) ?></label>
                    </td>
                </tr>
                
                <?php
				/**
				 * A sample of radio buttons
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Front Page Display', $themename ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Front Page Display', $themename ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $front_page as $option ) {
								$front_page_setting = $options['frontpageinput'];

								if ( isset($front_page_setting) ) {
									if ( $options['frontpageinput'] == $option['value'] ) {
                                        ?>
                                        <div>
                                            <input id="sleek_theme_options[staticimage]" class="regular-text" type="text" name="sleek_theme_options[staticimage]" value="<?php if(isset($options['staticimage'])) { esc_attr_e( $options['staticimage']); } ?>" />
                                            <label class="description" for="sleek_theme_options[staticimage]"><?php _e( 'Path to the location of your image that you want to put as the background. Relative to theme directory', $themename ); ?></label>  
                                        </div>
                                        <?php
                                        
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';  
									}
								}
								?>
								<label class="description"><input type="radio" name="sleek_theme_options[frontpageinput]" onclick="setVisible(this)" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * A sample textarea option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'A textbox', $themename ); ?></th>
					<td>
						<textarea id="sleek_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="sleek_theme_options[sometextarea]"><?php echo esc_textarea( $options['sometextarea'] ); ?></textarea>
						<label class="description" for="sleek_theme_options[sometextarea]"><?php _e( 'Sample text box', $themename ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', $themename ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $colour_scheme, $front_page;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['logo'] = wp_filter_nohtml_kses( $input['logo'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['colourscheme'], $colour_scheme ) )
		$input['colourscheme'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['frontpageinput'] ) )
		$input['frontpageinput'] = null;
	if ( ! array_key_exists( $input['frontpageinput'], $front_page ) )
		$input['frontpageinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/