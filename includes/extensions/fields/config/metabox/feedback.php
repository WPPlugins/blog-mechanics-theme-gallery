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

if( get_option( 'twoj_gallery_fields_feedback' ) ) return array();

wp_register_script( TWOJ_GALLERY_ASSETS_PREFIX.'-field-type-feedback', TWOJ_GALLERY_FILEDS_URL.'asset/metabox/feedback/script.js', array('jquery'), false, true);

$translation_array = array(
	'messageOk' => 				TwoJGalleryHelper::_tr( 'Thank you very much for your feedback!', 'blog-mechanics-theme-gallery'),
	'messageError' => 			TwoJGalleryHelper::_tr( 'Submit error. Please try again later.',  'blog-mechanics-theme-gallery'),
	'messageEmpty' => 			TwoJGalleryHelper::_tr( 'Please fill the form before click on send button.',  'blog-mechanics-theme-gallery'),
	'messageCorrectEmail' => 	TwoJGalleryHelper::_tr( 'Incorrect email.',  'blog-mechanics-theme-gallery'),
);

wp_localize_script( TWOJ_GALLERY_ASSETS_PREFIX.'-field-type-feedback', 'twojGalleryFeedbackTr', $translation_array );

wp_enqueue_script( TWOJ_GALLERY_ASSETS_PREFIX.'-field-type-feedback' );


return array(
	'active' => true,
	'order' => 8,
	'settings' => array(
		'id' => 'twoj_gallery_feedback',
		'title' => 'Speedy Contact',
		'screen' => array(TWOJ_GALLERY_TYPE_POST),
		'context' => 'side',
		'priority' => 'default',
		'callback_args' => null,
	),
	'view' => 'default',
	'state' => 'open',
	'style' => null,
	'content' => 'template::content/feedback/content',
);
