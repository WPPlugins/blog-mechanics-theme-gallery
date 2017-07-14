<?php 
/*  
 * 2J Gallery			http://2joomla.net/wordpress-plugins/2j-gallery
 * Version:           	2.1.5 - 21259
 * Author:            	2J Gallery Team
 * Author URI:        	http://2joomla.net
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 * Date:              	Mon, 05 Jun 2017 20:41:48 GMT
 */

function twoj_gallery_editor_wizard(){
	wp_enqueue_style('wp-jquery-ui-dialog');
	wp_enqueue_script('jquery-ui-dialog');

  	wp_enqueue_style ( 	TWOJ_GALLERY_ASSETS_PREFIX.'-editor-wizard-css', 	TWOJ_GALLERY_ASSETS_CSS_ADMIN_URL.'editor.wizard.css', array( ), TWOJ_GALLERY_VERSION );
		
  	wp_register_script( TWOJ_GALLERY_ASSETS_PREFIX.'-editor-wizard', 		TWOJ_GALLERY_ASSETS_JS_ADMIN_URL.'editor.wizard.js', array( 'jquery' ), TWOJ_GALLERY_VERSION, true );    

	wp_localize_script( TWOJ_GALLERY_ASSETS_PREFIX.'-editor-wizard', 'TwoJGalleryEditorWizardText', array( 
		'title' 	=> TwoJGalleryHelper::_tr('2J Gallery', 'blog-mechanics-theme-gallery'),
		'closeButton'	=> TwoJGalleryHelper::_tr('Close'),
		'insertButton'	=> TwoJGalleryHelper::_tr('Add Shortcode'),
	) );
	wp_enqueue_script( TWOJ_GALLERY_ASSETS_PREFIX.'-editor-wizard' );

  	echo 	'<a href="#twoj-gallery-editor-wizard-content" id="twoj-gallery-editor-wizard-button" class="button">'
  				.'<span class="dashicons dashicons-editor-kitchensink" style="margin: 4px 5px 0 0;"></span>'
  				.TwoJGalleryHelper::_tr( 'Add 2J Gallery' , 'blog-mechanics-theme-gallery')
  			.'</a>';
	
	$args = array(
	    'child_of'     => 0,
	    'sort_order'   => 'ASC',
	    'sort_column'  => 'post_title',
	    'hierarchical' => 1,
	    'echo'		=> 0,
	    'post_type' => TWOJ_GALLERY_TYPE_POST
	);
  	echo '<div id="twoj-gallery-editor-wizard-content" style="display: none;">'
  			.'<p>'
  				.TwoJGalleryHelper::_tr('Use ', 'blog-mechanics-theme-gallery')
  				.'<a href="edit.php?post_type='.TWOJ_GALLERY_TYPE_POST.'" class="button-link" target="_blank">'
  					.TwoJGalleryHelper::_tr( 'galleries manager', 'blog-mechanics-theme-gallery')
  				.'</a>'
  				.TwoJGalleryHelper::_tr(' for settings configuration. ', 'blog-mechanics-theme-gallery')
  			.'</p>'
  			.TwoJGalleryHelper::_tr('Here select one from the pre-configured galleries', 'blog-mechanics-theme-gallery').'<br /> '.wp_dropdown_pages( $args )
  		.'</div>';
}
add_action('media_buttons', 'twoj_gallery_editor_wizard', 15);
