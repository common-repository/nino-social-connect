<?php
/*
Plugin Name: Nino Social Connect 
Plugin URI: http://www.ninotheme.com
Description: Nino Social Connect - quickly links Social Media Icons to Your Social Media Profiles.
Author: ninotheme.com
Version: 2.0
Author URI: http://www.ninotheme.com
*/

session_start();
global $nino_social_db_version;
$nino_social_plugin_version = '2.0';
$nino_social_db_version = '0.1.0';

include('includes/admin-page.php');
include('includes/display-functions.php'); // display content functions
include('includes/ninosocial_widget.php');
include('includes/ninosocial_shortcode.php');

function nino_social_on_install() {
	//include ('includes/install/install.sql.php');
}

register_activation_hook(__FILE__, 'nino_social_on_install');

function nino_social_on_uninstall() {
	include ('includes/install/uninstall.sql.php');
}

register_uninstall_hook(__FILE__, 'nino_social_on_uninstall');