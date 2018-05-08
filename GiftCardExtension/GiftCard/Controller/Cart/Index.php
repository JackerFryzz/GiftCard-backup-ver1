<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/6/2017
 * Time: 3:50 PM
 */

namespace Mageplaza\GiftCard\Controller\Cart;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
	public function __construct(\Magento\Framework\App\Action\Context $context)
	{
		parent::__construct($context);
	}
	public function execute()
	{
		var_dump($this->getCode());
	}
	public function getCode(){
		return 'dgdgfgfgfg';
	}

}