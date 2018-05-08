<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/29/2017
 * Time: 9:15 AM
 */

namespace Mageplaza\GiftCard\Controller\GiftCard;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ObjectManager;

class Test extends \Magento\Framework\App\Action\Action
{

public function __construct(\Magento\Framework\App\Action\Context $context)
{
	parent::__construct($context);
}
public function execute()
{

//	var_dump($this->getData(5));
//	$this->Save();
//	$this->Edit();
//	$this->Delete();
}
public function Save(){
	$model=$this->_objectManager->create('Mageplaza\GiftCard\Model\GiftCard');
	$model->setData(['code'=>'ABCDEFGNJKGF345','balance'=>50,'create_from'=>'ADMIN'])->save();
}
public function Edit(){
	$model=$this->_objectManager->create('Mageplaza\GiftCard\Model\GiftCard');
	$model->load(1);
	$model->setCode('JKHKHGHJJHJ23');
	$model->save();
}
public function Delete(){
	$model=$this->_objectManager->create('Mageplaza\GiftCard\Model\GiftCard');
	$model->load(2)->delete();
}
public function getData($id){
	$model=$this->_objectManager->create('Mageplaza\GiftCard\Model\GiftCard');
	$data=$model->load($id)->getCode();
	return $data;
}
public function getHistory(){
	$model=$this->_objectManager->create('Mageplaza\GiftCard\Model\History');
	$data=$model->getCollection()->addFieldToFilter('customer_id',1);
	foreach ($data as $item) {
		var_dump($item->getHistory_id());echo "<br>";
	}
}
}