<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/21/2017
 * Time: 9:16 AM
 */

namespace Mageplaza\GiftCard\Controller\Adminhtml;


abstract class GiftCard extends \Magento\Backend\App\Action
{

	protected $_postFactory;

	protected $_coreRegistry;

	protected $_resultRedirectFactory;

	public function __construct(
		\Mageplaza\GiftCard\Model\GiftCardFactory $postFactory,
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
		\Magento\Backend\App\Action\Context $context
	)
	{
		$this->_postFactory           = $postFactory;
		$this->_coreRegistry          = $coreRegistry;
		$this->_resultRedirectFactory = $resultRedirectFactory;
		parent::__construct($context);
	}
	protected function _initPost()
	{
		$postId  = (int) $this->getRequest()->getParam('giftcard_code');
		$post    = $this->_postFactory->create();
		if ($postId) {
			$post->load($postId);
		}
		$this->_coreRegistry->register('new_giftcode', $post);
		return $post;
	}
}