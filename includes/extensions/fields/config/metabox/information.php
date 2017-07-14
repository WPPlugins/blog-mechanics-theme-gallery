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

if( !TwoJGalleryHelper::checkEvent() ) return array();

return array(
	'active' => true,
	'order' => 9,
	'settings' => array(
		'id' => 'twoj_gallery_information',
		'title' => 'Special offer!',
		'screen' => array(TWOJ_GALLERY_TYPE_POST),
		'context' => 'side',
		'priority' => 'high',
		'callback_args' => null,
	),
	'view' => 'default',
	'state' => 'open',
	'style' => null,
	'content' => 'template::content/information/content',
);
