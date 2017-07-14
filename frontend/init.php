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

define('TWOJ_GALLERY_DIR', 			dirname(__FILE__).'/');

define('TWOJ_GALLERY_URI', 			plugin_dir_url(__FILE__));

define('TWOJ_GALLERY_TEMPLATE_DIR', 	TWOJ_GALLERY_DIR.'template/');
define('TWOJ_GALLERY_BLOCK_DIR', 		TWOJ_GALLERY_DIR.'block/');

if (!class_exists('twojGalleryPostConfigParent')){
	class twojGalleryPostConfigParent{};
}

twoj_gallery_include( array(
	'function.php', 
	'configPost.php', 
	'config.php', 
	'options.php', 
	'registrator.php', 
	'ajax.php', 
	'view.php', 
	'gallery.php' 
), TWOJ_GALLERY_FRONTEND_PATH);

twoj_gallery_include( array(
	'blockInterface.php', 
	'navigation.php', 
	'content.php', 
	'breadcrumbs.php', 
	'pagination.php', 
), TWOJ_GALLERY_BLOCK_DIR);

new twoJGalleryRegistrator();
new twoJGalleryAjax();
