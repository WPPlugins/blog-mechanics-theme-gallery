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

class twoJGalleryWidget extends WP_Widget {

  function __construct(){
    parent::__construct(
    	'twoJGalleryWidget', 
    	TwoJGalleryHelper::_tr( '2J Gallery Widget', 'blog-mechanics-theme-gallery'), 
    	array(
    		'description' => TwoJGalleryHelper::_tr( "Gallery for your blog", 'blog-mechanics-theme-gallery'), 
    	)
    );
  }

  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $galleryId = $instance['galleryId'];

    echo $args['before_widget'];
    if( !empty($title) ) echo $args['before_title'].$title.$args['after_title'];
    
    if( function_exists( 'twoJGalleryWidgetPro' ) ){
    	twoJGalleryWidgetPro($galleryId);
    }
    
    if(!TWOJ_GALLERY_FULL_VERSION) TwoJGalleryHelper::_et('This widget available in Premium version', 'blog-mechanics-theme-gallery');
    echo $args['after_widget'];
  }


  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    } else {
      $title = TwoJGalleryHelper::_tr('New gallery', 'blog-mechanics-theme-gallery');
    }
    
    if ( isset( $instance[ 'galleryId' ] ) ) {
        $galleryId = (int) $instance[ 'galleryId' ];
    }
    else {
        $galleryId = 0;
    }
    $args = array(
      'child_of'     => 0,
      'sort_order'   => 'ASC',
      'sort_column'  => 'post_title',
      'hierarchical' => 1,
      'selected'     => $galleryId,
      'name'         => $this->get_field_name( 'galleryId' ),
      'id'           => $this->get_field_id( 'galleryId' ),
      'echo'    => 1,
      'post_type' => TWOJ_GALLERY_TYPE_POST
    );
    ?>
	<?php 
	if(!TWOJ_GALLERY_FULL_VERSION){ ?>
    	<p><a href="<?php echo TWOJ_GALLERY_PREMIUM_LINK; ?>" target="_blank"> <?php TwoJGalleryHelper::_et('This widget available in Premium version', 'blog-mechanics-theme-gallery');?> </a></p>     
	<?php } ?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"> <?php TwoJGalleryHelper::_et('Title', 'blog-mechanics-theme-gallery'); ?>:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	<p>
		<?php TwoJGalleryHelper::_et('Use ', 'blog-mechanics-theme-gallery');?> 
		<a href="edit.php?post_type=<?php echo TWOJ_GALLERY_TYPE_POST; ?>"><?php TwoJGalleryHelper::_et('galleries manager', 'blog-mechanics-theme-gallery');?> </a>
		<?php TwoJGalleryHelper::_et('for settings configuration. ', 'blog-mechanics-theme-gallery');?> 
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'galleryId' ); ?>"><?php TwoJGalleryHelper::_et('Here select one from the pre-configured galleries', 'blog-mechanics-theme-gallery'); ?>:</label> 
		<?php wp_dropdown_pages( $args ); ?>
	</p>

	<script type="text/javascript">jQuery(function(){ jQuery('#<?php echo $this->get_field_id( 'galleryId' ); ?>').addClass('widefat'); });</script>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['galleryId'] = ( ! empty( $new_instance['galleryId'] ) ) ? (int) $new_instance['galleryId'] : 0;
    return $instance;
  }
}

function twoJGalleryRegisterWidget() {
  register_widget( 'twoJGalleryWidget' );
}

add_action( 'widgets_init', 'twoJGalleryRegisterWidget' );