<?php


namespace OTT\Processor\Entity;

use OTT\Processor\Helper\SecurityRole as Helper;

class SecurityRole extends EntityAbstract
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
