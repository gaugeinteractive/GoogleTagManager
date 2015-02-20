<?php
class GaugeInteractive_TagManager_Model_Enabled
{
    public function toOptionArray()
    {
        return array(
            array('value'=>0, 'label'=>Mage::helper('tagmanager')->__('Disabled')),
            array('value'=>1, 'label'=>Mage::helper('tagmanager')->__('Enabled')),                    
        );
    }

}
