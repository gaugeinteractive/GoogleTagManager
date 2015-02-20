<?php
class GaugeInteractive_TagManager_Block_TagManager extends Mage_Core_Block_Template
{
    /**
     * Get Google Tag Manager container ID
     *
     * @return string The container ID
     */
    public function getContainerId()
    {
        return Mage::helper('tagmanager')->getContainerId();
    }

    /**
     * Render Google Tag Manager container snippet
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!Mage::helper('tagmanager')->isGoogleTagManagerAvailable()) {
            return '';
        }
        return parent::_toHtml();
    }
}
