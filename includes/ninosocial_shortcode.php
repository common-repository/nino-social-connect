<?php
//[nino_social_custom]
function nino_social_custom_code_func( $atts ){
	ninosocial_enqueue_front_scripts();
	
	$providers = ninosocial_provider_list();
	$nino_social_size = "nino-size-46";
	$nino_social_align = "nino-align-left";
	$nino_social_style = "nino-social-style-1";
	$nino_social_effect = "nino-css3-style-1";
	$socials = array();
	foreach ($atts as $value) {
		if (strpos($value, "nino-size") !== false) {
			$nino_social_size = $value;
		}
		
		if (strpos($value, "nino-align") !== false) {
			$nino_social_align = $value;
		}
		
		if (strpos($value, "nino-social-style") !== false) {
			$nino_social_style = $value;
		}
		
		if (strpos($value, "nino-css3-style") !== false) {
			$nino_social_effect = $value;
		}
		
		if (strpos($value, "nino_social_") !== false) {
			$arr = explode(":", $value);
			$socials[$arr[0]] = $arr[1];
		}
	}
	
	$renderHtml = "<div class=\"nino-social-preview {$nino_social_size} {$nino_social_style} {$nino_social_effect} {$nino_social_align}\">";
	foreach ($socials as $key => $value) {
		$provider = $providers[$key];
		$profile = urldecode($value);
		$renderHtml .= "<a href=\"{$provider["link"]}{$profile}{$provider["suffix_link"]}\" target=\"_blank\" class=\"{$provider['alias']}\"><span>{$provider["title"]}</span></a>";
	}
	$renderHtml .= "</div>";
	
	return $renderHtml;
}

function nino_social_shortcode_func($atts) {

	$providers = ninosocial_provider_list();
	$nino_social_appear = get_option('nino_social_appear');
	$nino_social_size = get_option('nino_social_size');
	$nino_social_align = get_option('nino_social_align');
	$nino_social_style = get_option('nino_social_style');
	$nino_social_effect = get_option('nino_social_effect');
	$nino_social_copyright = get_option('nino_social_copyright');
	
	$socials = explode(",", $nino_social_appear);
	
	$renderHtml = "<div class=\"nino-social-preview {$nino_social_size} {$nino_social_style} {$nino_social_effect} {$nino_social_align}\">"; 
	foreach ($socials as $k => $alias) {
		$provider = $providers[$alias];
		$renderHtml .= "<a href=\"{$provider["link"]}{$value}{$provider["suffix_link"]}\" target=\"_blank\" class=\"{$provider['alias']}\"><span>{$provider["title"]}</span></a>";
	}
	$renderHtml .= "</div>";
	
	return $renderHtml;
}

add_shortcode( 'nino_social_connect', 'nino_social_shortcode_func' );

add_shortcode( 'nino_social_custom', 'nino_social_custom_code_func' );
add_filter('widget_text', 'do_shortcode');