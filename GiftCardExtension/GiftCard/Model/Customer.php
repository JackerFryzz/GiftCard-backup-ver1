<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/23/2017
 * Time: 11:58 PM
 */


namespace Mageplaza\GiftCard\Model;


use Magento\Framework\Model\AbstractModel;

class Customer extends AbstractModel
{
	protected function _construct()
	{
		$this->_init('Mageplaza\GiftCard\Model\ResourceModel\Customer');
	}

}