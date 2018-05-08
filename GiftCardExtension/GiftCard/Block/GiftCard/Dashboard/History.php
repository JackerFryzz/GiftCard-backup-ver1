<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/1/2017
 * Time: 10:43 AM
 */

namespace Mageplaza\GiftCard\Block\GiftCard\Dashboard;


use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Template;
use Magento\Framework\App\ObjectManager;

class History extends Template
{


	public function getDatabyId(){
		$id_customer=$this->getCustomerId();
		$resource=ObjectManager::getInstance()->create('\Mageplaza\GiftCard\Model\History');
		$values=$resource->getCollection()->addFieldToFilter('customer_id',$id_customer);
		return $values;
	}
	public function getCustomerId(){
		$session=ObjectManager::getInstance()->create('\Magento\Customer\Model\Session')->getCustomer()->getId();
		return$session;
	}
	public function fomatDate($date){
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$objDate = $objectManager->create('Magento\Framework\Stdlib\DateTime\DateTime');
		$result =$objDate-> date('Y/m/d', $date);
		return $result;
	}
	public function fomatPrice($price){

		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$priceHelper = $objectManager->create('Magento\Framework\Pricing\Helper\Data');
		$formattedPrice = $priceHelper->currency($price, true, true);
		return $formattedPrice;
	}
	public function getGiftCode($id){
		$resource=ObjectManager::getInstance()->create('\Mageplaza\GiftCard\Model\GiftCard');
		$resource->load($id);
		return $resource->getCode();
	}



	public function execute()
	{

	}
}