<?php
/*
Template Name: Contact
*/

#TODO: 

if(isset($_POST['submit'])){
	if(trim($_POST['contactName']) == '') {
		$nameError = "Please enter your name.";
		$hasError = true;
	}
	else {
		$name = trim($_POST['contactName']);
	}
	
	if (trim($_POST['contactEmail']) == '' ){
		$emailError = "Please enter your e-mail.";
		$hasError = true;
	}
	else if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", trim($_POST['contactEmail']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
		
	} else {
		$email = trim($_POST['contactEmail']);
	}

	if(trim($_POST['message']) === '') {
		$messageError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}
	//Send out our message to the admin email or one when is specified in tz_email.
	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[Kairos Vision] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		
		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>

<?php get_header(); ?>
	
		<div class="main-background"></div>
		<div class="main-content" id="content">
			<article class="inner-content box20">
				<div class="box19 offset">
					<header>
						<h2><?php the_title(); ?></h2>
					</header>
					<?php if(isset($emailSent) && $emailSent == true) { ?>
						<div class="box10 thanks">
							<p>Thanks, your email was sent successfully.</p>
						</div>
					<?php }
					else { ?>
						<?php if(isset($hasError)) { ?>
							<p class="error">Sorry, an error occured.<p>
						<?php } ?>
					<form class="box10" action="<?php the_permalink(); ?>" method=post enctype="multipart/form-data">
						<div class="box20">
							<div class="box6" id="field-form">
								<p>Name</p>
							</div>
							<div class="box20">
								<input maxlength="25" placeholder="Name" name="contactName" type="text" id="field"/>
								<?php if(isset($nameError) && $nameError != '') { ?>
									<span class="error"><?=$nameError;?></span>
								<?php } ?>
							</div>
						</div>
						<div class="box20 no-float">
							<div class="box6">
								<p>Email</p>
							</div>
							<div class="box20">
								<input size="30" maxlength="50" placeholder="E-mail" name="contactEmail" type="text" id="field"/>
								<?php if(isset($emailError) && $emailError != '') { ?>
									<span class="error"><?=$emailError;?></span>
								<?php } ?>
							</div>
						</div>
						<div class="box20 no-float">
							<div class="box6">
								<p>Message</p>
							</div>
							<div class="box20">
								<textarea rows="10" cols="29" maxlength="500" placeholder="Send us your message" name="message" id="message-field"></textarea>
								<?php if(isset($messageError) && $messageError != '') { ?>
									<span class="error"><?=$messageError;?></span>
								<?php } ?>
							</div>
						</div>
						<div class="box20">
							<div class="box20">
								<input class="submit-style" name="submit" type="submit" value="Send" />
							</div>
						</div>
					</form>
					<div class="box4 offset7 left" id="address">
						<div class="box20">
							<p><?php
							$args = array(  
								'numberposts' => -1, // Using -1 loads all posts  
								'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager  
								'order'=> 'ASC',  
								'post_mime_type' => 'images',
								'post_parent' => $post->ID, // Important part - ensures the associated images are loaded 
								'post_status' => null, 
								'post_type' => 'attachment'  
							);
							$img = 0;
							$iframe = 0;
							$attachments = get_children($args);
							foreach($attachments as $attachment){echo $attachment;};
							
							// Separate googlemaps if it exists from the address text
							while ( have_posts() ) : the_post();
								$content = explode(',', get_the_content());
								foreach($content as $text) {
									if (!strchr($text, "iframe") and !strchr($text, "a href")) {
										echo $text . " <br/>";
									}
									elseif (strchr($text, 'a href')) {
										$img = $text;
									}
									else{
										//assume it is iframe
										$iframe = $text;
										
									}
								};
								
							endwhile; // end of the loop. ?>
							</p>
						</div>
					</div>
					<div class="box8 offset2">
						<div class="box20">
							<?php
								if ( function_exists( 'pronamic_google_maps' ) ) {
									    pronamic_google_maps( array(
									        'width'  => 290,
									        'height' => 200 
									    ) );
									}
							?>
						</div>
					</div>
					<?php } ?>
				</div>
			</article>
		</div>	
		</div>
		<?php get_footer(); ?>
		<div id="flow-wrapper">
			<div class="flow-style">
				<h2 id="flow-size">
					<a class="call-to-action" href="#">Portfolio</a>
				</h2>
			</div>
		</div>
		<?php	wp_footer(); ?>

	</body>
</html>