<?php
namespace Yireo\Magento\Utilities;

class Email extends \Yireo\Magento\Utilities
{
    public function rename($oldEmailAddress, $newEmailAddress)
    {
        $resource = \Mage::getSingleton('core/resource');
        $db = $resource->getConnection('core_write');
        $salesFlatQuoteTable = $resource->getTableName('sales_flat_quote');
        $salesFlatOrderTable = $resource->getTableName('sales_flat_order');
        $followupTable = $resource->getTableName('followup_followup');

        $queries = array(
            'UPDATE '.$salesFlatQuoteTable.' SET `customer_email`="'.$newEmailAddress.'" WHERE `customer_email`= "'.$oldEmailAddress.'"',
            'UPDATE '.$salesFlatOrderTable.' SET `customer_email`="'.$newEmailAddress.'" WHERE `customer_email`= "'.$oldEmailAddress.'"',
            'UPDATE '.$followupTable.' SET `customer_email`="'.$newEmailAddress.'" WHERE `customer_email`= "'.$oldEmailAddress.'"',
        );


        foreach($queries as $query) {
            $db->query($query);
        }
    }
}