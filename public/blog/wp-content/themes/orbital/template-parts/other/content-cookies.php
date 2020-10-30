<div id="cookies-wrapper"></div>
<script>
	window.addEventListener("load", function(){ window.cookieconsent.initialise({
		container: document.getElementById("cookies-wrapper"),
		"palette": {
			"popup": {
				"background": "#edeff5",
				"text": "#838391"
			},
			"button": {
				"background": "#4b81e8"
			}
		},
		"content": {
			"message": "<?php echo orbital_customize_option('orbital_cookies_message'); ?>",
			"dismiss": "<?php echo orbital_customize_option('orbital_cookies_dismiss'); ?>",
			"link": "<?php echo orbital_customize_option('orbital_cookies_text_link'); ?>",
			"href": "<?php echo get_the_permalink(orbital_customize_option('orbital_cookies_link')); ?>",
		}
	})});
</script>