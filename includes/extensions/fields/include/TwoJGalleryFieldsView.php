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

class TwoJGalleryFieldsView{

	public function render($template, array $vars = array()){

		$templatePath = TWOJ_GALLERY_FILEDS_TEMPLATE . $template . '.tpl.php';

		if (!file_exists($templatePath)) {
			throw new Exception(__("Could not find template. Template: {$template}"));
		}
		extract($vars);
		require $templatePath;
	}

	public function content($template, array $vars = array()){
		ob_start();
		$this->render($template, $vars);
		$content = ob_get_contents();
		ob_clean();

		return $content;
	}
}
