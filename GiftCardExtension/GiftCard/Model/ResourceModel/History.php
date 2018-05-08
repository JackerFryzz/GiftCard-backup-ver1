<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/19/2017
 * Time: 10:39 AM
 */

namespace Mageplaza\GiftCard\Model\ResourceModel;




class History extends  \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('giftcard_history','history_id');
	}
}