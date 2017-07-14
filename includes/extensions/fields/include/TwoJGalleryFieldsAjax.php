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

class TwoJGalleryFieldsAjax{

	public function __construct(){
		$this->hook();
	}

	public function hook(){
		//delete_option( 'twoj_gallery_fields_voting1' );
		//delete_option( 'twoj_gallery_fields_feedback' );
		add_action('wp_ajax_twoj_gallery_fields_saveoption', array( $this, 'saveOption') );
	}

	public function saveOption(){
		if(isset($_POST['feedback']) && $_POST['feedback']==1){
			delete_option( 'twoj_gallery_fields_feedback' );
			add_option( 'twoj_gallery_fields_feedback', '1' ); 
		} else {
			delete_option( 'twoj_gallery_fields_voting1' );
			add_option( 'twoj_gallery_fields_voting1', '1' ); 
		}
		echo 'ok';
		wp_die();
	}

}
$fieldAjax = new TwoJGalleryFieldsAjax();