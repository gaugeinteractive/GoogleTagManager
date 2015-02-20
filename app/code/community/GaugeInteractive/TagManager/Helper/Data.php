<?php
/**
 * GoogleTagManager data helper
 *
 * @category   GaugeInteractive
 * @package    GaugeInteractive_GoogleTagManager
 */
class GaugeInteractive_TagManager_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Config paths for using throughout the code
     */
    const XML_PATH_ACTIVE        = 'tagmanager/tagmanager/active';
    const XML_PATH_CONTAINER     = 'tagmanager/tagmanager/container';

    /**
     * Get Google Tag Manager container ID
     *
     * @param mixed $store
     * @return string The container ID
     */
    public function getContainerId($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_CONTAINER, $store);
    }

    /**
     * Whether Google Tag Manager is ready to use
     *
     * @param mixed $store
     * @return bool
     */
    public function isGoogleTagManagerAvailable($store = null)
    {
        return $this->getContainerId($store) && Mage::getStoreConfigFlag(self::XML_PATH_ACTIVE, $store);
    }
}
