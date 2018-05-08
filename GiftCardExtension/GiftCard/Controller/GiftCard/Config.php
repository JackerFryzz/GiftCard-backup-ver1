<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/30/2017
 * Time: 9:34 PM
 */

namespace Mageplaza\GiftCard\Controller\GiftCard;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Action\Context;

class Config extends \Magento\Framework\App\Action\Action
{
public function __construct(\Magento\Framework\App\Action\Context $context)
{
	parent::__construct($context);
}
public function execute()
{
	$helper=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Helper\getConfigution');
	$value=$helper->getConfig('giftcard/general/enable_giftcard');
	var_dump($value);
}
}