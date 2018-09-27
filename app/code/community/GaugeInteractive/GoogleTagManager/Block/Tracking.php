<?php
/**
 * GoogleTagManager block
 *
 * @category   GaugeInteractive
 * @package    GaugeInteractive_GoogleTagManager
 */
class GaugeInteractive_GoogleTagManager_Block_Tracking extends Mage_Checkout_Block_Onepage_Success
{
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

    /**
     * Render information about specified orders and their items
     *
     * @return string
     */
    public function getOrdersTracking()
    {

        $orderId = $this->getOrderId();
        $order = Mage::getModel('sales/order')->load(Mage::getSingleton('checkout/session')->getLastOrderId());

        $js_items = array();
        foreach ($order->getAllVisibleItems() as $item) {
            $js_items[] = sprintf("{
                'sku': '%s',
                'name': '%s',
                'category': '%s',
                'price': '%s',
                'quantity': '%s'
                }",
                $this->jsQuoteEscape($item->getSku()),
                $this->jsQuoteEscape($item->getName()),
                null, // Optional
                $item->getBasePrice(),
                $item->getQtyOrdered()
            );
        }

        $result = sprintf("dataLayer.push({
            'transactionId': '%s',
            'transactionAffiliation': '%s',
            'transactionTotal': '%s',
            'transactionTax': '%s',
            'transactionShipping': '%s',
            'transactionProducts': [%s]
            });",
            $orderId,
            $this->jsQuoteEscape(Mage::app()->getStore()->getFrontendName()),
            $order->getBaseGrandTotal(),
            $order->getBaseTaxAmount(),
            $order->getBaseShippingAmount(),
            implode(", ", $js_items)
        );

        return $result;

    }
}
