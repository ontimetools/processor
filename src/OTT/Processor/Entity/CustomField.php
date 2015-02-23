<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\CustomField as Helper;

class CustomField extends EntityAbstract
{
    /** @var string */
    protected $id;
    /** @var mixed */
    protected $value;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
