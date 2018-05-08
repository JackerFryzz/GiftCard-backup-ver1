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

class Redeem extends Template
{
	protected $customerSession;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Magento\Customer\Model\Session $customerSession,array $data = [])
	{
		$this->customerSession = $customerSession;
		parent::__construct($context, $data);
	}


	public function getBalance(){
		$id_customer=$this->getCustomerId();
		$model=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Model\Customer');
		return $model->load($id_customer);

	}
	public function getCustomerId(){
		return $this->customerSession->getCustomer()->getId();
	}
	public function fomatPrice($price){

		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$priceHelper = $objectManager->create('Magento\Framework\Pricing\Helper\Data');
		$formattedPrice = $priceHelper->currency($price, true, true);
		return $formattedPrice;
	}
	public function getConfig(){
		$config=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Helper\getConfigution');
		return $config->getConfig('giftcard/general/enable_redeem');
	}


	public function execute()
	{

	}
}