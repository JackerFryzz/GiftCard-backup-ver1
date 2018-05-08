<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/23/2017
 * Time: 11:59 PM
 */

namespace Mageplaza\GiftCard\Model\ResourceModel;


class Customer extends  \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('customer_entity','entity_id');
	}
}