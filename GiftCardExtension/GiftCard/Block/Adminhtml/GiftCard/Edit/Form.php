<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/21/2017
 * Time: 10:45 AM
 */

namespace Mageplaza\GiftCard\Block\Adminhtml\GiftCard\Edit;


class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
	protected function _prepareForm()
	{

		$form = $this->_formFactory->create(
			[
				'data' => [
					'id' => 'edit_form',
					'action' => $this->getData('action'),
					'method' => 'post',
					'enctype' => 'multipart/form-data'
				]
			]
		);
		$form->setUseContainer(true);
		$this->setForm($form);
		return parent::_prepareForm();
	}
}