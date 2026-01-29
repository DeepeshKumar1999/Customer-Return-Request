<?php
/**
 * Malvic Software Private Limited
 *
 * Proprietary and Confidential
 *
 * This software is the exclusive property of Malvic Software Private Limited.
 * Unauthorized copying, modification, distribution, or use of this software,
 * via any medium, is strictly prohibited.
 *
 * This software is intended for use only by Malvic Software Private Limited
 * for its own commercial and internal purposes.
 *
 * © Malvic Software Private Limited. All rights reserved.
 *
 * @author    Malvic Software Private Limited
 * @copyright © Malvic Software Private Limited
 * @license   Proprietary – All Rights Reserved
 */
namespace Malvic\ReturnRequest\Observer;

use \Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;
use \Magento\Framework\Mail\Template\TransportBuilder;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\App\Area;
use \Magento\Framework\Translate\Inline\StateInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Store\Model\ScopeInterface;

class SendNewReturnRequestEmail implements ObserverInterface
{
    /**
     * Depedency Initilization
     *
     * @param TransportBuilder $transportBuilder
     * @param StoreManagerInterface $storeManager
     * @param StateInterface $inlineTranslation
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        protected TransportBuilder $transportBuilder,
        protected StoreManagerInterface $storeManager,
        protected StateInterface $inlineTranslation,
        protected ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * Execute
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $returnRequest = $observer->getData('return_request');
        if (!$returnRequest || !$returnRequest->getId()) {
            return;
        }
        try {
            if ($returnRequest->getStatus() == 'new') {
                $this->inlineTranslation->suspend();
                $store = $this->storeManager->getStore();
                $storeId = $this->storeManager->getStore()->getId();
                /** Get sales email identity code */
                $identityCode = $this->scopeConfig->getValue(
                    'sales_email/order/identity',
                    ScopeInterface::SCOPE_STORE,
                    $storeId
                );
                /** Resolve email & name */
                $adminEmail = $this->scopeConfig->getValue(
                    "trans_email/ident_{$identityCode}/email",
                    ScopeInterface::SCOPE_STORE,
                    $storeId
                );
                $adminName = $this->scopeConfig->getValue(
                    "trans_email/ident_{$identityCode}/name",
                    ScopeInterface::SCOPE_STORE,
                    $storeId
                );
                $transport = $this->transportBuilder
                    ->setTemplateIdentifier('returnrequest_new_email_template')
                    ->setTemplateOptions([
                        'area'  => Area::AREA_ADMINHTML,
                        'store' => $store->getId()
                    ])
                    ->setTemplateVars([
                        'return_id' => $returnRequest->getReturnId(),
                        'order_id'  => $returnRequest->getOrderId(),
                        'status'    => $returnRequest->getStatus(),
                        'created_at'=> $returnRequest->getCreatedAt()
                    ])
                    ->setFromByScope('general')
                    ->addTo($adminEmail, $adminName) // or dynamic email
                    ->getTransport();
                $transport->sendMessage();
            }
        } catch (\Exception $e) {
            $storeId = $this->storeManager->getStore()->getId();
        } finally {
            $this->inlineTranslation->resume();
        }
    }
}
