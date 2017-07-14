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

class twoJGalleryBreadcrumbs implements twoJGalleryBlockInterface{

	const BLOCK_NAME 	= 'breadcrumbs';
	const VIEW_SHOW 	= 'show';
	const VIEW_HIDDEN 	= 'hidden';

	protected $gallery;

	protected $activeGalleryPost;

	public function __construct(twoJGallery $gallery){
		$this->gallery = $gallery;
	}


	public function getContent($view = null){
		if (!$view) {
			$view = $this->gallery->getConfig()->get('gallery/block/breadcrumbs/view');
		}

		switch ($view) {
			case self::VIEW_SHOW:
				$view = new twoJGalleryView();
				$separator = $this->gallery->getConfig()->get('gallery/block/breadcrumbs/separator');
				return $view->content(
					'block/breadcrumbs.php',
					array(
						'breadcrumbs' => $this->getBreadcrumbs(),
						'separator' => $separator ? $separator : '',
						'up' => $this->getUp()
					)
				);
			case self::VIEW_HIDDEN:
				return '';
		}
		throw new Exception(sprintf('Wrong Breadcrumbs block view: %s', $view));
	}

	protected function getBreadcrumbs(){
		
		$gallery = $this->gallery->getData('post');
		$activeGallery = $this->getActiveGalleryPost();
		$breadcrumbs = array(
			array(
				'title' => apply_filters('the_title', $activeGallery['post_title'])
			)
		);

		if ($gallery['ID'] != $activeGallery['ID']) {
			foreach (get_post_ancestors($activeGallery['ID']) as $parentGalleryId) {
				$parentGallery = get_post($parentGalleryId);
				$breadcrumbs[] = array(
					'id' => $parentGallery->ID,
					'title' => apply_filters('the_title', $parentGallery->post_title)
				);

				if ($parentGallery->ID == $gallery['ID']) {
					break;
				}
			}
		}

		return array_reverse($breadcrumbs);
	}

	protected function getUp(){
		$isShow = $this->gallery->getConfig()->get('gallery/block/breadcrumbs/up/is_show');
		$up = null;

		if (!$isShow) {
			return $up;
		}

		$gallery = $this->gallery->getData('post');
		$activeGallery = $this->getActiveGalleryPost();
		if (0 !== $activeGallery['post_parent'] && $gallery['ID'] != $activeGallery['ID']) {
			$up = array(
				'id' => $activeGallery['post_parent'],
				'title' => TwoJGalleryHelper::_tr('Up')
			);
		}

		return $up;
	}

	/**
	 * Get active gallery post data
	 *
	 * @return array
	 */
	protected function getActiveGalleryPost()
	{
		if (!$this->activeGalleryPost) {
			$activeGalleryId = isset($_GET['active_gallery_id'])
				? intval($_GET['active_gallery_id'])
				: null;

			if ($activeGalleryId) {
				$this->activeGalleryPost = get_post($activeGalleryId, ARRAY_A);
			}

			if (!$this->activeGalleryPost) {
				$this->activeGalleryPost = $this->gallery->getData('post');
			}
		}

		return $this->activeGalleryPost;
	}
}
