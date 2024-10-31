<?php
function nino_social_admin() {
	
	include('social-form.php');

	echo ob_get_clean();
}

function nino_social_admin_actions() {
	$page = add_options_page("Nino Social", "Nino Social", 1, "nino_social", "nino_social_admin");

	add_action('admin_print_scripts-'.$page, 'nino_social_load_scripts');
}

function nino_social_load_scripts() {
	wp_enqueue_style('nino-social-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css');
	wp_enqueue_style('nino-social-style-icon', plugin_dir_url( __FILE__ ) . 'assets/css/nino-social-style.css');
	wp_enqueue_script(array("jquery-ui-core", "interface", "jquery-ui-widget", "jquery-ui-mouse", "wp-lists", "jquery-ui-sortable"));
	wp_enqueue_script('nino-social-script', plugin_dir_url( __FILE__ ) . 'assets/js/nino-social.js', array('jquery','jquery-ui-core','jquery-ui-sortable'));
}

add_action('admin_menu', 'nino_social_admin_actions');

add_action('init', 'nino_social_do_output_buffer');
function nino_social_do_output_buffer() {
	ob_start();
}