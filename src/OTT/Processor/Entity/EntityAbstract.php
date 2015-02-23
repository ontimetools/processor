<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\HelperAbstract;

abstract class EntityAbstract
{
    /**
     * @return HelperAbstract
     */
    abstract public function getHelper();
}
