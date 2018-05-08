<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/1/2017
 * Time: 2:02 PM
 */

namespace Mageplaza\GiftCard\Controller\Redeem;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
		public function __construct(\Magento\Framework\App\Action\Context $context)
		{
			parent::__construct($context);
		}
		public function execute()
		{
			$code = $this->getRequest()->getPostValue("redeem");
			$customer_id=$this->getRequest()->getPostValue('customer_id');
			$customer_balance=$this->getRequest()->getPostValue('customer_balance');
			$resource=ObjectManager::getInstance()->create('\Mageplaza\GiftCard\Model\GiftCard');
			$values=$resource->getCollection()->addFieldToFilter('code',$code)->getFirstItem();
			if($values->getbalance()){
				$giftcard_balance= $values->getbalance();
				$giftcard_amount=$values->getAmount_used();
				if($giftcard_balance>$giftcard_amount){

					$total=$giftcard_balance-$giftcard_amount+$customer_balance;
					$resource->load($values->getGiftcard_id())->setAmount_used($giftcard_balance)->save();

					$resource=ObjectManager::getInstance()->create('\Mageplaza\GiftCard\Model\History');
					$resource->setData(['amount'=>$giftcard_balance,'action'=>'Redeem','giftcard_id'=>$values->getGiftcard_id(),'customer_id'=>$customer_id])->save();

					$resource=ObjectManager::getInstance()->create('\Mageplaza\GiftCard\Model\Customer');
					$resource->load($customer_id)->setGiftcard_balance($total)->save();
					}
				$this->messageManager->addErrorMessage('Giftcode is used');
			}else{
				$this->messageManager->addErrorMessage('Redeem Failed : ');
			}
			$this->_redirect('giftcardcode/giftcard/index');

		}
}