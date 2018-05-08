<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/29/2017
 * Time: 9:20 AM
 */

namespace Mageplaza\GiftCard\Model\ResourceModel;




class GiftCard extends  \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('giftcard_code','giftcard_id');
	}
}