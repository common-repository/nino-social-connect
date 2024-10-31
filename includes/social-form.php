<?php 

$provider_list 	= ninosocial_provider_list();
$size_list 		= ninosocial_size_list();
$effect_list 	= ninosocial_effect_list();
$style_list 	= ninosocial_style_list();
$align_list 	= ninosocial_align_list();

//Set value
if (get_option("nino_social_installajc")) {
	$nino_social_installajc = get_option('nino_social_installajc');
} else {
	$nino_social_installajc = md5(time());
	add_option('nino_social_installajc',			$nino_social_installajc);
	add_option('nino_social_appear',                $nino_social_appear);
	
	foreach ($provider_list as $k => $provider) {
		add_option($k, 				'',			  '', 'yes');
	}
}

$nino_social_appear = get_option('nino_social_appear') != '' ? get_option('nino_social_appear') : 'nino_social_facebook,nino_social_twitter,nino_social_social-google';
$nino_social_size = get_option('nino_social_size') != '' ? get_option('nino_social_size') : 'nino-size-46';
$nino_social_align = get_option('nino_social_align') != '' ? get_option('nino_social_align') : 'nino-align-left';
$nino_social_style = get_option('nino_social_style') != '' ? get_option('nino_social_style') : 'nino-social-style-1';
$nino_social_effect = get_option('nino_social_effect') != '' ? get_option('nino_social_effect') : 'nino-css3-style-1';
$nino_social_copyright = get_option('nino_social_copyright') != '' ? get_option('nino_social_copyright') : 'no';

if ($_POST['NINO_SOCIAL_FORM_SUBMIT']) {
	if (isset($_POST['nino_social_appear']) && !empty($_POST['nino_social_appear']))	{
		//Update value provider social
		foreach ($provider_list as $k => $provider) {
			if (isset($_POST[$provider['alias']])) {
				update_option($k, $_POST[$provider['alias']]);
			}
		}
		
		if (isset($_POST['nino_social_appear'])) {
			$nino_social_appear =  $_POST['nino_social_appear'];
		}
		
		if (isset($_POST['nino_social_size'])) {
			$nino_social_size =  $_POST['nino_social_size'];
		}
		
		if (isset($_POST['nino_social_align'])) {
			$nino_social_align =  $_POST['nino_social_align'];
		}
		
		if (isset($_POST['nino_social_style'])) {
			$nino_social_style =  $_POST['nino_social_style'];
		}
		
		if (isset($_POST['nino_social_effect'])) {
			$nino_social_effect =  $_POST['nino_social_effect'];
		}
		
		if (isset($_POST['nino_social_copyright'])) {
			$nino_social_copyright =  'yes';
		} else {
			$nino_social_copyright = 'no';
		}
		
		update_option('nino_social_appear', $nino_social_appear);
		update_option('nino_social_size', $nino_social_size);
		update_option('nino_social_align', $nino_social_align);
		update_option('nino_social_style', $nino_social_style);
		update_option('nino_social_effect', $nino_social_effect);
		update_option('nino_social_copyright', $nino_social_copyright);
		
		$success = true;
	} else {
		$success = false;
	}
}

$check_social = explode(",", $nino_social_appear); 
?>

	<div id="master" class="clearafter">    
        <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" class="clearafter">
            <input type="hidden" name="NINO_SOCIAL_FORM_SUBMIT" value="1">
            <input type="hidden" name="nino_social_appear" id="nino_social_appear" value="<?php echo $nino_social_appear?>">
            
            <div class="socialPreview">
                <h2 class="title">Preview</h2>
                <p>These buttons will appear just like this. Drag and Drop icon to make order.</p>
                <?php if (isset($success) && !$success) {?>
                <div class="nino-alert-error">Please choose at least one social button.</div>
                <?php } else if (isset($success) && $success) {?>
                <div class="nino-alert-success">Save successfully</div>
                <?php } ?>
                <ul id="sortable" class="clearafter <?php echo $nino_social_size ?> <?php echo $nino_social_effect?> <?php echo $nino_social_style?> <?php echo $nino_social_align?>">
					
				</ul>
            </div>
			
			<h2 class="title">Shortcode</h2>
    		<div class="socialShortcode">
    			[nino_social_connect]
    		</div>
			
			<h2 class="title">Custom Code Generated</h2>
    		<div class="socialCustomCode">
    			[nino_social_custom <?php echo $nino_social_size ?> <?php echo $nino_social_effect?> <?php echo $nino_social_style?> <?php echo $nino_social_align?>]
    		</div>

            <div class="socialButton">
            
                <h2 class="title">Social Button</h2>
                
                <ul>
                	<?php 
                	foreach ($provider_list as $k => $provider) {
                	?>
                    <li class="<?php echo $k?>">
                    	<input type="checkbox" <?php echo in_array($k, $check_social) ? "checked" : ""?> />
                        <label for="<?php echo $provider['alias']?>"><span class="<?php echo strtolower($provider['input'])?>"><?php echo $provider['title']?></span></label>
                        <div class="social-input">
                            <?php echo $provider['link']?> <input type="text" id="<?php echo $provider['alias']?>" name="<?php echo $provider['alias']?>" value="<?php echo get_option($k)?>"/><?php echo $provider['suffix_link']?>
                        </div>
                    </li>
                    <?php 
                	}
                    ?>
                </ul>
            </div>

            <div class="socialOption">
                <div class="socialStyle radioHidden">
                    <h2 class="title">Style</h2>

                    <ul class="socialImageStyle clearafter">
                    	<?php 
                    	foreach ($style_list as $k => $style) {
                    	?>
                    	<li>
                    		<input type="radio" name="<?php echo $style['name'] ?>" id="<?php echo $style['id'] ?>" value="<?php echo $style['value'] ?>"  <?php echo $nino_social_style == $style['value'] ? "checked" : ""?> >
                    		<label for="<?php echo $style['id'] ?>">
                    			<img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/images/social-style/'.$style['image'] ?>" />
                    		</label>
                    	</li>
                    	<?php } ?>
                    </ul>

                </div>
                
                <div class="socialEffect radioHidden">
                    <h2 class="title">Effects</h2>

                    <ul class="clearafter">
                    	<?php 
                    	foreach ($effect_list as $k => $effect) {
                    	?>
                    	<li>
                    		<input type="radio" name="<?php echo $effect['name'] ?>" id="<?php echo $effect['id']?>" value="<?php echo $effect['value']?>"  <?php echo $nino_social_effect == $effect['value'] ? "checked" : ""?> >
                    		<label for="<?php echo $effect['id']?>">
                    			<span><?php echo $effect['title']?></span>
                    		</label>
                    	</li>
                    	<?php } ?>
                    </ul>

                </div>
                
                <div class="clearafter">
	                <div class="socialSize radioHidden">
	                    <h2 class="title">Size</h2>
	                    <ul class="clearafter">
	                    	<?php
	                    	foreach ($size_list as $k => $size) {
	                    	?>
	                    	<li>
	                    		<input type="radio" id="<?php echo $size['id']?>" name="<?php echo $size['name']?>" value="<?php echo $size['value']?>" <?php echo $nino_social_size == $size['value'] ? "checked" : ""?> />
	                        	<label for="<?php echo $size['id']?>">
	                        		<span><?php echo $size['title']?></span>
	                        	</label>
	                        </li>
	                        <?php
	                    	} 
	                        ?>
	                    </ul>
	                </div>
	                <div class="socialAlign radioHidden">
	                	<h2 class="title">Align</h2>
	                	<ul class="clearafter">
	                		<?php
	                    	foreach ($align_list as $k => $align) {
	                    	?>
	                    	<li>
	                    		<input type="radio" id="<?php echo $align['id']?>" name="<?php echo $align['name']?>" value="<?php echo $align['value']?>" <?php echo $nino_social_align == $align['value'] ? "checked" : ""?> />
	                        	<label for="<?php echo $align['id']?>">
	                        		<span><?php echo $align['title']?></span>
	                        	</label>
	                    	</li>
	                    	<?php
	                    	} 
	                        ?>
	                    </ul>
	                </div>
                </div>
            </div>              
            <button type="submit">Save</button>
		</form>
		<hr />
		<div class="nino-powered clearafter">
			<a href="http://ninotheme.com/" target="_blank">Powered by Ninotheme.com</a>
			<div class="nino-icon-provider">
        		<strong>Icons Provider</strong> <br />
				simpleicons.org - picons.me - pepsized.com - dryicons.com - designdeck.co.uk - designbolts.com - uiconstock.com
			</div>
		</div>
    </div>