<?php
declare(strict_types=1);

namespace Vendor\ReturnRequest\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /** XML config paths */
    public const XML_PATH_ENABLE = 'returnrequest/general/enable';
    public const XML_PATH_ALLOWED_TYPES = 'returnrequest/general/allowed_image_types';
    public const XML_PATH_RETURN_REASONS = 'returnrequest/general/return_reasons';
    public const XML_PATH_RETURN_STATUS_NEW = 'new';
    public const XML_PATH_RETURN_STATUS_APPROVED = 'approved';
    public const XML_PATH_RETURN_STATUS_REJECTED = 'rejected';

    /**
     * Dependency Initilization
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\Serialize\SerializerInterface $serializer
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        protected \Magento\Framework\Serialize\SerializerInterface $serializer
    ) {
        parent::__construct($context);
    }

    /**
     * Check if return request feature is enabled
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isEnabled(?int $storeId = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Get allowed image extensions from system configuration
     *
     * Handles both:
     * - multiselect (comma-separated string)
     * - array (safe fallback)
     *
     * @param int|null $storeId
     * @return array
     */
    public function getAllowedImageTypes(?int $storeId = null): array
    {
        $value = $this->scopeConfig->getValue(
            self::XML_PATH_ALLOWED_TYPES,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        if (is_array($value)) {
            return array_filter($value);
        }
        if (is_string($value) && $value !== '') {
            return array_map('trim', explode(',', $value));
        }
        return [];
    }

    /**
     * Get Return Reason Status
     *
     * Handles both:
     * - multiselect (comma-separated string)
     * - array (safe fallback)
     *
     * @param int|null $storeId
     * @return array
     */
    public function getReturnReasonStatus(): array
    {
        return [
            self::XML_PATH_RETURN_STATUS_NEW => __('New'),
            self::XML_PATH_RETURN_STATUS_APPROVED => __('Approved'),
            self::XML_PATH_RETURN_STATUS_REJECTED => __('Rejected')
        ];
    }

    /**
     * Get Return Reason List
     *
     * Handles both:
     * - multiselect (comma-separated string)
     * - array (safe fallback)
     *
     * @param int|null $storeId
     * @return array
     */
    public function getReturnReasonList(?int $storeId = null): array
    {
        $value = $this->scopeConfig->getValue(
            self::XML_PATH_RETURN_REASONS,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        $reasons = [];
        if (!empty($value)) {
            $value = $this->jsonDecode($value);
            foreach ($value as $reason) {
                $reasons[$reason['key']] = $reason['value'];
            }
        }
        return $reasons;
    }

    /**
     * Get accept attribute string for file input
     * Example: ".jpg,.jpeg,.png"
     *
     * @param int|null $storeId
     * @return string
     */
    public function getAllowedImageAccept(?int $storeId = null): string
    {
        $types = $this->getAllowedImageTypes($storeId);
        if (empty($types)) {
            return '';
        }
        return implode(',', array_map(static function ($type) {
            return '.' . strtolower($type);
        }, $types));
    }

    /**
     * Json Encode
     *
     * @param  array $arr
     * @return array
     */
    public function jsonEncode($arr = [])
    {
        return $this->serializer->serialize($arr);
    }

    /**
     * Json Decode
     *
     * @param string $str
     * @return array
     */
    public function jsonDecode($str)
    {
        return $this->serializer->unserialize($str);
    }
}
