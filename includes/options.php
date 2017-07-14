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


?>
<div class="wrap">
	<h2><?php TwoJGalleryHelper::_et('2J Gallery General Settings', 'blog-mechanics-theme-gallery'); ?></h2>

	<form method="post" action="options.php" novalidate="novalidate">
		<?php 
		settings_fields( 'twoj_gallery_options' ); 
		do_settings_sections( 'twoj_gallery_options' ); 
		 ?>
		<table class="form-table">
			<tr>
				<th scope="row"><?php TwoJGalleryHelper::_et('Editable Sliders', 'blog-mechanics-theme-gallery'); ?></th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span><?php TwoJGalleryHelper::_et('Show Text', 'blog-mechanics-theme-gallery'); ?></span></legend>
						<label title='<?php TwoJGalleryHelper::_et('Enable', 'blog-mechanics-theme-gallery'); ?>'>
							<input type='radio' name='<?php echo TWOJ_GALLERY.'UI_Readonly'; ?>' value='1' <?php if( get_option(TWOJ_GALLERY.'UI_Readonly', '')=='1' ) echo " checked='checked'"; ?> /> 
							<?php echo TwoJGalleryHelper::_tr('Enable', 'blog-mechanics-theme-gallery'); ?>
						</label><br />
						<label title='<?php TwoJGalleryHelper::_et('Disable', 'blog-mechanics-theme-gallery'); ?>'>
							<input type='radio' name='<?php echo TWOJ_GALLERY.'UI_Readonly'; ?>' value='0' <?php if( !get_option(TWOJ_GALLERY.'UI_Readonly') ) echo " checked='checked'"; ?>  /> 
							<?php echo TwoJGalleryHelper::_tr('Disable', 'blog-mechanics-theme-gallery'); ?>
						</label><br />			
					</fieldset>
				</td>
			</tr>
			<tr>
				<td colspan="2" scope="row">
					<p class="description">
						<?php TwoJGalleryHelper::_et('this option enable/disable editable text fields for sliders in gallery options', 'blog-mechanics-theme-gallery'); ?>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php TwoJGalleryHelper::_et('Show  gallery options in media library', 'blog-mechanics-theme-gallery'); ?></th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span><?php TwoJGalleryHelper::_et('Show  gallery options in media library', 'blog-mechanics-theme-gallery'); ?></span></legend>
						
						<label title='<?php TwoJGalleryHelper::_et('Show', 'blog-mechanics-theme-gallery'); ?>'>
							<input type='radio' name='<?php echo TWOJ_GALLERY.'ML_Options'; ?>' value='1' <?php if( get_option(TWOJ_GALLERY.'ML_Options', '')=='1' ) echo " checked='checked'"; ?> /> 
							<?php echo TwoJGalleryHelper::_tr('Show', 'blog-mechanics-theme-gallery'); ?>
						</label>
						<br />
						<label title='<?php TwoJGalleryHelper::_et('Hide', 'blog-mechanics-theme-gallery'); ?>'>
							<input type='radio' name='<?php echo TWOJ_GALLERY.'ML_Options'; ?>' value='0' <?php if( !get_option(TWOJ_GALLERY.'ML_Options') ) echo " checked='checked'"; ?>  /> 
							<?php echo TwoJGalleryHelper::_tr('Hide', 'blog-mechanics-theme-gallery'); ?>
						</label><br />			
					</fieldset>
				</td>
			</tr>

		</table>
		<br/>
		<br/>
		<br/>
		<br/>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php TwoJGalleryHelper::_et('Save Changes', 'blog-mechanics-theme-gallery'); ?>"  />
		</p>

	</form>
</div>
<?php 
echo '<div class="">Copyright &copy; 2008-2017 2J Team '.TwoJGalleryHelper::_tr('All Rights Reserved', 'blog-mechanics-theme-gallery').'.</div>
';