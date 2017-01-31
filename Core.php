<?php
namespace Yireo\Magento;

use InvalidArgumentException;

class Core
{
    public function __construct($baseDir, $initAdmin = true)
    {
        if (!is_file($baseDir . '/app/Mage.php')) {
            throw new InvalidArgumentException('Not a valid Magento base directory: '.$baseDir);
        }

        require_once $baseDir . '/app/Mage.php';
        \Mage::app();

        if ($initAdmin) {
            \Mage::app()->setCurrentStore(\Mage_Core_Model_App::ADMIN_STORE_ID);
        }
    }
}