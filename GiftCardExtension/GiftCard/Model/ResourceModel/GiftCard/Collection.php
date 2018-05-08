<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/29/2017
 * Time: 9:22 AM
 */


namespace Mageplaza\GiftCard\Model\ResourceModel\GiftCard;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Mageplaza\GiftCard\Model\GiftCard','Mageplaza\GiftCard\Model\ResourceModel\GiftCard');
	}
}