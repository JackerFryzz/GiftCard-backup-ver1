<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/20/2017
 * Time: 2:56 PM
 */

namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;


class NewAction extends \Magento\Framework\App\Action\Action
{
	protected $resultPageFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	) {
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

	public function execute()
	{
		$this->_forward('edit');
	}

}