<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\Release as Helper;

class Release extends EntityAbstract
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var string */
    protected $release_notes;
    /** @var bool */
    protected $is_active;
    /** @var bool */
    protected $can_modify;
    /** @var \DateTime */
    protected $start_date;
    /** @var \DateTime */
    protected $due_date;
    /** @var \DateTime */
    protected $velocity_due_date;
    /** @var ReleaseCapacity */
    protected $capacity;
    /** @var ReleaseStatus */
    protected $status;
    /** @var ReleaseType */
    protected $release_type;
    /** @var Release */
    protected $parent;
    /** @var Release[] */
    protected $children;

    /**
     * @return boolean
     */
    public function isCanModify()
    {
        return $this->can_modify;
    }

    /**
     * @param boolean $can_modify
     */
    public function setCanModify($can_modify)
    {
        $this->can_modify = $can_modify;
    }

    /**
     * @return ReleaseCapacity
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param ReleaseCapacity $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return Release[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Release[] $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @param Release $child
     */
    public function addChild(Release $child)
    {
        $this->children[] = $child;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param \DateTime $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
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
     * @return boolean
     */
    public function isIsActive()
    {
        return $this->is_active;
    }

    /**
     * @param boolean $is_active
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
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
     * @return Release
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Release $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return string
     */
    public function getReleaseNotes()
    {
        return $this->release_notes;
    }

    /**
     * @param string $release_notes
     */
    public function setReleaseNotes($release_notes)
    {
        $this->release_notes = $release_notes;
    }

    /**
     * @return ReleaseType
     */
    public function getReleaseType()
    {
        return $this->release_type;
    }

    /**
     * @param $release_type
     */
    public function setReleaseType($release_type)
    {
        $this->release_type = $release_type;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param \DateTime $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * @return ReleaseStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getVelocityDueDate()
    {
        return $this->velocity_due_date;
    }

    /**
     * @param \DateTime $velocity_due_date
     */
    public function setVelocityDueDate($velocity_due_date)
    {
        $this->velocity_due_date = $velocity_due_date;
    }

    /**
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
