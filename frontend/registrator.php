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

class twoJGalleryRegistrator{

	public function __construct(){
		add_action('init', array($this, 'init'));
	}

	public function init(){
		add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
	}

	public function enqueueScripts(){
		wp_enqueue_script('jquery');
		
		wp_enqueue_script(
			twoJGallery::POST_TYPE . '_gallery-init-js',
			TWOJ_GALLERY_URI . 'assets/js/init.min.js',
			array('jquery'),
			TWOJ_GALLERY_VERSION,
			true
		);

		wp_localize_script(
			twoJGallery::POST_TYPE . '_gallery-init-js',
			'twoJGalleryJSConst',
			array(
				'moduleUri' => TWOJ_GALLERY_URI,
				'ajaxUrl' 	=> admin_url('admin-ajax.php'),
				'typePost' 	=> twoJGallery::POST_TYPE,
			)
		);
	}
}
