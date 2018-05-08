<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/21/2017
 * Time: 10:09 AM
 */

namespace Mageplaza\GiftCard\Block\Adminhtml\GiftCard\Edit\Tab;
use Magento\Framework\App\ObjectManager;

class Post extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
	protected $_wysiwygConfig;

	protected $_countryOptions;

	protected $_booleanOptions;

	protected $_sampleMultiselectOptions;

	public function __construct(
		\Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
		\Magento\Config\Model\Config\Source\Locale\Country $countryOptions,
		\Magento\Config\Model\Config\Source\Yesno $booleanOptions,

		\Magento\Backend\Block\Template\Context $context,
		\Magento\Framework\Registry $registry,
		\Magento\Framework\Data\FormFactory $formFactory,
		array $data = []
	)
	{
		$this->_wysiwygConfig            = $wysiwygConfig;
		$this->_countryOptions           = $countryOptions;
		$this->_booleanOptions           = $booleanOptions;

		parent::__construct($context, $registry, $formFactory, $data);
	}

	public function rand_string( $length ){
		$chars = "ABCDEFGHIJKLMLOPQRSTUVXYZ0123456789";
		$size = strlen( $chars );
		$str='';
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
	protected function _prepareForm()
	{
		$helper=ObjectManager::getInstance()->create('Mageplaza\GiftCard\Helper\getConfigution');
		$value=$helper->getConfig('giftcard/code_setup/code_length');
		$post = $this->_coreRegistry->registry('new_giftcode');
		$form = $this->_formFactory->create();
		$form->setHtmlIdPrefix('post_');
		$form->setFieldNameSuffix('post');
		$fieldset = $form->addFieldset(
			'base_fieldset',
			[
				'legend' => __('Codes Information'),
				'class'  => 'fieldset-wide',
			]
		);

		if (!$post->getId()) {
			$fieldset->addField(
				'giftcard_id',
				'hidden',
				['name' => 'giftcard_id']
			);
			$fieldset->addField(
				'code_length',
				'text',
				['name'  => 'code_length',
				'label' => __('Code Length'),
				'title' => __('Code Length'),
				'value'  => $value,]
			);
			$fieldset->addField(
				'balance',
				'text',
				[
					'name'  => 'balance',
					'label' => __('Balance'),
					'title' => __('Balance'),
					'required' => true,
				]
			);
		}else{
			$fieldset->addField(
				'giftcard_id',
				'hidden',
				['name' => 'giftcard_id']
			);
			$fieldset->addField(
			'code',
			'text',
			[
				'name'  => 'code',
				'label' => __('Code'),
				'title' => __('Code'),
				'readonly' => true,
			]
			);
			$fieldset->addField(
				'balance',
				'text',
				[
					'name'  => 'balance',
					'label' => __('Balance'),
					'title' => __('Balance'),
					'required' => true,
				]
			);
			$fieldset->addField(
				'create_from',
				'text',
				[
					'name'  => 'create_from',
					'label' => __('Create From'),
					'title' => __('Create From'),
					'required' => true,
					'readonly' => true,
				]
			);
		}


//		$postData = $this->_session->getData('mageplaza_helloworld_post_data', true);
//		if ($postData) {
//			$post->addData($postData);
//		} else {
//			if (!$post->getId()) {
//				$post->addData($post->getDefaultValues());
//			}
//		}



		$form->addValues($post->getData());
		$this->setForm($form);
		return parent::_prepareForm();
	}

	public function getTabLabel()
	{
		return __('Codes Infomation');
	}

	public function getTabTitle()
	{
		return $this->getTabLabel();
	}

	public function canShowTab()
	{
		return true;
	}

	public function isHidden()
	{
		return false;
	}
}