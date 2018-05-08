<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/6/2017
 * Time: 9:23 AM
 */
namespace Mageplaza\GiftCard\Observer;

use Magento\Framework\App\ObjectManager;

use Magento\FirstModule\Model\Model;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;

class Discount  implements \Magento\Framework\Event\ObserverInterface
{
	protected $_responseFactory;
	protected $_GiftCard_Factory;
	protected $_messageManager;
	protected $_url;
	protected $_Request;
	protected $_codeSession;
	protected $_checkoutSession;

		public function __construct(
			\Magento\Customer\Model\Session $codeSession,
			\Magento\Framework\App\Action\Context $context,
			\Mageplaza\GiftCard\Model\GiftCardFactory $giftcard_factory,
			\Magento\Framework\Message\ManagerInterface $messageManager,
			\Magento\Framework\UrlInterface $url,
			\Magento\Framework\App\ResponseFactory $responseFactory,
			\Magento\Framework\App\Action\Action $request,
			\Magento\Checkout\Model\Session $checkoutSession
		)
		{
			$this->_codeSession=$codeSession;
			$this->_Request=$request;
			$this->_responseFactory = $responseFactory;
			$this->_GiftCard_Factory=$giftcard_factory;
			$this->_url=$url;
			$this->_messageManager = $messageManager;
			$this->_checkoutSession=$codeSession;
		}
	public function getCodeSession()
	{
		return $this->_codeSession;
	}
	public function execute(\Magento\Framework\Event\Observer $observer)
		{
			$code=$this->_Request->getRequest()->getParam('coupon_code');
			$check=$this->_Request->getRequest()->getParam('remove');
			$model=$this->_GiftCard_Factory->create();
			if($check==1){
				$this->getCodeSession()->unsCode();
			}else{
				$data=$model->getCollection()->addFieldToFilter('code',$code)->getFirstItem();
				if($data['giftcard_id'] &&$data['balance']>$data['amount_used']){
					$this->getCodeSession()->setCode($code);
					$RedirectUrl= $this->_url->getUrl('checkout/cart');
					$this->_messageManager->addSuccess('Gift code applied successfully');
					$this->_responseFactory->create()->setRedirect($RedirectUrl)->sendResponse();
					exit();
				}
			}


		}

	public function afterGetCouponCode(\Magento\Checkout\Block\Cart\Coupon $subject)
	{
		return $this->getCodeSession()->getCode();
	}

}