<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/1/2017
 * Time: 10:36 AM
 */

namespace Mageplaza\GiftCard\Controller\GiftCard;


use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\TestFramework\ObjectManager;

class Main extends \Magento\Framework\App\Action\Action
{
	protected $_GiftCardFactory;
	protected $_historyFactory;
	public function __construct(\Magento\Framework\App\Action\Context $context,\Mageplaza\GiftCard\Model\GiftCardFactory $GiftCardFactory,\Mageplaza\GiftCard\Model\HistoryFactory $history_factory)
	{
		$this->_GiftCardFactory=$GiftCardFactory;
		$this->_historyFactory=$history_factory;
		parent::__construct($context);
	}
	public function execute()
	{
		echo $this->Demo();
	}
	public function Demo(){
//		$name='Dinh Hong Son';
//		echo $name;
	}
}