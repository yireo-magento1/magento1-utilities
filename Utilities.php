<?php
namespace Yireo\Magento;

/**
 * Class Utilities
 *
 * @package Yireo\Magento
 */
class Utilities
{
    /** @var Core */
    protected $core;

    /**
     * Utilities constructor.
     *
     * @param string $baseDir
     */
    public function __construct($baseDir = '')
    {
        $this->setCore(new Core($baseDir));
    }

    /**
     * @param $core
     */
    public function setCore($core)
    {
        $this->core = $core;
    }
}