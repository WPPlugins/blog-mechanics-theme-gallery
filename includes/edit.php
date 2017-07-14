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

if(  !TWOJ_GALLERY_FULL_VERSION ){

	if(!function_exists('twoJGalleryJSDialog')){
		function twoJGalleryJSDialog(){

			$newPost = twoJGalleryIsEdit('new') && !isset( $_GET['post'] );
			$openDialog = 0;
			if( $newPost ){
	        	$n=4;
	        	$all_wp_pages = wp_count_posts (TWOJ_GALLERY_TYPE_POST );
	        	$allCount = 
	        		$all_wp_pages->publish + 
	        		$all_wp_pages->draft + 
	        		$all_wp_pages->future + 
	        		$all_wp_pages->pending + 
	        		$all_wp_pages->private +
	        		$all_wp_pages->trash;
	        	if( $allCount >= ++$n &&  ( ($allCount % $n) == 0 ) ) $openDialog = 1;
			}
			wp_enqueue_style("wp-jquery-ui-dialog");
			wp_enqueue_script('jquery-ui-dialog');

			wp_enqueue_script( TWOJ_GALLERY_ASSETS_PREFIX.'-desc', TWOJ_GALLERY_ASSETS_JS_ADMIN_URL.'dialog.js', array( 'jquery' ), TWOJ_GALLERY_VERSION, true ); 
			wp_enqueue_style ( TWOJ_GALLERY_ASSETS_PREFIX.'-desc', TWOJ_GALLERY_ASSETS_CSS_ADMIN_URL.'dialog.css', array( ), '' );
			
			echo '<div id="twoj_gallery_dialog_options" '
						.'style="display: none;" '
						.'data-open="'.( $openDialog ? 1 : 0 ).'" '
						.'data-title="'.TwoJGalleryHelper::_tr('2J Gallery Premium', 'blog-mechanics-theme-gallery').'" '
						.'data-close="'.TwoJGalleryHelper::_tr('Continue with Free version', 'blog-mechanics-theme-gallery').'" '
						.'data-info="'.	TwoJGalleryHelper::_tr('Buy Premium', 'blog-mechanics-theme-gallery').'"'
					.'>'
					.TwoJGalleryHelper::_tr('Get full freedom and much more functionality with 2J Gallery Premium version ', 'blog-mechanics-theme-gallery')
				.'</div>';
			
		}
		add_action( 'in_admin_header', 'twoJGalleryJSDialog' );
	}
}
