<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\Attachment as Helper;

class Attachment extends EntityAbstract
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $file_name;
    /** @var string */
    protected $description;
    /** @var string */
    protected $file_data;
    /** @var \DateTime */
    protected $attach_date;
    /** @var string */
    protected $data_hash;

    /** @var ItemAbstract */
    protected $source;
    /** @var User */
    protected $created_by;

    /**
     * @return \DateTime
     */
    public function getAttachDate()
    {
        return $this->attach_date;
    }

    /**
     * @param \DateTime $attach_date
     */
    public function setAttachDate(\DateTime $attach_date)
    {
        $this->attach_date = $attach_date;
    }

    /**
     * @return User
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * @param User $created_by
     */
    public function setCreatedBy(User $created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * @return string
     */
    public function getDataHash()
    {
        return $this->data_hash;
    }

    /**
     * @param string $data_hash
     */
    public function setDataHash($data_hash)
    {
        $this->data_hash = $data_hash;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getFileData()
    {
        return $this->file_data;
    }

    /**
     * @param string $file_data
     */
    public function setFileData($file_data)
    {
        $this->file_data = $file_data;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param string $file_name
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
    }

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
     * @return ItemAbstract
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param ItemAbstract $source
     */
    public function setSource(ItemAbstract $source)
    {
        $this->source = $source;
    }

    /**
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
