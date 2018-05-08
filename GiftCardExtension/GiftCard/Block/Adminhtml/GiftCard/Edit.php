<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/20/2017
 * Time: 4:59 PM
 */

namespace Mageplaza\GiftCard\Block\Adminhtml\GiftCard;


use Magento\Backend\Block\Widget\Form\Container;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

//class Edit extends Container
//{
//	/**
//	 * Core registry
//	 *
//	 * @var \Magento\Framework\Registry
//	 */
//	protected $_coreRegistry = null;
//
//	/**
//	 * @param Context $context
//	 * @param Registry $registry
//	 * @param array $data
//	 */
//	public function __construct(
//		Context $context,
//		Registry $registry,
//		array $data = []
//	) {
//		$this->_coreRegistry = $registry;
//		parent::__construct($context, $data);
//	}
//
//	/**
//	 * Class constructor
//	 *
//	 * @return void
//	 */
//	protected function _construct()
//	{
//		$this->_objectId = 'id';
//		$this->_controller = 'adminhtml_giftcard';
//		$this->_blockGroup = 'Mageplaza_GiftCode';
//
//		parent::_construct();
//
//		$this->buttonList->update('save', 'label', __('Save'));
//		$this->buttonList->add(
//			'saveandcontinue',
//			[
//				'label' => __('Save and Continue Edit'),
//				'class' => 'save',
//				'data_attribute' => [
//					'mage-init' => [
//						'button' => [
//							'event' => 'saveAndContinueEdit',
//							'target' => '#edit_form'
//						]
//					]
//				]
//			],
//			-100
//		);
//		$this->buttonList->update('delete', 'label', __('Delete'));
//	}
//
//	/**
//	 * Retrieve text for header element depending on loaded news
//	 *
//	 * @return string
//	 */
//	public function getHeaderText()
//	{
//		$newsRegistry = $this->_coreRegistry->registry('simplenews_news');
//		if ($newsRegistry->getId()) {
//			$newsTitle = $this->escapeHtml($newsRegistry->getTitle());
//			return __("Edit News '%1'", $newsTitle);
//		} else {
//			return __('Add News');
//		}
//	}
//
//	/**
//	 * Prepare layout
//	 *
//	 * @return \Magento\Framework\View\Element\AbstractBlock
//	 */
//	protected function _prepareLayout()
//	{
//		$this->_formScripts[] = "
//            function toggleEditor() {
//                if (tinyMCE.getInstanceById('post_content') == null) {
//                    tinyMCE.execCommand('mceAddControl', false, 'post_content');
//                } else {
//                    tinyMCE.execCommand('mceRemoveControl', false, 'post_content');
//                }
//            };
//        ";
//
//		return parent::_prepareLayout();
//	}
//}


class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
	/**
	 * Core registry
	 *
	 * @var \Magento\Framework\Registry
	 */
	protected $_coreRegistry;
	/**
	 * constructor
	 *
	 * @param \Magento\Framework\Registry $coreRegistry
	 * @param \Magento\Backend\Block\Widget\Context $context
	 * @param array $data
	 */
	public function __construct(
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Backend\Block\Widget\Context $context,
		array $data = []
	)
	{
		$this->_coreRegistry = $coreRegistry;
		parent::__construct($context, $data);
	}

	protected function _construct()
	{
		$this->_objectId = 'id';
		$this->_blockGroup = 'Mageplaza_GiftCard';
		$this->_controller = 'adminhtml_giftcard';
		parent::_construct();
		$this->buttonList->update('save', 'label', __('Save Codes'));
		$this->buttonList->add(
			'save-and-continue',
			[
				'label' => __('Save and Continue Edit'),
				'class' => 'save',
				'data_attribute' => [
					'mage-init' => [
						'button' => [
							'event' => 'saveAndContinueEdit',
							'target' => '#edit_form'
						]
					]
				]
			],
			-100
		);
		$this->buttonList->update('delete', 'label', __('Delete Post'));
	}

	public function getHeaderText()
	{
		$post = $this->_coreRegistry->registry('new_giftcode');
		if ($post->getId()) {
			return __("Edit Post '%1'", $this->escapeHtml($post->getName()));
		}
		return __('New Post');
	}
}
