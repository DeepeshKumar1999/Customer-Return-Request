<?php
namespace Vendor\ReturnRequest\Controller\Request;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Vendor\ReturnRequest\Model\ReturnRequestFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;

class Save extends Action
{
    public function __construct(
        Context $context,
        protected ReturnRequestFactory $returnFactory,
        protected Session $customerSession,
        protected Filesystem $filesystem,
        protected UploaderFactory $uploaderFactory
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->customerSession->isLoggedIn()) {
            return $this->_redirect('customer/account/login');
        }
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            return $this->_redirect('sales/order/history');
        }
        try {
            $file = $this->getRequest()->getFiles('image');
            $imageName = null;
            if ($file && !empty($file['name'])) {
                $uploader = $this->uploaderFactory->create(['fileId' => 'image']);
                $uploader->setAllowedExtensions(['jpg','jpeg','png']);
                $uploader->setAllowRenameFiles(true);

                $mediaDir = $this->filesystem
                    ->getDirectoryWrite(DirectoryList::MEDIA)
                    ->getAbsolutePath('returnrequest/');

                $result = $uploader->save($mediaDir);
                $imageName = 'returnrequest/' . $result['file'];
            }
            $model = $this->returnFactory->create();
            $model->setData([
                'order_id'    => (int)$data['order_id'],
                'customer_id' => $this->customerSession->getCustomerId(),
                'reason'      => $data['reason'],
                'description' => $data['description'] ?? '',
                'image'       => $imageName,
                'status'      => 'new'
            ]);
            $model->save();
            $this->messageManager->addSuccessMessage(__('Return request submitted successfully.'));
            return $this->_redirect('sales/order/history');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Unable to submit return request.'));
            return $this->_redirectReferer();
        }
    }
}
