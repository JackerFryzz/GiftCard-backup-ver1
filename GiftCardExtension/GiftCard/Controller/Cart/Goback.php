<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/6/2017
 * Time: 11:34 AM
 */

namespace Mageplaza\GiftCard\Controller\Cart;


use Magento\Framework\App\Action\Context;

class Goback extends \Magento\Framework\App\Action\Action
{
	protected $_giftcard;
	public function __construct(\Magento\Framework\App\Action\Context $context,\Mageplaza\GiftCard\Model\GiftCardFactory $giftcard_factory)
	{
		$this->_giftcard=$giftcard_factory;
		parent::__construct($context);
	}
	public function execute()
	{
	}
	public function goBack(){
		$this->_redirect('giftcardcode/redeem');
		$this->_goBack();
	}


}