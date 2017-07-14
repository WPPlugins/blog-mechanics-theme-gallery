/*  
 * 2J Gallery			http://2joomla.net/wordpress-plugins/2j-gallery
 * Version:           	2.1.5 - 21259
 * Author:            	2J Gallery Team
 * Author URI:        	http://2joomla.net
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 * Date:              	Mon, 05 Jun 2017 20:41:48 GMT
 */

(function ($) {
    $(document).ready(function () {
    	$('.twojGalleryFieldImagesButton').each(function() {
			var button = this;
			var buttonObj = $(this);
			var idField = buttonObj.next('input[type=hidden]');
			buttonObj.click(function(event){
				event.preventDefault();
				var idList = idField.val();
				var gallerysc = '[gallery ids="' +idList+ '"]';
	  			wp.media.gallery.edit(gallerysc).on('update', function(g){
					var id_array = [];
					var marginCount = 0;
					$.each(g.models, function(id, img) { ++marginCount; id_array.push(img.id); });
					idField.val(id_array.join(","));
				});
	  			if(idList==' ' || idList=='' ){
	  				$('.media-frame-menu .media-menu-item').eq(2).click();
	  			}
			});
		});
	});
})(jQuery);