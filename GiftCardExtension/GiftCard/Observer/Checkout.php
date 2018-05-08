<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/5/2017
 * Time: 9:14 AM
 */

namespace Mageplaza\GiftCard\Observer;


use Magento\Framework\App\ObjectManager;

class Checkout implements \Magento\Framework\Event\ObserverInterface
{
	public function rand_string( $length ){
		$chars = "ABCDEFGHIJKLMLOPQRSTUVXYZ0123456789";
		$size = strlen( $chars );
		$str='';
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
	public function getCustomer_id(){
		$redeem=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Block\GiftCard\Dashboard\Redeem');
		return $redeem->getCustomerId();
	}
	public function getGiftcardId($code){
		$model=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Model\GiftCard');
		$data=$model->getCollection()->addFieldToFilter('code',$code)->getFirstItem();
		return $data->getGiftcard_id();
	}
	public function getQty($id){
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$cart = $objectManager->get('\Magento\Checkout\Model\Cart');
		$items = $cart->getQuote()->getAllItems();
		foreach ($items as $item) {
			if ($item->getProductId() == $id) {
				return $item->getQty();
			}
		}
	}



	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		$helper=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Helper\getConfigution');
		$code_length=$helper->getConfig('giftcard/code_setup/code_length');
		$str='';
		$model=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Model\GiftCard');
		$resource=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Model\History');
		$order = $observer->getEvent()->getData('order');
		$order_id = $order->getID();
		$order_number = $order->getIncrementId();
		$product=$order->getAllItems();
		foreach ($product as $item) {
			if($item->getProduct()->getTypeId() == 'virtual'){
				$code=$this->rand_string($code_length);
				$balance=$item-> getProduct()->getGiftcardAmount();
				$qty=$this->getQty($item->getProduct()->getId());
				$balance=$balance*$qty;
				$model->setData(['code'=>$code,'create_from'=>$order_number,'balance'=>$balance])->save();
				$resource->setData(['action'=>'Create for Order #'.$order_number,'customer_id'=>$this->getCustomer_id(),'giftcard_id'=>$this->getGiftcardId($code),'amount'=>$balance])->save();
			}
		}

	}
}



