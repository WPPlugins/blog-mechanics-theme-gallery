/*  
 * 2J Gallery			http://2joomla.net/wordpress-plugins/2j-gallery
 * Version:           	2.1.5 - 21259
 * Author:            	2J Gallery Team
 * Author URI:        	http://2joomla.net
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 * Date:              	Mon, 05 Jun 2017 20:41:48 GMT
 */


jQuery(function(){
	var TwoJGalleryEWObj = jQuery("#twoj-gallery-editor-wizard-content").appendTo("body");
	TwoJGalleryEWObj.dialog({
		'dialogClass' : 'wp-dialog',
		'title': TwoJGalleryEditorWizardText.title,
		'modal' : true,
		'autoOpen' : false,
		'width': 'auto',
	    'maxWidth': 700,
	    'height': 'auto',
	    'fluid': true, 
	    'resizable': false,
		'responsive': true,
		'draggable': false,
		'closeOnEscape' : true,
		'buttons' : [{
				'text' : TwoJGalleryEditorWizardText.closeButton,
				'class' : 'button-default',
				'click' : function() { jQuery(this).dialog('close'); }
		},{
				'text' : TwoJGalleryEditorWizardText.insertButton,
				'class' : 'button-primary',
				'click' : function() { 
					var galleryId = jQuery('#page_id', TwoJGalleryEWObj).val();
					window.parent.send_to_editor('[2jgallery '+galleryId+']');
        			window.parent.tb_remove();
					jQuery(this).dialog('close'); 
				}
		}],
		open: function( event, ui ) {}
	});
	jQuery(document).on( 'click', '#twoj-gallery-editor-wizard-button', function(event) { 
		TwoJGalleryEWObj.dialog('open'); 
		return false; 
	});
});