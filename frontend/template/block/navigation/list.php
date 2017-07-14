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

 if ($navigationData) : ?>
	<div class="twoJGalleryCSSwrap">
		<?php foreach ($navigationData as $gallery) : ?>
			<a href="#" class="btn-2j <?php

				/* class button */
				if($galleryId == $gallery['post']['ID']) echo ' '.$itemClassActive;
				if($buttonColor) echo ' btn-2j-'.$buttonColor;
				if($buttonSize) echo ' btn-2j-'.$buttonSize;

			?>  "  data-twoJG-id="<?php echo $gallery['post']['ID']; ?>"  role="button">
					<?php echo apply_filters('the_title', $gallery['post']['post_title']); ?>
			</a>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
