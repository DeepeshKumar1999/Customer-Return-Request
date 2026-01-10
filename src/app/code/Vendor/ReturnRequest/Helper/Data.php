<?php
declare(strict_types=1);

namespace Vendor\ReturnRequest\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /** XML config paths */
    public const XML_PATH_ALLOWED_TYPES = 'returnrequest/general/allowed_image_types';
    public const XML_PATH_MAX_IMAGE_SIZE = 'returnrequest/general/max_image_size';
    public const XML_PATH_ENABLE = 'returnrequest/general/enable';

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
     * Get max image size in MB
     *
     * @param int|null $storeId
     * @return int
     */
    public function getMaxImageSize(?int $storeId = null): int
    {
        return (int)$this->scopeConfig->getValue(
            self::XML_PATH_MAX_IMAGE_SIZE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
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
}
