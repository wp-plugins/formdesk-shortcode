<?php
/*
Plugin Name: Formdesk Shortcode
Description: Enables shortcode to embed Formdesk forms.
Version: 1.4
License: GPL
Author: Stefan Groenewoud
Author URI: http://www.formdesk.com
*/

function createformdeskiframe($atts, $content = null) {
	extract(shortcode_atts(array(
		'folder'	=> '',
		'form'		=> '',
		'ssl'		=> 'false',
		'width'		=> '100%',
		'height'	=> '500px'
	), $atts));
	if (!$folder or !$form) {
		$error = 'Forms folder or form name undefined.';
		return $error;
	}
	else {
		if ($ssl == 'true') {
			$protocol = 'https';
		}
		else {
			$protocol = 'http';
		}	
		$url = $protocol . '://www.formdesk.com/' . $folder . '/' . $form . '/';
		$iframe = '<iframe src="' . $url . '" allowTransparency="true" frameborder="0" scrolling="no" width="' . $width . '" height="' . $height . '"></iframe>';
		return $iframe;
	}
}
add_shortcode('formdesk', 'createformdeskiframe');
?>