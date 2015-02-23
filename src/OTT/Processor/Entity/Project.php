<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\Project as Helper;

class Project extends EntityAbstract
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var string */
    protected $description;
    /** @var \DateTime */
    protected $start_date;
    /** @var \DateTime */
    protected $due_date;
    /** @var bool */
    protected $is_active;
    /** @var Project */
    protected $project_parent;
    /** @var Project[] */
    protected $children;

    /**
     * @return Project[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Project[] $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @param Project $child
     */
    public function addChild(Project $child)
    {
        $this->children[] = $child;
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
     * @return Project
     */
    public function getProjectParent()
    {
        return $this->project_parent;
    }

    /**
     * @param Project $project_parent
     */
    public function setProjectParent($project_parent)
    {
        $this->project_parent = $project_parent;
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
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
