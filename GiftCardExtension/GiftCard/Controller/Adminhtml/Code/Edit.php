<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/20/2017
 * Time: 4:34 PM
 */

namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;



use Mageplaza\GiftCard\Controller\Adminhtml\GiftCard;
use Magento\Framework\App\ObjectManager;




class Edit extends GiftCard
{
	/**
	 * Backend session
	 *
	 * @var \Magento\Backend\Model\Session
	 */
	protected $_backendSession;
	/**
	 * Page factory
	 *
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $_resultPageFactory;
	/**
	 * Result JSON factory
	 *
	 * @var \Magento\Framework\Controller\Result\JsonFactory
	 */
	protected $_resultJsonFactory;
	/**
	 * constructor
	 *
	 * @param \Magento\Backend\Model\Session $backendSession
	 * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
	 * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
	 * @param \Mageplaza\GiftCard\Model\GiftCardFactory $postFactory
	 * @param \Magento\Framework\Registry $registry
	 * @param \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory
	 * @param \Magento\Backend\App\Action\Context $context
	 */
	public function __construct(
		\Magento\Backend\Model\Session $backendSession,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
		\Mageplaza\GiftCard\Model\GiftCardFactory $postFactory,
		\Magento\Framework\Registry $registry,
		\Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
		\Magento\Backend\App\Action\Context $context
	)
	{
		$this->_backendSession    = $backendSession;
		$this->_resultPageFactory = $resultPageFactory;
		$this->_resultJsonFactory = $resultJsonFactory;
		parent::__construct($postFactory, $registry, $resultRedirectFactory, $context);
	}
	/**
	 * is action allowed
	 *
	 * @return bool
	 */
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Mageplaza_GiftCard::ManageCodes');
	}


	public function execute()
	{
		$id = $this->getRequest()->getParam('giftcard_id');

		$post = $this->_initPost();

		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu('Mageplaza_GiftCard::ManageCodes');
		$resultPage->getConfig()->getTitle()->set(__('Codes'));
		if ($id) {
			$post->load($id);
			if (!$post->getId()) {
				$this->messageManager->addError(__('This Post no longer exists.'));
				$resultRedirect = $this->_resultRedirectFactory->create();
				$resultRedirect->setPath(
					'giftcard/*/edit',
					[
						'giftcard_code' => $post->getId(),
						'_current' => true
					]
				);
				return $resultRedirect;
			}
		}
		$title = $post->getId() ? $post->getName() : __('New Codes');
		$resultPage->getConfig()->getTitle()->prepend($title);
		$data = $this->_backendSession->getData('mageplaza_helloworld_post_data', true);
		if (!empty($data)) {
			$post->setData($data);
		}
		return $resultPage;
	}
}