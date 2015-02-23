<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\Customer as Helper;

class Customer extends EntityAbstract
{
    /** @var string */
    protected $id;
    /** @var string */
    protected $company_name;
    /** @var string */
    protected $company_url;
    /** @var int */
    protected $rejected_contacts_count;
    /** @var int */
    protected $contacts_count;
    /** @var int */
    protected $new_contacts_count;
    /** @var int */
    protected $approved_contacts_count;

    /**
     * @return int
     */
    public function getApprovedContactsCount()
    {
        return $this->approved_contacts_count;
    }

    /**
     * @param int $approved_contacts_count
     */
    public function setApprovedContactsCount($approved_contacts_count)
    {
        $this->approved_contacts_count = $approved_contacts_count;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param string $company_name
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }

    /**
     * @return string
     */
    public function getCompanyUrl()
    {
        return $this->company_url;
    }

    /**
     * @param string $company_url
     */
    public function setCompanyUrl($company_url)
    {
        $this->company_url = $company_url;
    }

    /**
     * @return int
     */
    public function getContactsCount()
    {
        return $this->contacts_count;
    }

    /**
     * @param int $contacts_count
     */
    public function setContactsCount($contacts_count)
    {
        $this->contacts_count = $contacts_count;
    }

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
     * @return int
     */
    public function getNewContactsCount()
    {
        return $this->new_contacts_count;
    }

    /**
     * @param int $new_contacts_count
     */
    public function setNewContactsCount($new_contacts_count)
    {
        $this->new_contacts_count = $new_contacts_count;
    }

    /**
     * @return int
     */
    public function getRejectedContactsCount()
    {
        return $this->rejected_contacts_count;
    }

    /**
     * @param int $rejected_contacts_count
     */
    public function setRejectedContactsCount($rejected_contacts_count)
    {
        $this->rejected_contacts_count = $rejected_contacts_count;
    }

    /**
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
