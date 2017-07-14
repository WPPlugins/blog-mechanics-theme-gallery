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

 if (!empty($items)) : 

	$gridId = time() . '-' . mt_rand();
?>
	<div id="view-<?php echo $gridId; ?>" class="js-grid-view"></div>
	<div id="playlist-<?php echo $gridId; ?>" class="js-playlist" style="display: none">
		<ul data-category-name="gallery-0-<?php echo $gridId; ?>">
			<?php foreach($items as $item) : ?>
				<li
					class="js-twoJG-grid-item"
					data-twoJG-id="<?php echo $item['ID']; ?>"
					data-twoJG-type="<?php echo $item['type']; ?>"
					data-twoJG-link-type="<?php echo $item['link']['type']; ?>"
					data-url="<?php echo $item['link']['value']; ?>"
				>
					<img src="<?php echo $item['image']['preview']['url']; ?>" alt="">

					<?php if ( !$hoverTextHide && ( $item['title'] || $item['description'] ))  : ?>
						<div data-thumbnail-content1="">
							
							<?php if ($item['title']) : ?>
								<div class="center<?php echo $textColor=='light' ? 'White' : 'Dark' ; ?>">
									<?php echo apply_filters('the_title', $item['title']); ?>
								</div>
							<?php endif; ?>

							<?php if ($item['description']) : ?>
								<div class="centerNormal<?php echo $textColor=='light' ? 'White' : 'Dark' ; ?>"> 
									<?php echo $item['description']; ?>
								</div>
							<?php endif; ?>
						
						</div>
					<?php endif; ?>

					<?php if ($item['description']) : ?>
						<div class="description" data-lightbox-desc="">
							<p class="gallery1DecHeader"></p>
							<p class="gallery1DescP">
								<?php echo  $item['description'];//apply_filters('the_content',); ?>
							</p>
						</div>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
