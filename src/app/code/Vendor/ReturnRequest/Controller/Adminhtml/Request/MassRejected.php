<?php
namespace Vendor\ReturnRequest\Controller\Adminhtml\Request;

class MassRejected extends \Magento\Backend\App\Action
{
    /**
     * Authorization Check
     *
     * @see _isAllowed()
     */
    public const ADMIN_RESOURCE = "Vendor_ReturnRequest::listing";

    /**
     * Dependency Initilization
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest\CollectionFactory $collectionFactory
     */
    public function __construct(
        protected \Magento\Backend\App\Action\Context $context,
        protected \Magento\Ui\Component\MassAction\Filter $filter,
        protected \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        protected \Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest\CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
    }

    /**
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection(
                $this->collectionFactory->create()
            );
            $count = 0;
            foreach ($collection as $item) {
                $item->setStatus('rejected');
                $item->save();
                $count ++;
            }
            if ($count > 0) {
                $this->messageManager->addSuccess(__('A total of %1 record(s) have been updated.', $count));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('returnrequest/request/listing');
    }
}
