<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 12/9/2017
 * Time: 9:42 PM
 */

namespace Mageplaza\GiftCard\Model\Total\Quote\Address;


class CustomDiscount extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

	/**
	 * @var \Magento\Framework\Pricing\PriceCurrencyInterface
	 */
	protected $_priceCurrency;

	/**
	 * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency [description]
	 */
	public function __construct(
		\Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
	) {
		$this->_priceCurrency = $priceCurrency;
	}

	public function collect(
		\Magento\Quote\Model\Quote $quote,
		\Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
		\Magento\Quote\Model\Quote\Address\Total $total
	) {
		parent::collect($quote, $shippingAssignment, $total);

		$customDiscount = -10;

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
			'value' => 10
		];
	}
	public function getLabel()
	{
		return __('Custom Discount');
	}






}