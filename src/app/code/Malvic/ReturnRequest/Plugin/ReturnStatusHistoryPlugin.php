<?php
/**
 * Malvic Software Private Limited
 *
 * @author    Malvic Software Private Limited
 * @copyright Malvic Software Private Limited
 * @license   Malvic Software Private Limited
 */
namespace Malvic\ReturnRequest\Plugin;

use Malvic\ReturnRequest\Model\ReturnStatusHistoryFactory;
use \Magento\Backend\Model\Auth\Session as AdminSession;

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
     * After Save plugin
     *
     * @param \Malvic\ReturnRequest\Model\ReturnRequest $subject
     * @param \Malvic\ReturnRequest\Model\ReturnRequest $result
     * @return \Malvic\ReturnRequest\Model\ReturnRequest
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
