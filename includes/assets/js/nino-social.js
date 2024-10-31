jQuery(document).ready(function () {
	init();
	
	jQuery(".socialStyle > .socialImageStyle > li label").click(function () {
		var style = jQuery(this).parents("li").find("input[type=radio]").val();
		jQuery("#sortable").alterClass('nino-social-style-*', style);
		changeShortCodeStyle("socialStyle", style);
	});
	
	jQuery(".socialEffect ul li label").click(function () {
		var effect = jQuery(this).parents("li").find("input[type=radio]").val();
		jQuery("#sortable").alterClass('nino-css3-style-*', effect);
		changeShortCodeStyle("socialEffect", effect);
	});
	
	jQuery(".socialSize ul li label").click(function () {
		var size = jQuery(this).parents("li").find("input[type=radio]").val();
		jQuery("#sortable").alterClass('nino-size-*', size);
		changeShortCodeStyle("socialSize", size);
	});
	
	jQuery(".socialAlign ul li label").click(function () {
		var align = jQuery(this).parents("li").find("input[type=radio]").val();
		jQuery("#sortable").alterClass('nino-align-*', align);
		changeShortCodeStyle("socialAlign", align);
	});
	
	jQuery(".socialButton ul li input[type=checkbox]").change(function () {
		var icon = jQuery(this).parents("li").find("label").attr("for");
		var name  = jQuery(this).parents("li").find("label span").html();
		var alias = jQuery(this).parents("li").attr("class");
		if (jQuery(this).is(':checked')) {
			addSocialPreview(name, icon, alias);
		} else {
			removeSocialPreview(icon);
		}
		sortSocialIcon();
	});
	
	jQuery(".socialButton .social-input input[name*=nino-social-icon]").focusout(function() {
		renderShortCode();
	});
	
/*************************** Create Function jQuery ***************************/
jQuery.fn.alterClass = function ( removals, additions ) {
	
	var self = this;
	
	if ( removals.indexOf( '*' ) === -1 ) {
		// Use native jQuery methods if there is no wildcard matching
		self.removeClass( removals );
		return !additions ? self : self.addClass( additions );
	}
 
	var patt = new RegExp( '\\s' + 
			removals.
				replace( /\*/g, '[A-Za-z0-9-_]+' ).
				split( ' ' ).
				join( '\\s|\\s' ) + 
			'\\s', 'g' );
 
	self.each( function ( i, it ) {
		var cn = ' ' + it.className + ' ';
		while ( patt.test( cn ) ) {
			cn = cn.replace( patt, ' ' );
		}
		it.className = jQuery.trim( cn );
	});
 
	return !additions ? self : self.addClass( additions );
};
/*---------------------------- End Function ----------------------------*/

});


/*************************** Nino Function ***************************/
var classStyle = {};
var sortIcon = {};

init = function () {
	var socialSort = jQuery("#nino_social_appear").val().split(",");
	jQuery.each(socialSort, function (index, value) {
		var obj = jQuery(".socialButton ul li." + value);
		var icon = obj.find("label").attr("for");
		var name = obj.find("label span").html();
		var alias = obj.attr("class");
		if (obj.find("input[type=checkbox]").is(":checked")) {
			addSocialPreview(name, icon, alias);
		} else {
			removeSocialPreview(icon);
		}
	});
	
	var classList = jQuery("#sortable").attr("class").split(/\s+/);
	jQuery(classList).each(function(index){
		if (classList[index].indexOf("nino-social-style") != -1) {
			changeShortCodeStyle("socialStyle", classList[index]);
		}
		
		if (classList[index].indexOf("nino-css3-style-") != -1) {
			changeShortCodeStyle("socialEffect", classList[index]);
		}
		
		if (classList[index].indexOf("nino-size-") != -1) {
			changeShortCodeStyle("socialSize", classList[index]);
		}
		
		if (classList[index].indexOf("nino-align-") != -1) {
			changeShortCodeStyle("socialAlign", classList[index]);
		}
	});
	
	restartSortable();
}

addSocialPreview = function (name, icon, alias) {	
	var a = jQuery("<a>");
	a.addClass(icon);
	a.attr("href", '#');
	
	var span = jQuery("<span>");
	span.html(name);
	
	a.html(span);
	
	var li = jQuery("<li>");
	li.attr("class", alias);
	li.html(a);
	
	jQuery('#sortable').append(li);
}

removeSocialPreview = function (icon) {
	jQuery("#sortable").find("a." + icon).parents("li").remove();
}

sortSocialIcon = function () {
	var ninoAppear = "";
	jQuery("#sortable li").each(function (index, value) {
		var name = jQuery(this).attr("class");
		if (ninoAppear != "") ninoAppear += ",";
		ninoAppear += name;
	});
	
	jQuery("#nino_social_appear").val(ninoAppear);
	renderShortCode();
}

restartSortable = function () {
	try {
		jQuery("#sortable").sortable("destroy");
	} catch (e) {
		// TODO: handle exception
	}
	
	
	jQuery("#sortable").sortable({
		change: function (event, ui) {
			//Event change
		},
		stop: function (event, ui) {
			sortSocialIcon();
		}
	});
}

changeShortCodeStyle = function (name, value) {
	classStyle[name] = value;
	renderShortCode();
}

renderShortCode = function () {
	var shortcode = "[nino_social_custom ";
	
	for(var key in classStyle) {
		shortcode += " " + classStyle[key];
	}
	
	var iconList = jQuery("#nino_social_appear").val().split(",");
	for (var i = 0; i < iconList.length; i++) {
		var obj = jQuery(".socialButton ul li." + iconList[i]);
		var profile = obj.find(".social-input input[name*=nino-social-icon]").val();
		shortcode += " " + iconList[i] + ":" + encodeURIComponent(profile);
	}
	
	shortcode += "]";
	jQuery(".socialCustomCode").html(shortcode);
}

//changeShortCode(/nino-social-style-([^ ]*)/, "nino-social-style-13");
changeShortCode = function(regexp, value) {
	var shortcode = jQuery(".socialCustomCode").html();
	shortcode = shortcode.replace(regexp, value);
	jQuery(".socialCustomCode").html(shortcode);
}