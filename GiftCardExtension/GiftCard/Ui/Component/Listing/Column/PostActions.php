<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/20/2017
 * Time: 10:22 AM
 */

namespace Mageplaza\GiftCard\Ui\Component\Listing\Column;


namespace Mageplaza\GiftCard\Ui\Component\Listing\Column;
class PostActions extends \Magento\Ui\Component\Listing\Columns\Column
{

	const URL_PATH_EDIT = 'giftcard/code/edit';
	const URL_PATH_DELETE = 'giftcard/code/delete';


	protected $_urlBuilder;

	public function __construct(
		\Magento\Framework\UrlInterface $urlBuilder,
		\Magento\Framework\View\Element\UiComponent\ContextInterface $context,
		\Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
		array $components = [],
		array $data = []
	)
	{
		$this->_urlBuilder = $urlBuilder;
		parent::__construct($context, $uiComponentFactory, $components, $data);
	}

	public function prepareDataSource(array $dataSource)
	{
		if (isset($dataSource['data']['items'])) {

			foreach ($dataSource['data']['items'] as & $item) {
				if (isset($item['giftcard_id'])) {
					$item[$this->getData('name')] = [
						'edit' => ['href' => $this->_urlBuilder->getUrl(static::URL_PATH_EDIT, ['giftcard_id' => $item['giftcard_id']]), 'label' => 'Edit'],

					];

				}
			}
		}
		return $dataSource;
	}
}