<?php
/**
 * Created by PhpStorm.
 * User: DinhXuan
 * Date: 11/21/2017
 * Time: 2:13 PM
 */

namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;






use Mageplaza\GiftCard\Controller\Adminhtml\GiftCard;

class Save extends GiftCard
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
	public function rand_string( $length ){
		$chars = "ABCDEFGHIJKLMLOPQRSTUVXYZ0123456789";
		$size = strlen( $chars );
		$str='';
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
	public function execute()
	{
		$resultRedirect = $this->resultRedirectFactory->create();
		$data = $this->getRequest()->getPost('post');

		$model=$this->_objectManager->create('Mageplaza\GiftCard\Model\GiftCard');
		if($data['giftcard_id']==0){
			$code_length=$data['code_length'];
			$code=$this->rand_string($code_length);
			$model->setData(['code'=>$code,'balance'=>$data['balance'],'create_from'=>'ADMIN'])->save();
		}else{
			$model->load($data['giftcard_id']);
			$model->setBalance($data['balance']);
			$model->save();
		}
		$this->messageManager->addSuccess(__('The GiftCode has been Saved.'));
		$resultRedirect->setPath('giftcard/*/');
		return $resultRedirect;

	}


}