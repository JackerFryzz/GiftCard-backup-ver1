<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/19/2017
 * Time: 10:37 AM
 */

namespace Mageplaza\GiftCard\Model;


use Magento\Framework\Model\AbstractModel;

class History extends AbstractModel
{
	protected function _construct()
	{
		$this->_init('Mageplaza\GiftCard\Model\ResourceModel\History');
	}

}