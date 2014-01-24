<footer class="footer-content" id="f-content">
    <div class="footer-inner-content">
        <div class="box20">
            <?php $options=get_option('sleek_theme_options'); ?>
            <div class="box20">
                <div class="box3">
                    <ul class="footer-links">
                        <li>Kairos Vision <?php echo date("Y"); ?> </li>
                        
                    </ul>
                </div>
                <div class="box9">
                    <ul class="footer-social" id="footer-social-pos">
                        <li>
                            <?php if(isset($options['fburl'])){ ?>
                                <a href="https://www.facebook.com/kairosvis" onclick="(['_trackEvent', 'Facebook', 'Went to Facebook Page', 'Social']);"> <img src="<?php bloginfo('template_directory'); ?>/images/icons/facebook-icon-col.png" class="social-icon-size" alt="Facebook Profile <?php echo $options['fburl'] ?>"/></a> 
                            <?php }
                            else { ?>
                                <li><a href="https://www.facebook.com/kairosvis" onclick="(['_trackEvent', 'Facebook', 'Went to Facebook Page', 'Social']);"> <img src="<?php bloginfo('template_directory'); ?>/images/icons/facebook-icon-col.png" class="social-icon-size" alt="icon-facebok"/></a></li>
                            <?php } ?>
                            
                        </li>
                        <li><a href="https://twitter.com/kairosvi" onclick="(['_trackEvent', 'Twitter', 'Went to Twitter Page', 'Social']);"> <img src="<?php bloginfo('template_directory'); ?>/images/icons/twitter-icon-col.png" class="social-icon-size" alt="icon-twitter"/></a></li>
                        <li><a href="http://www.linkedin.com"> <img src="<?php bloginfo('template_directory'); ?>/images/icons/linkedin-icon-col.png" class="social-icon-size" alt="icon-linkedin"/></a></li>
                        <li><a href="#"> <img src="<?php bloginfo('template_directory'); ?>/images/icons/rss-icon-col.png" class="social-icon-size" alt="icon-rss"/></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</footer>

