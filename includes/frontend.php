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

function twoj_gallery_tag($content){
    global $post;
    
    if ( post_password_required() ) return $content;

    $returnCode = '';
    if( get_post_type() == TWOJ_GALLERY_TYPE_POST && is_main_query() ){
		$returnCode = do_shortcode("[2jgallery {$post->ID}]");
	}
	return $content.$returnCode;
}
add_filter( 'the_content', 'twoj_gallery_tag');

add_filter( 'the_content', 'twoj_gallery_remove_autop', 0 );
function twoj_gallery_remove_autop( $content ){
	remove_filter('the_content', 'wpautop');
    return $content;
}

function twoj_gallery_shortcode( $attr ) {
 	$retHTML = '';
 	$id = '';
	if( isset($attr) && isset($attr['id']) ){
		$id = (int) $attr['id'];
	}

	if( isset($attr) && isset($attr[0]) ){
		$id = (int) $attr[0];
	}

	if($id){
		$post = get_post($id);

		if( 
			$post && get_class($post) == 'WP_Post' && 
			isset($post->post_type) &&  $post->post_type==TWOJ_GALLERY_TYPE_POST 
		){
			$twoj_gallery = new twoJGallery($post);
			$retHTML = $twoj_gallery->getContent();	
		}
	}	
	return  $retHTML;
}
add_shortcode( '2jgallery', 'twoj_gallery_shortcode' );