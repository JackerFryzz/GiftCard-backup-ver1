<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/20/2017
 * Time: 10:48 AM
 */

namespace Mageplaza\GiftCard\Ui\Component\Listing\Column;


use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class Balance extends Column
{

	/**
	 * @var PriceCurrencyInterface
	 */
	protected $priceFormatter;


	public function __construct(
		ContextInterface $context,
		UiComponentFactory $uiComponentFactory,
		PriceCurrencyInterface $priceFormatter,
		array $components = [],
		array $data = []
	) {
		$this->priceFormatter = $priceFormatter;
		parent::__construct($context, $uiComponentFactory, $components, $data);
	}

	/**
	 * Prepare Data Source
	 *
	 * @param array $dataSource
	 * @return array
	 */
	public function prepareDataSource(array $dataSource)
	{
		if (isset($dataSource['data']['items'])) {
			foreach ($dataSource['data']['items'] as & $item) {
				$currencyCode = isset($item['giftcard_id']) ? $item['giftcard_id'] : null;
				$item[$this->getData('name')] = $this->priceFormatter->format(
					$item[$this->getData('name')],
					false,
					null,
					null,
					$currencyCode
				);
			}
		}

		return $dataSource;
	}
}