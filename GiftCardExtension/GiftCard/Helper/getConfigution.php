<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/26/2017
 * Time: 2:58 PM
 */

namespace Mageplaza\GiftCard\Helper;


use Magento\Framework\App\Action\Context;

class getConfigution extends \Magento\Framework\App\Action\Action
{
	protected $scopeConfig;

	public function __construct(\Magento\Framework\App\Action\Context $context,\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
	{
		parent::__construct($context);
		$this->scopeConfig = $scopeConfig;
	}

	public function execute()
	{

	}
	public function getConfig($path){
		$data=$this->scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $data;
	}
}