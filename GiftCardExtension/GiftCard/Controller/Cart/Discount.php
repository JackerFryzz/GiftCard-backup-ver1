<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/6/2017
 * Time: 9:23 AM
 */
namespace Mageplaza\GiftCard\Controller\Cart;

use Magento\Framework\App\ObjectManager;
use Magento\Catalog\Controller\Product\View\ViewInterface;
use Magento\FirstModule\Model\Model;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;

class Discount  extends \Magento\Framework\App\Action\Action implements \Magento\Framework\Event\ObserverInterface
{
	public function __construct(\Magento\Framework\App\Action\Context $context)
	{
		parent::__construct($context);
	}
	public function execute()
	{
		echo "dgfgfgfgf";
	}
}