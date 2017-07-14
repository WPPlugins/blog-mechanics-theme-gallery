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

if( !get_option(TWOJ_GALLERY.'ML_Options') ){
	function twoj_gallery_hide_attachment_fields() {
		$prefix = ".compat-attachment-fields tr.compat-field-";
		echo "<style>"
			.$prefix.TWOJ_GALLERY."line,"	
			.$prefix.TWOJ_GALLERY."type_link,"
			.$prefix.TWOJ_GALLERY."link{  
				display:none;
		}</style>";
	}
	add_action('admin_head', 'twoj_gallery_hide_attachment_fields');
}

if(!TWOJ_GALLERY_FULL_VERSION){
	function twoj_gallery_setup_attachment_fields() {
		$prefix = ".compat-attachment-fields tr.compat-field-";
		echo "<style>"
			.$prefix.TWOJ_GALLERY."type_link,"
			.$prefix.TWOJ_GALLERY."link{  
				z-index: 1000; 
				opacity: 0.4; 
				pointer-events: none;
		}</style>";
	}
	add_action('admin_head', 'twoj_gallery_setup_attachment_fields');
}


function twoj_gallery_attachment_fields( $form_fields, $post ) {

	$form_fields[TWOJ_GALLERY.'line'] = array(
		'label' => '',
		'input' => 'html',
		'html' 	=> '<br/><h3>'.TwoJGalleryHelper::_tr('2J Gallery Premium options', 'blog-mechanics-theme-gallery').'</h3>'
		.(!TWOJ_GALLERY_FULL_VERSION ? '<a class="button-primary twoj-gallery-option-premium" target="_blank" href="'.TWOJ_GALLERY_PREMIUM_LINK.'">'.TwoJGalleryHelper::_tr('BUY NOW', 'blog-mechanics-theme-gallery').'</a>' : '' )
	);

		
	$form_fields[TWOJ_GALLERY.'link'] = array(
		'label' => TwoJGalleryHelper::_tr('Link'),
		'input' => 'text',
		'value' => get_post_meta( $post->ID, TWOJ_GALLERY.'link', true ),
	);

	$value = get_post_meta( $post->ID, TWOJ_GALLERY.'type_link', true );
	if ( empty( $value ) )  $value = 'self';

	$selectBox = 
	"<select name='attachments[{$post->ID}][".TWOJ_GALLERY."type_link]' id='attachments[{$post->ID}][".TWOJ_GALLERY."type_link]'>
		<option value='self' "	.($value=='self'	?'selected':'').">".TwoJGalleryHelper::_tr( 'Self' )."</option>
		<option value='blank' "	.($value=='blank' 	?'selected':'').">".TwoJGalleryHelper::_tr( 'Blank' )."</option>
		<option value='video' "	.($value=='video' 	?'selected':'').">".TwoJGalleryHelper::_tr( 'Video' )."</option>
	</select>";

	$form_fields[TWOJ_GALLERY.'type_link'] = array(
		'label' 	=> TwoJGalleryHelper::_tr('Blank Link'),
		'input' 	=> 'html',
		'default' 	=> 'blank',
		'value' 	=> $value,
		'html' 		=> $selectBox 
	);

	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'twoj_gallery_attachment_fields', 10, 2 );


function twoj_gallery_attachment_fields_save( $post, $attachment ) {
	
	if( isset( $attachment[TWOJ_GALLERY.'link'] ) && TWOJ_GALLERY_FULL_VERSION )
		update_post_meta( $post['ID'], TWOJ_GALLERY.'link', 		esc_url( $attachment[TWOJ_GALLERY.'link'] ) );
	
	if( isset( $attachment[TWOJ_GALLERY.'type_link'] ) && TWOJ_GALLERY_FULL_VERSION )
		update_post_meta( $post['ID'], TWOJ_GALLERY.'type_link',  	$attachment[TWOJ_GALLERY.'type_link'] );
	
	return $post;
}
add_filter( 'attachment_fields_to_save', 'twoj_gallery_attachment_fields_save', 10, 2 );