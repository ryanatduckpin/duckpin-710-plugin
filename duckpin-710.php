<?php
/*
Plugin Name: Duckpin 710 Marketing Shortcodes
Plugin URI: http://www.duckpindesign.com
Description: The 710 Digital Marketing Shortcode WP Plugin
Version: 0.1
*/

function duckpin710_styles(){ 
  wp_enqueue_style( 'duckpin710_styles', (plugin_dir_url( __FILE__ ) . "duckpin710-assets/stylesheets/duckpin710-styles.css"), '1.0', false);
}
add_action( 'wp_enqueue_scripts', 'duckpin710_styles' );


function duckpin710_scripts(){ 
	global $wp_scripts; 
	 $enqueued_scripts = array();
	 foreach( $wp_scripts->queue as $script ){
     $reg_script = $result['scripts'][] =  $wp_scripts->registered[$script]->src;
     array_push($enqueued_scripts, $reg_script);
   }
   
   if(!in_array('https://www.google.com/recaptcha/api.js', $enqueued_scripts)){
	  	wp_register_script('duckpin710_scripts', 'https://www.google.com/recaptcha/api.js',  array(), '1.0',true);
	  	wp_enqueue_script('duckpin710_scripts');
   }
   
   wp_register_script('duckpin710_scripts', (plugin_dir_url( __FILE__ ) . "duckpin710-assets/scripts/duckpin710-scripts.js"),  array(), '1.0',true);
	 wp_enqueue_script('duckpin710_scripts');
}
add_action( 'wp_enqueue_scripts', 'duckpin710_scripts' );

function duckpin710_blog(){
?>
<div class="duckpin710-blog">
<?
	
	$duckpin710_query = new WP_Query( array('post_type' => 'post') );

	// The Loop
	if ( $duckpin710_query->have_posts() ) {
		while ( $duckpin710_query->have_posts() ) {
			$duckpin710_query->the_post();
			?>
			<div class="duckpin710-blog-left"><?php the_time('M\<\b\r\/\>d');?></div>
			<div class="duckpin710-blog-right">
				<h3><a href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p><?php echo wp_trim_words(get_the_content(), 40); ?></p>
			</div>
			<hr style="clear:both;">
		<?
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		// no posts found
	}

?>
</div>
<?

}

function duckpin710_social(){
	$duckpin710_facebook = "";
	$duckpin710_twitter = "";
	$duckpin710_google = "";
	$duckpin710_youtube = "";
	$duckpin710_linkedin = "";
	$duckpin710_instagram = "";
	$duckpin710_pinterest = "";
	$duckpin710_yelp = "";
?>
<div class="duckpin710-social">
	<?php if($duckpin710_facebook){ ?><div class="duckpin710-facebook"><a href="<?php echo $duckpin710_facebook; ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ );?>duckpin710-assets/images/duckpin710-facebook.svg"></a></div><?php } ?>
	<?php if($duckpin710_twitter){ ?><div class="duckpin710-twitter"><a href="<?php echo $duckpin710_twitter; ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ );?>duckpin710-assets/images/duckpin710-twitter.svg"></a></div><?php } ?>
	<?php if($duckpin710_google){ ?><div class="duckpin710-google"><a href="<?php echo $duckpin710_google; ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ );?>duckpin710-assets/images/duckpin710-google.svg"></a></div><?php } ?>
	<?php if($duckpin710_youtube){ ?><div class="duckpin710-youtube"><a href="<?php echo $duckpin710_youtube; ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ );?>duckpin710-assets/images/duckpin710-youtube.svg"></a></div><?php } ?>
	<?php if($duckpin710_linkedin){ ?><div class="duckpin710-linkedin"><a href="<?php echo $duckpin710_linkedin; ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ );?>duckpin710-assets/images/duckpin710-linkedin.svg"></a></div><?php } ?>
	<?php if($duckpin710_instagram){ ?><div class="duckpin710-instagram"><a href="<?php echo $duckpin710_instagram; ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ );?>duckpin710-assets/images/duckpin710-instagram.svg"></a></div><?php } ?>
	<?php if($duckpin710_pinterest){ ?><div class="duckpin710-pinterest"><a href="<?php echo $duckpin710_pinterest; ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ );?>duckpin710-assets/images/duckpin710-pinterest.svg"></a></div><?php } ?>
	<?php if($duckpin710_yelp){ ?><div class="duckpin710-yelp"><a href="<?php echo $duckpin710_yelp; ?>" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ );?>duckpin710-assets/images/duckpin710-yelp.svg"></a></div><?php } ?>
</div>
<?

}

//FOR NEWSLETTER AND POPUP MAILCHIMP SEND URL:
$duckpin710_mailchimp_form_send = '';

function duckpin710_newsletter($title){
	if($GLOBALS['duckpin710_mailchimp_form_send'] == ''){ echo 'Mailchimp Not Set Up'; } else { ?>

<div class="duckpin710-newsletter">
	<?php 
		extract(shortcode_atts(array('title' => 'Newsletter Signup'),$title));
		
		$duckpin710_sitekey = "";
		
		if($duckpin710_sitekey){
			$duckpin710_recaptcha_submit_info = ' class="g-recaptcha" data-sitekey="' . $duckpin710_sitekey . '" data-callback="submitDuckpin710NewsletterForm" data-badge="inline"';
	?>
	<script>
    function submitDuckpin710NewsletterForm() {
      document.getElementById("duckpin-710-newsletter-form").submit();
    }
  </script>
  <?php } ?>
  
	<h3><?php echo $title ?></h3>
	
	<form action="<?php echo $GLOBALS['duckpin710_mailchimp_form_send']; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
		<input id="duckpin-newsletter-email" type="text" name="duckpin710-email" placeholder="Email*" required>
		<button type="submit"<?php echo $duckpin710_recaptcha_submit_info; ?>  onclick="ga('send', 'event', 'Goals', 'click', 'Newsletter Signup Success');">Submit</button>
		<input type="hidden" name="duckpin710-form" value="newsletter">
	</form>

</div>
<?
	
	}
}

function duckpin710_pop(){
	if($GLOBALS['duckpin710_mailchimp_form_send'] == ''){ echo 'Mailchimp Not Set Up'; } else {
	
	//desktop
	$duckpin710_pop_signup_text = 'Sign me up!';
	$duckpin710_pop_exit_text = 'No Thanks';
	
	//mobile
	$duckpin710_pop_signup_text_m = 'Sign me up!';
	$duckpin710_pop_exit_text_m = 'No Thanks';
	$duckpin710_mobile_message = "Sign Up Today!";
	?>
	
<div class="duckpin710-pop-contain">		
	<div class="duckpin710-pop">
		
		<img src="<?php echo get_template_directory_uri();?>/duckpin710-assets/images/duckpin710-pop-top.jpg">
		
		<div class="duckpin710-pop-bot">
			
			<div class="duckpin710-mobile-message"><?php echo $duckpin710_mobile_message; ?></div>
			<form action="<?php echo $GLOBALS['duckpin710_mailchimp_form_send']; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
				<input type="email" value="" name="EMAIL" placeholder="Enter your email address" required>
				<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_862dad62be9282dc44fd9b07a_eecfe5832e" tabindex="-1" value=""></div>
				<button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" onclick="ga('send', 'event', 'Goals', 'click', 'Lead Cert Form Sent Successfully');" data-mobile="<?php echo $duckpin710_pop_signup_text_m; ?>" data-desktop="<?php echo $duckpin710_pop_signup_text; ?>"><?php echo $duckpin710_pop_signup_text; ?></button>
			</form>
			<a class="close-lead" href="" data-mobile="<?php echo $duckpin710_pop_exit_text_m; ?>" data-desktop="<?php echo $duckpin710_pop_exit_text; ?>"><?php echo $duckpin710_pop_exit_text_m; ?></a>
		
		</div>
	
	</div>
</div>
	
<?php	
	}
}

add_shortcode('duckpin710_pop', 'duckpin710_pop');
add_shortcode('duckpin710_blog', 'duckpin710_blog');
add_shortcode('duckpin710_social', 'duckpin710_social');
add_shortcode('duckpin710_newsletter', 'duckpin710_newsletter');
	
?>