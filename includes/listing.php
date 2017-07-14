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

if(!function_exists('twoJGalleryColumns')){
	function twoJGalleryColumns( $column, $post_id ) {
	    switch ( $column ) {
		case 'twoJGalleryColumnShortcode' :
			global $post;
			$slug = '' ;
			$slug = $post->post_name;
	        $shortcode = '<strong>[2jgallery '.$post->ID.']</strong>';
		    echo $shortcode; 
		    break;
	    }
	}
	add_action( 'manage_'.TWOJ_GALLERY_TYPE_POST.'_posts_custom_column' , 'twoJGalleryColumns', 10, 2 );
}

if(!function_exists('twoJGalleryAddColumns')){	
	function twoJGalleryAddColumns($columns) { 
		return array_merge($columns, 
			array( 
				'twoJGalleryColumnShortcode' => __('Shortcode', 'blog-mechanics-theme-gallery'),
			)
		); 
	}
	add_filter('manage_'.TWOJ_GALLERY_TYPE_POST.'_posts_columns' , 'twoJGalleryAddColumns');
}


if(!function_exists('twoj_gallery_listing_assets_files')){
	function twoj_gallery_listing_assets_files (){
		wp_enqueue_style (TWOJ_GALLERY_ASSETS_PREFIX.'-listing-css', TWOJ_GALLERY_ASSETS_CSS_ADMIN_URL.'listing.css', array( ), TWOJ_GALLERY_VERSION );
	}
	add_action( 'in_admin_header', 'twoj_gallery_listing_assets_files' );
}