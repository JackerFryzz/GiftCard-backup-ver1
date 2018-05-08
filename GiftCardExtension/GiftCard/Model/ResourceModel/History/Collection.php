<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/19/2017
 * Time: 10:43 AM
 */

namespace Mageplaza\GiftCard\Model\ResourceModel\History;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Mageplaza\GiftCard\Model\History','Mageplaza\GiftCard\Model\ResourceModel\History');
	}
}