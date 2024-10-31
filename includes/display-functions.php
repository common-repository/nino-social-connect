<?php


function ninosocial_enqueue_front_scripts() {
	wp_enqueue_style('nino-social-style-icon', plugin_dir_url( __FILE__ ) . 'assets/css/nino-social-style.css');
}


function ninosocial_render_form() {
	
	$providers = ninosocial_provider_list();
	$nino_social_appear = get_option('nino_social_appear');
	$nino_social_size = get_option('nino_social_size');
	$nino_social_align = get_option('nino_social_align');
	$nino_social_style = get_option('nino_social_style');
	$nino_social_effect = get_option('nino_social_effect');
	$nino_social_copyright = get_option('nino_social_copyright');
	
	$socials = explode(",", $nino_social_appear);
	?>
		
			<div class="nino-social-preview <?php echo $nino_social_size?> <?php echo $nino_social_style?> <?php echo $nino_social_effect?> <?php echo $nino_social_align?>">
				<?php 
				foreach ($socials as $k => $alias) {
					$provider = $providers[$alias];

				?>
                <a href="<?php echo $provider["link"].get_option($alias).$provider["suffix_link"]?>" target="_blank" class="<?php echo $provider['alias']?>"><span><?php echo $provider["title"]?></span></a>
                <?php } ?>
            </div>            
            <div class="nino-social-copyright" style="display: none"><a href="http://www.ninotheme.com/">Powered by Ninotheme.com</a></div>            
	<?php
}

function ninosocial_provider_list() {
	$provider_list = array(
		'nino_social_facebook' => array(
			'title' 		=> __('Facebook'),
			'alias'  		=> 'nino-social-icon-facebook',
			'link'  		=> 'http://www.facebook.com/',
			'input'			=> 'nino-social-input-facebook',
			'suffix_link' 	=> '',
		),
		'nino_social_twitter' => array(
			'title' 		=> __('Twitter'),
			'alias'  		=> 'nino-social-icon-twitter',
			'link'  		=> 'http://twitter.com/',
			'input'			=> 'nino-social-input-twitter',
			'suffix_link' 	=> '',
		),
		'nino_social_linkedIn' => array(
			'title' 		=> __('LinkedIn'),
			'alias'  		=> 'nino-social-icon-linkedIn',
			'link'  		=> 'http://www.linkedin.com/in/',
			'input'			=> 'nino-social-input-linkedin',
			'suffix_link' 	=> '',
		),
		'nino_social_company' => array(
			'title' 		=> __('LinkedIn Company'),
			'alias'  		=> 'nino-social-icon-linkedIn-company',
			'link'  		=> 'http://www.linkedin.com/company/',
			'input'			=> 'nino-social-input-linkedin-company',
			'suffix_link' 	=> '',
		),
		'nino_social_social-google' => array(
			'title' 		=> __('Google+'),
			'alias'  		=> 'nino-social-icon-google',
			'link'  		=> 'https://plus.google.com/',
			'input'			=> 'nino-social-input-google-plus',
			'suffix_link' 	=> '',
		),
		'nino_social_flickr' => array(
			'title' 		=> __('Flickr'),
			'alias'  		=> 'nino-social-icon-flickr',
			'link'  		=> 'http://www.flickr.com/photos/',
			'input'			=> 'nino-social-input-flickr',
			'suffix_link' 	=> '',
		),
		'nino_social_vimeo' => array(
			'title' 		=> __('Vimeo'),
			'alias'  		=> 'nino-social-icon-vimeo',
			'link'  		=> 'http://www.vimeo.com/',
			'input'			=> 'nino-social-input-vimeo',
			'suffix_link' 	=> '',
		),
		'nino_social_pinterest' => array(
			'title' 		=> __('Pinterest'),
			'alias'  		=> 'nino-social-icon-pinterest',
			'link'  		=> 'http://www.pinterest.com/',
			'input'			=> 'nino-social-input-pinterest',
			'suffix_link' 	=> '',
		),
		'nino_social_followgram' => array(
			'title' 		=> __('Followgram'),
			'alias'  		=> 'nino-social-icon-followgram',
			'link'  		=> 'http://followgram.me/',
			'input'			=> 'nino-social-input-followgram',
			'suffix_link' 	=> '',
		),
		'nino_social_instagram' => array(
			'title' 		=> __('Instagram'),
			'alias'  		=> 'nino-social-icon-instagram',
			'link'  		=> 'http://instagram.com/',
			'input'			=> 'nino-social-input-instagram',
			'suffix_link' 	=> '',
		),
		'nino_social_foursquare' => array(
			'title' 		=> __('Foursquare'),
			'alias'  		=> 'nino-social-icon-foursquare',
			'link'  		=> 'http://foursquare.com/',
			'input'			=> 'nino-social-input-foursquare',
			'suffix_link' 	=> '',
		),
		'nino_social_youtube' => array(
				'title' 		=> __('YouTube'),
				'alias'  		=> 'nino-social-icon-youtube',
				'link'  		=> 'http://www.youtube.com/user/',
				'input'			=> 'nino-social-input-youtube',
				'suffix_link' 	=> '',
		),
		'nino_social_youtube_channel' => array(
				'title' 		=> __('YouTube Channel'),
				'alias'  		=> 'nino-social-icon-youtube-channel',
				'link'  		=> 'http://www.youtube.com/channel/',
				'input'			=> 'nino-social-input-youtube',
				'suffix_link' 	=> '',
		),
		'nino_social_behance' => array(
				'title' 		=> __('Behance'),
				'alias'  		=> 'nino-social-icon-behance',
				'link'  		=> 'https://www.behance.net/',
				'input'			=> 'nino-social-input-behance',
				'suffix_link' 	=> '',
		),
		'nino_social_delicious' => array(
				'title' 		=> __('Delicious'),
				'alias'  		=> 'nino-social-icon-delicious',
				'link'  		=> 'https://delicious.com/',
				'input'			=> 'nino-social-input-delicious',
				'suffix_link' 	=> '',
		),
		'nino_social_digg' => array(
				'title' 		=> __('Digg'),
				'alias'  		=> 'nino-social-icon-digg',
				'link'  		=> 'http://digg.com/',
				'input'			=> 'nino-social-input-digg',
				'suffix_link' 	=> '',
		),
		'nino_social_dribbble' => array(
				'title' 		=> __('Dribbble'),
				'alias'  		=> 'nino-social-icon-dribbble',
				'link'  		=> 'https://dribbble.com/',
				'input'			=> 'nino-social-input-dribbble',
				'suffix_link' 	=> '',
		),
		'nino_social_etsy' => array(
				'title' 		=> __('Etsy'),
				'alias'  		=> 'nino-social-icon-etsy',
				'link'  		=> 'https://www.etsy.com/shop/',
				'input'			=> 'nino-social-input-etsy',
				'suffix_link' 	=> '',
		),
		'nino_social_lastfm' => array(
				'title' 		=> __('Lastfm'),
				'alias'  		=> 'nino-social-icon-lastfm',
				'link'  		=> 'http://www.last.fm/user/',
				'input'			=> 'nino-social-input-lastfm',
				'suffix_link' 	=> '',
		),
		'nino_social_forrst' => array(
				'title' 		=> __('Forrst'),
				'alias'  		=> 'nino-social-icon-forrst',
				'link'  		=> 'http://forrst.com/people/',
				'input'			=> 'nino-social-input-forrst',
				'suffix_link' 	=> '',
		),
		'nino_social_github' => array(
				'title' 		=> __('Github'),
				'alias'  		=> 'nino-social-icon-github',
				'link'  		=> 'https://github.com/',
				'input'			=> 'nino-social-input-github',
				'suffix_link' 	=> '',
		),
		'nino_social_myspace' => array(
				'title' 		=> __('Myspace'),
				'alias'  		=> 'nino-social-icon-myspace',
				'link'  		=> 'https://myspace.com/',
				'input'			=> 'nino-social-input-myspace',
				'suffix_link' 	=> '',
		),
		'nino_social_orkut' => array(
				'title' 		=> __('Orkut'),
				'alias'  		=> 'nino-social-icon-orkut',
				'link'  		=> 'https://www.orkut.com/',
				'input'			=> 'nino-social-input-orkut',
				'suffix_link' 	=> '',
		),
		'nino_social_quora' => array(
				'title' 		=> __('Quora'),
				'alias'  		=> 'nino-social-icon-quora',
				'link'  		=> 'http://www.quora.com/',
				'input'			=> 'nino-social-input-quora',
				'suffix_link' 	=> '',
		),
		'nino_social_soundcloud' => array(
				'title' 		=> __('Soundcloud'),
				'alias'  		=> 'nino-social-icon-soundcloud',
				'link'  		=> 'https://soundcloud.com/',
				'input'			=> 'nino-social-input-soundcloud',
				'suffix_link' 	=> '',
		),
		'nino_social_stumbleupon' => array(
				'title' 		=> __('Stumbleupon'),
				'alias'  		=> 'nino-social-icon-stumbleupon',
				'link'  		=> 'http://www.stumbleupon.com/stumbler/',
				'input'			=> 'nino-social-input-stumbleupon',
				'suffix_link' 	=> '',
		),
		'nino_social_email' => array(
				'title' 		=> __('Email'),
				'alias'  		=> 'nino-social-icon-email',
				'link'  		=> 'mailto:',
				'input'			=> 'nino-social-input-email',
				'suffix_link' 	=> '',
		),
		'nino_social_tumblr' => array(
			'title' 		=> __('Tumblr'),
			'alias'  		=> 'nino-social-icon-tumblr',
			'link'  		=> 'http://',
			'input'			=> 'nino-social-input-tumblr',
			'suffix_link' 	=> '.tumblr.com',
		),
		'nino_social_blogger' => array(
				'title' 		=> __('Blogger'),
				'alias'  		=> 'nino-social-icon-blogger',
				'link'  		=> 'http://',
				'input'			=> 'nino-social-input-blogger',
				'suffix_link' 	=> '.blogspot.com',
		),
		'nino_social_carbonmade' => array(
				'title' 		=> __('Carbonmade'),
				'alias'  		=> 'nino-social-icon-carbonmade',
				'link'  		=> 'http://',
				'input'			=> 'nino-social-input-carbonmade',
				'suffix_link' 	=> '.carbonmade.com',
		),
		'nino_social_deviantart' => array(
				'title' 		=> __('Deviantart'),
				'alias'  		=> 'nino-social-icon-deviantart',
				'link'  		=> 'http://',
				'input'			=> 'nino-social-input-deviantart',
				'suffix_link' 	=> '.deviantart.com',
		),
		'nino_social_wordpress' => array(
				'title' 		=> __('Wordpress'),
				'alias'  		=> 'nino-social-icon-wordpress',
				'link'  		=> 'https://',
				'input'			=> 'nino-social-input-wordpress',
				'suffix_link' 	=> '.wordpress.com',
		),
		'nino_social_rss' => array(
			'title' 		=> __('RSS'),
			'alias'  		=> 'nino-social-icon-rss',
			'link'  		=> '',
			'input'			=> 'nino-social-input-rss',
			'suffix_link' 	=> '',
		),
		'nino_social_aim' => array(
				'title' 		=> __('Aim'),
				'alias'  		=> 'nino-social-icon-aim',
				'link'  		=> '',
				'input'			=> 'nino-social-input-aim',
				'suffix_link' 	=> '',
		),
		'nino_social_bebo' => array(
				'title' 		=> __('Bebo'),
				'alias'  		=> 'nino-social-icon-bebo',
				'link'  		=> '',
				'input'			=> 'nino-social-input-bebo',
				'suffix_link' 	=> '',
		),
		'nino_social_evernote' => array(
				'title' 		=> __('Evernote'),
				'alias'  		=> 'nino-social-icon-evernote',
				'link'  		=> '',
				'input'			=> 'nino-social-input-evernote',
				'suffix_link' 	=> '',
		),
		'nino_social_forstorm' => array(
				'title' 		=> __('Forstorm'),
				'alias'  		=> 'nino-social-icon-forstorm',
				'link'  		=> '',
				'input'			=> 'nino-social-input-forstorm',
				'suffix_link' 	=> '',
		),
		'nino_social_path' => array(
				'title' 		=> __('Path'),
				'alias'  		=> 'nino-social-icon-path',
				'link'  		=> '',
				'input'			=> 'nino-social-input-path',
				'suffix_link' 	=> '',
		),
		'nino_social_reddit' => array(
				'title' 		=> __('Reddit'),
				'alias'  		=> 'nino-social-icon-reddit',
				'link'  		=> '',
				'input'			=> 'nino-social-input-reddit',
				'suffix_link' 	=> '',
		),
		'nino_social_technorati' => array(
				'title' 		=> __('Technorati'),
				'alias'  		=> 'nino-social-icon-technorati',
				'link'  		=> '',
				'input'			=> 'nino-social-input-technorati',
				'suffix_link' 	=> '',
		)
	);
	
	
	
	return $provider_list;
}

function ninosocial_style_list() {
	$style_list = array(
		'nino_social_style_1' => array(
			'id'  			=> 'nino-radio-input-style-1',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-1',
			'image'			=> 'style-1.png',
		),
		'nino_social_style_2' => array(
			'id'  			=> 'nino-radio-input-style-2',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-2',
			'image'			=> 'style-2.png',
		),
		'nino_social_style_3' => array(
			'id'  			=> 'nino-radio-input-style-3',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-3',
			'image'			=> 'style-3.png',
		),
		'nino_social_style_4' => array(
			'id'  			=> 'nino-radio-input-style-4',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-4',
			'image'			=> 'style-4.png',
		),
		'nino_social_style_5' => array(
			'id'  			=> 'nino-radio-input-style-5',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-5',
			'image'			=> 'style-5.png',
		),
		'nino_social_style_6' => array(
			'id'  			=> 'nino-radio-input-style-6',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-6',
			'image'			=> 'style-6.png',
		),
		'nino_social_style_7' => array(
			'id'  			=> 'nino-radio-input-style-7',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-7',
			'image'			=> 'style-7.png',
		),
		'nino_social_style_8' => array(
			'id'  			=> 'nino-radio-input-style-8',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-8',
			'image'			=> 'style-8.png',
		),
		'nino_social_style_9' => array(
			'id'  			=> 'nino-radio-input-style-9',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-9',
			'image'			=> 'style-9.png',
		),
		'nino_social_style_10' => array(
			'id'  			=> 'nino-radio-input-style-10',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-10',
			'image'			=> 'style-10.png',
		),
		'nino_social_style_11' => array(
			'id'  			=> 'nino-radio-input-style-11',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-11',
			'image'			=> 'style-11.png',
		),
		'nino_social_style_12' => array(
			'id'  			=> 'nino-radio-input-style-12',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-12',
			'image'			=> 'style-12.png',
		),
		'nino_social_style_13' => array(
			'id'  			=> 'nino-radio-input-style-13',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-13',
			'image'			=> 'style-13.png',
		),
		'nino_social_style_14' => array(
			'id'  			=> 'nino-radio-input-style-14',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-14',
			'image'			=> 'style-14.png',
		),
		'nino_social_style_15' => array(
			'id'  			=> 'nino-radio-input-style-15',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-15',
			'image'			=> 'style-15.png',
		),
		'nino_social_style_16' => array(
			'id'  			=> 'nino-radio-input-style-16',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-16',
			'image'			=> 'style-16.png',
		),
		'nino_social_style_17' => array(
			'id'  			=> 'nino-radio-input-style-17',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-17',
			'image'			=> 'style-17.png',
		),
		'nino_social_style_18' => array(
			'id'  			=> 'nino-radio-input-style-18',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-18',
			'image'			=> 'style-18.png',
		),
		'nino_social_style_19' => array(
			'id'  			=> 'nino-radio-input-style-19',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-19',
			'image'			=> 'style-19.png',
		),
		'nino_social_style_20' => array(
			'id'  			=> 'nino-radio-input-style-20',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-20',
			'image'			=> 'style-20.png',
		),
		'nino_social_style_21' => array(
			'id'  			=> 'nino-radio-input-style-21',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-21',
			'image'			=> 'style-21.png',
		),
		'nino_social_style_22' => array(
			'id'  			=> 'nino-radio-input-style-22',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-22',
			'image'			=> 'style-22.png',
		),
		'nino_social_style_23' => array(
			'id'  			=> 'nino-radio-input-style-23',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-23',
			'image'			=> 'style-23.png',
		),
		'nino_social_style_24' => array(
			'id'  			=> 'nino-radio-input-style-24',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-24',
			'image'			=> 'style-24.png',
		),
		'nino_social_style_25' => array(
			'id'  			=> 'nino-radio-input-style-25',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-25',
			'image'			=> 'style-25.png',
		),
		'nino_social_style_26' => array(
			'id'  			=> 'nino-radio-input-style-26',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-26',
			'image'			=> 'style-26.png',
		),
		'nino_social_style_27' => array(
			'id'  			=> 'nino-radio-input-style-27',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-27',
			'image'			=> 'style-27.png',
		),
		'nino_social_style_28' => array(
			'id'  			=> 'nino-radio-input-style-28',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-28',
			'image'			=> 'style-28.png',
		),
		'nino_social_style_29' => array(
			'id'  			=> 'nino-radio-input-style-29',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-29',
			'image'			=> 'style-29.png',
		),
		'nino_social_style_30' => array(
			'id'  			=> 'nino-radio-input-style-30',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-30',
			'image'			=> 'style-30.png',
		),
		'nino_social_style_31' => array(
			'id'  			=> 'nino-radio-input-style-31',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-31',
			'image'			=> 'style-31.png',
		),
		'nino_social_style_32' => array(
			'id'  			=> 'nino-radio-input-style-32',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-32',
			'image'			=> 'style-32.png',
		),
		'nino_social_style_33' => array(
			'id'  			=> 'nino-radio-input-style-33',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-33',
			'image'			=> 'style-33.png',
		),
		'nino_social_style_34' => array(
			'id'  			=> 'nino-radio-input-style-34',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-34',
			'image'			=> 'style-34.png',
		),
		'nino_social_style_35' => array(
			'id'  			=> 'nino-radio-input-style-35',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-35',
			'image'			=> 'style-35.png',
		),
		'nino_social_style_36' => array(
			'id'  			=> 'nino-radio-input-style-36',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-36',
			'image'			=> 'style-36.png',
		),
		'nino_social_style_37' => array(
			'id'  			=> 'nino-radio-input-style-37',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-37',
			'image'			=> 'style-37.png',
		),
		'nino_social_style_38' => array(
			'id'  			=> 'nino-radio-input-style-38',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-38',
			'image'			=> 'style-38.png',
		),
		'nino_social_style_39' => array(
			'id'  			=> 'nino-radio-input-style-39',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-39',
			'image'			=> 'style-39.png',
		),
		'nino_social_style_40' => array(
			'id'  			=> 'nino-radio-input-style-40',
			'name'  		=> 'nino_social_style',
			'value' 		=> 'nino-social-style-40',
			'image'			=> 'style-40.png',
		),
	);
	
	return $style_list;
}

function ninosocial_size_list() {
	$size_list = array(
		'nino_size_64' => array(
			'title' 		=> __('64px'),
			'id'  			=> 'nino-social-size-64',
			'name'  		=> 'nino_social_size',
			'value' 		=> 'nino-size-64',
		),
		'nino_size_46' => array(
			'title' 		=> __('46px'),
			'id'  			=> 'nino-social-size-46',
			'name'  		=> 'nino_social_size',
			'value' 		=> 'nino-size-46',
		),
		'nino_size_32' => array(
			'title' 		=> __('32px'),
			'id'  			=> 'nino-social-size-32',
			'name'  		=> 'nino_social_size',
			'value' 		=> 'nino-size-32',
		),
	);
	
	return $size_list;
}

function ninosocial_align_list() {
	$align_list = array(
		'nino_align_left' => array(
			'title' 		=> __('Left'),
			'id'  			=> 'nino-social-align-left',
			'name'  		=> 'nino_social_align',
			'value' 		=> 'nino-align-left',
		),
		'nino_align_center' => array(
			'title' 		=> __('Center'),
			'id'  			=> 'nino-social-align-center',
			'name'  		=> 'nino_social_align',
			'value' 		=> 'nino-align-center',
		),
		'nino_align_right' => array(
			'title' 		=> __('Right'),
			'id'  			=> 'nino-social-align-right',
			'name'  		=> 'nino_social_align',
			'value' 		=> 'nino-align-right',
		),
	);
	
	return $align_list;
}

function ninosocial_effect_list() {
	$effect_list = array(
		'nino_social_effect_0' => array(
			'title' 		=> __('None'),
			'id'  			=> 'nino-radio-input-effect-0',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-0',
		),
		'nino_social_effect_1' => array(
			'title' 		=> __('1'),
			'id'  			=> 'nino-radio-input-effect-1',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-1',
		),
		'nino_social_effect_2' => array(
			'title' 		=> __('2'),
			'id'  			=> 'nino-radio-input-effect-2',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-2',
		),
		'nino_social_effect_3' => array(
			'title' 		=> __('3'),
			'id'  			=> 'nino-radio-input-effect-3',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-3',
		),
		'nino_social_effect_4' => array(
			'title' 		=> __('4'),
			'id'  			=> 'nino-radio-input-effect-4',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-4',
		),
		'nino_social_effect_5' => array(
			'title' 		=> __('5'),
			'id'  			=> 'nino-radio-input-effect-5',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-5',
		),
		'nino_social_effect_6' => array(
			'title' 		=> __('6'),
			'id'  			=> 'nino-radio-input-effect-6',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-6',
		),
		'nino_social_effect_7' => array(
			'title' 		=> __('7'),
			'id'  			=> 'nino-radio-input-effect-7',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-7',
		),
		'nino_social_effect_8' => array(
			'title' 		=> __('8'),
			'id'  			=> 'nino-radio-input-effect-8',
			'name'  		=> 'nino_social_effect',
			'value' 		=> 'nino-css3-style-8',
		),
	);
	
	
	
	return $effect_list;
} 

function ninosocial_debug($data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}