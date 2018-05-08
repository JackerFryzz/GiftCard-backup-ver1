<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/1/2017
 * Time: 10:36 AM
 */

namespace Mageplaza\GiftCard\Controller\GiftCard;


use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_resultPageFactory;
	public function __construct(\Magento\Framework\App\Action\Context $context,\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_resultPageFactory=$pageFactory;
		parent::__construct($context);
	}
	public function execute()
	{

		$this->_view->loadLayout();
		$this->_view->renderLayout();
	}
}