<?php
/**
 * GoogleTagManager block
 *
 * @category   GaugeInteractive
 * @package    GaugeInteractive_GoogleTagManager
 */
class GaugeInteractive_GoogleTagManager_Block_Tm extends Mage_Core_Block_Template
{
    /**
     * Get Google Tag Manager container ID
     *
     * @return string The container ID
     */
    public function getContainerId()
    {
        return Mage::helper('googletagmanager')->getContainerId();
    }

    /**
     * Render Google Tag Manager container snippet
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!Mage::helper('googletagmanager')->isGoogleTagManagerAvailable()) {
            return '';
        }
        return parent::_toHtml();
    }
}
