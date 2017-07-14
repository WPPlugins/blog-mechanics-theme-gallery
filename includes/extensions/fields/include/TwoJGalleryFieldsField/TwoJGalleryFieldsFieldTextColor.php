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


class TwoJGalleryFieldsFieldTextColor extends TwoJGalleryFieldsField{
	const FORMAT_RGB = 	'rgb';
	const FORMAT_RGBA = 'rgba';
	const FORMAT_HEX = 	'hex';

	protected function normalize($value){

		$format = isset($this->options['color-format']) ? $this->options['color-format'] : null;
		$value = parent::normalize($value);

		if (self::FORMAT_RGB === $format && isset($this->options['colorpicker']['order']['opacity'])) {
			$format = self::FORMAT_RGBA;
		}

		switch ($format) {
			case self::FORMAT_RGB:
				return preg_match('/rgb\([0-9]{1,3}, [0-9]{1,3}, [0-9]{1,3}\)/', $value)
					? $value
					: null;
			case self::FORMAT_RGBA:
				return preg_match('/rgba\([0-9]{1,3}, [0-9]{1,3}, [0-9]{1,3}, (0|1|0\.[0-9]{1,2})\)/', $value)
					? $value
					: null;
			case self::FORMAT_HEX:
				return preg_match('/#[0-9a-f]{6}/i', $value)
					? $value
					: null;
			default:
				return null;
		}
	}
}
