<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/21/2017
 * Time: 2:13 PM
 */

namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;







use Mageplaza\GiftCard\Controller\Adminhtml\GiftCard;

class Delete extends GiftCard
{

	protected $_uploadModel;

	protected $_fileModel;

	protected $_imageModel;

	protected $_backendSession;

	public function __construct(

		\Magento\Backend\Model\Session $backendSession,
		\Mageplaza\GiftCard\Model\GiftCardFactory $postFactory,
		\Magento\Framework\Registry $registry,
		\Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
		\Magento\Backend\App\Action\Context $context
	)
	{

		$this->_backendSession = $backendSession;
		parent::__construct($postFactory, $registry, $resultRedirectFactory, $context);
	}

	public function execute()
	{

		$data = $this->getRequest()->getParams();
		$resultRedirect = $this->_resultRedirectFactory->create();
		$post = $this->_postFactory->create();
		$post->load($data['selected'][0]);
		$post->delete();
		$this->messageManager->addSuccess(__('The Post has been deleted.'));
		$resultRedirect->setPath('giftcard/*/');
		return $resultRedirect;

	}


}