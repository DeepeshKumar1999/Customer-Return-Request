<?php
namespace Vendor\ReturnRequest\Plugin;

use Vendor\ReturnRequest\Model\ReturnStatusHistoryFactory;
use Magento\Backend\Model\Auth\Session as AdminSession;

class ReturnStatusHistoryPlugin
{
    /**
     * Dependency Initilization
     *
     * @param ReturnStatusHistoryFactory $historyFactory
     * @param AdminSession $adminSession
     */
    public function __construct(
        private ReturnStatusHistoryFactory $historyFactory,
        private AdminSession $adminSession
    ) {
    }

    /**
     * afterSave plugin
     *
     * @param \Vendor\ReturnRequest\Model\ReturnRequest $subject
     * @param \Vendor\ReturnRequest\Model\ReturnRequest $result
     * @return Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function afterSave(
        $subject,
        $result
    ) {
        $origData = $result->getOrigData();
        if (!$origData || !isset($origData['status'])) {
            return $result;
        }
        $oldStatus = $origData['status'];
        $newStatus = $result->getStatus();
        if ($oldStatus === $newStatus) {
            return $result;
        }
        $history = $this->historyFactory->create();
        $history->setData([
            'return_id' => $result->getId(),
            'old_status'        => $oldStatus,
            'new_status'        => $newStatus,
            'changed_by'        => $this->adminSession->getUser()
                ? $this->adminSession->getUser()->getId()
                : null
        ]);
        $history->save();
        return $result;
    }
}
