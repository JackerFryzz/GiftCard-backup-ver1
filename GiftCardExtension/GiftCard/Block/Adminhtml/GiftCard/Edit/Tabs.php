<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/20/2017
 * Time: 5:01 PM
 */

namespace Mageplaza\GiftCard\Block\Adminhtml\GiftCard\Edit;



class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
	/**
	 * constructor
	 *
	 * @return void
	 */
	protected function _construct()
	{
		parent::_construct();
		$this->setId('post_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(__('Gift Card Information'));
	}
}