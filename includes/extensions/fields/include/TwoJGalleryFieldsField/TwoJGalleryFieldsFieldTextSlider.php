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

class TwoJGalleryFieldsFieldTextSlider extends TwoJGalleryFieldsField{

	protected function getDefaultOptions(){
		return array(
			'textBefore' => '',
			'textAfter' => '',
			'data-start' => 0,
			'data-end' => 100,
			'step' => 1
		);
	}

	protected function normalize($value){
		$min = isset($this->options['data-start']) ? $this->options['data-start'] : 0;
		$max = isset($this->options['data-end']) ? $this->options['data-end'] : 100;
		$step = isset($this->options['step']) ? absint($this->options['step']) : 1;

		$value = parent::normalize($value);

		if ($value < $min) {
			$value = $min;
		}
		if ($value > $max) {
			$value = $max;
		}
		if ($remainder = $value % $step) {
			$value = max($min, $value - $remainder);
		}

		return $value;
	}
}
