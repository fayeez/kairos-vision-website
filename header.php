<!DOCTYPE html>
<html lang="en">
	<?php // Check theme options for the colour scheme -- blah test
		$options=get_option('sleek_theme_options');
		if (isset($options['colourscheme']))
		{
			if ($options['colourscheme'] == 'Light')
			{
				$stylesheet = "/style.css";
			}
			else if ($options['colourscheme'] == 'Dark')
			{
				$stylesheet = "/style.css";
			}
		}
		else
		{
			$stylesheet = "/style.css";
		}
		
	?>
	<head>
		<?php ob_start();?>
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		<meta http-equiv="Expires" content="Tue, 01 Jan 2015 12:12:12 GMT">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); echo $stylesheet; ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link href='http://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Neuton:200' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<?php
		include("jquery.php");
		wp_head();
		?>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-43558234-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	</head>
	<style>
		nav ul li { border-right: 1px solid <?php print $options["color"]; ?>; }
		nav li:first-child a { border-left: 1px solid <?php print $options["color"]; ?>; }
		nav ul ul li:first-child, .footer-content { border-top: 1px solid <?php print $options["color"]; ?>; }
		nav, nav ul ul li:last-child, .search-result, .post-major, .post-minor  { border-bottom: 1px solid <?php print $options["color"]; ?>; }
		nav ul ul a { border-left: 1px solid <?php print $options["color"]; ?>; }
		nav li a:hover { background : <?php print $options["color"]; ?>; }
		#flow-wrapper, .commentlist li { border-top: 1px solid <?php print $options["color"]; ?>; border-left: 1px solid <?php print $options["color"]; ?>; }
		.image-style, #submit, #field, #message_field { border: 1px solid <?php print $options["color"]; ?>; }
		.main-background { border-left: 1px solid <?php print $options["color"]; ?>; border-right: 1px solid <?php print $options["color"]; ?>; }
		.post-info li { border-right: 1px solid <?php print $options["color"]; ?>; }
		.post-info li:first-child { border-left: 1px solid <?php print $options["color"]; ?>; }
		.search-submit, .submit-style, .googlemaps, img { border: 1px solid <?php print $options["color"]; ?> }
		.bottom-border, .sidebar, #subscribe, #recent-posts, #archives, #categories { border-bottom: 1px solid <?php print $options["color"]; ?> }
		.left-border { border-left: 1px solid <?php print $options["color"]; ?> }
		
	</style>
	<?php
	$currentURL="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$currentURL=rtrim($currentURL, '/');
	if (basename($currentURL == home_url()))
	{
		
		if (isset($options['frontpageinput']) && $options['frontpageinput'] == 'staticimage')
		{
			$img=$options['staticimage'];?>
			<body>
			<img class="img-bg no-border" src="<?php echo bloginfo('template_directory') ."/". $img; ?>" />
			<?php
            
		}
		elseif (isset($options['frontpageinput']) && $options['frontpageinput'] == 'dynamicimages' )
		{
			
			print '<body class="fader" onload="fader(1);">';
			display_images();
		}
	}
	else
	{
		if (isset($options['frontpageinput']) && $options['frontpageinput'] == 'dynamicimages' )
		{
			print '<body class="fader" id="dampen-bg" onload="fader(0.6);">';
			display_images();
		}
		elseif (isset($options['frontpageinput']) && $options['frontpageinput'] == 'staticimage')
		{
			$img=$options['staticimage'];?>
			<body>
			<img class="img-bg no-border" id="dampen-bg" src="<?php echo bloginfo('template_directory') ."/". $img; ?>" />
			<?php
		}
	}
	?>
	<script>
	$j = jQuery.noConflict();
	images = new Array();
	images = ["images/CreatingSwirls.jpg", "images/NasMatic-Final.jpg", "images/WorldWonders.jpg", "images/water_monk.jpg", "images/Kairos_Street.jpg", "images/UltimateGohanFinal.jpg"];
	num = Math.floor(Math.random() * images.length) + 0;
	// 'url( "' + images[num] + '")'
	width = checkScreenSize();
	if(width < 581) {
		$j('body').removeClass('fader');
		$j('.img-bg').remove();
		$j('body').addClass('static-bg');
		$j('#dampen-bg').removeAttr('id');
		$j('.static-bg').css({'background-image' : 'url(http://localhost/test/wp-content/themes/sleek/'+ images[num] +')'});
		$j('#flow-wrapper').removeAttr('id');
	}
	 </script>

		<div id="container">
			<div class="logo-wrapper logo-style">
				<?php
					$logo="";
					if(isset($options['logo']))
					{
						$logo=$options['logo'];
					}
				?>
					<img id="logo-img" src="<?php echo bloginfo('template_directory') ."/". $logo; ?>" />
				
			</div>
			 <nav class="box20 clearfix">
				
					<?php
						if(function_exists('wp_nav_menu')):
							wp_nav_menu(
							array(
								
								'menu' =>'primary_nav',
								'container' =>'',
								'depth' => 4,
								'menu_class' => 'clearfix',
								'menu_id' =>'menu' )
								);
						else:
						?>
							<ul id="menu">
								<?php wp_list_pages('title_li=&depth=1'); ?>
							</ul>
						<?php
						endif;
					?>
					<a href="#" id="pull"></a>
				
			</nav>
