<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/9/2017
 * Time: 9:52 PM
 */

namespace Mageplaza\GiftCard\Model\Quote\Address\Total;


class CustomDiscount extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

	protected $_priceCurrency;
	protected  $_session;
	protected  $_giftcard;
	public function __construct(
		\Mageplaza\GiftCard\Model\GiftCardFactory $giftcard_factory,
		\Magento\Customer\Model\Session $codeSession,
		\Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
	) {
		$this->_priceCurrency = $priceCurrency;
		$this->_session=$codeSession;
		$this->_giftcard=$giftcard_factory;
	}

	public function collect(
		\Magento\Quote\Model\Quote $quote,
		\Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
		\Magento\Quote\Model\Quote\Address\Total $total
	) {
		parent::collect($quote, $shippingAssignment, $total);

		$code=$this->_session->getCode();
		$model=$this->_giftcard->create();
		$value=	$model->getCollection()->addFieldToFilter('code',$code)->getFirstItem();
		$value=0-($value['balance']-$value['amount_used']);
		$customDiscount = $value;

		$total->addTotalAmount('customdiscount', $customDiscount);
		$total->addBaseTotalAmount('customdiscount', $customDiscount);
		$quote->setCustomDiscount($customDiscount);
		return $this;
	}
	public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
	{
		return [
			'code' => 'Custom_Discount',
			'title' => $this->getLabel(),
			'value' => 0-$quote->getCustomDiscount(),

		];
	}
	public function getLabel()
	{
		return __('Custom Discount');
	}






}