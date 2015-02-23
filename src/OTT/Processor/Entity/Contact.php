<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\Contact as Helper;

class Contact extends PeopleAbstract
{
    /** @var string */
    protected $phone;
    /** @var bool */
    protected $can_login;
    /** @var string */
    protected $status;
    /** @var Customer */
    protected $customer;
    /** @var CustomField[] */
    protected $custom_fields = [];

    /**
     * @return boolean
     */
    public function isCanLogin()
    {
        return $this->can_login;
    }

    /**
     * @param boolean $can_login
     */
    public function setCanLogin($can_login)
    {
        $this->can_login = $can_login;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return CustomField[]
     */
    public function getCustomFields()
    {
        return $this->custom_fields;
    }

    /**
     * @param CustomField[] $custom_fields
     */
    public function setCustomFields($custom_fields)
    {
        if (!is_array($custom_fields) && $custom_fields instanceof CustomField) {
            $result[] = $custom_fields;
            $custom_fields = $result;
        }
        $this->custom_fields = $custom_fields;
    }

    /**
     * @param CustomField $custom_field
     */
    public function addCustomFields(CustomField $custom_field)
    {
        $this->custom_fields[] = $custom_field;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
