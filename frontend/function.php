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


function twojg_array_get_by_path(array $array, $path = ''){
	
	$sections = empty($path) ? array() : explode('/', $path);
	$value = &$array;

	foreach ($sections as $section) {
		if (!isset($value[$section])) {
			return null;
		}
		$value = &$value[$section];
	}

	return $value;
}
