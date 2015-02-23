<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\Item as Helper;

abstract class ItemAbstract extends EntityAbstract
{
    /** @var Customer */
    protected $customer;
    /** @var Contact */
    protected $reported_by_customer_contact;
    /** @var User|Contact */
    protected $created_by;
    /** @var User|Contact */
    protected $assigned_to;
    /** @var User */
    protected $reported_by;
    /** @var User */
    protected $last_updated_by;
    /** @var ItemDuration */
    protected $remaining_duration;
    /** @var ItemDuration */
    protected $actual_duration;
    /** @var ItemDuration */
    protected $estimated_duration;
    /** @var bool */
    protected $has_work_logs;
    /** @var bool */
    protected $has_attachments;
    /** @var Release */
    protected $release;
    /** @var ItemWorkflowStep */
    protected $workflow_step;
    /** @var ItemPriority */
    protected $priority;
    /** @var ItemStatus */
    protected $status;
    /** @var ItemSeverity */
    protected $severity;
    /** @var bool */
    protected $has_notifications;
    /** @var bool */
    protected $has_related_items;
    /** @var bool */
    protected $has_emails;
    /** @var bool */
    protected $has_commits;
    /** @var bool */
    protected $has_zendesk_tickets;
    /** @var ItemVote */
    protected $vote;
    /** @var Project */
    protected $project;
    /** @var Project */
    protected $parent_project;
    /** @var bool */
    protected $is_ranked;
    /** @var int */
    protected $rank;
    /** @var int */
    protected $id;
    /** @var int */
    protected $number;
    /** @var string */
    protected $item_type;
    /** @var static */
    protected $parent;
    /** @var string */
    protected $replication_procedures;
    /** @var string */
    protected $resolution;
    /** @var string */
    protected $build_number;
    /** @var string */
    protected $build_number_of_fix;
    /** @var string */
    protected $name;
    /** @var bool */
    protected $archived;
    /** @var string */
    protected $created_by_email_address;
    /** @var bool */
    protected $publicly_viewable;
    /** @var float */
    protected $percent_complete;
    /** @var string */
    protected $description;
    /** @var string */
    protected $notes;
    /** @var CustomField[] */
    protected $custom_fields;
    /** @var \DateTime */
    protected $reported_date;
    /** @var \DateTime */
    protected $completion_date;
    /** @var \DateTime */
    protected $due_date;
    /** @var \DateTime */
    protected $created_date_time;
    /** @var \DateTime */
    protected $last_updated_date_time;
    /** @var static[] */
    protected $subitems;
    /** @var string */
    protected $subitem_type;

    /**
     * @return ItemDuration
     */
    public function getActualDuration()
    {
        return $this->actual_duration;
    }

    /**
     * @param ItemDuration $actual_duration
     */
    public function setActualDuration($actual_duration)
    {
        $this->actual_duration = $actual_duration;
    }

    /**
     * @return boolean
     */
    public function isArchived()
    {
        return $this->archived;
    }

    /**
     * @param boolean $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    /**
     * @return Contact|User
     */
    public function getAssignedTo()
    {
        return $this->assigned_to;
    }

    /**
     * @param Contact|User $assigned_to
     */
    public function setAssignedTo($assigned_to)
    {
        $this->assigned_to = $assigned_to;
    }

    /**
     * @return string
     */
    public function getBuildNumber()
    {
        return $this->build_number;
    }

    /**
     * @param string $build_number
     */
    public function setBuildNumber($build_number)
    {
        $this->build_number = $build_number;
    }

    /**
     * @return string
     */
    public function getBuildNumberOfFix()
    {
        return $this->build_number_of_fix;
    }

    /**
     * @param string $build_number_of_fix
     */
    public function setBuildNumberOfFix($build_number_of_fix)
    {
        $this->build_number_of_fix = $build_number_of_fix;
    }

    /**
     * @return \DateTime
     */
    public function getCompletionDate()
    {
        return $this->completion_date;
    }

    /**
     * @param \DateTime $completion_date
     */
    public function setCompletionDate($completion_date)
    {
        $this->completion_date = $completion_date;
    }

    /**
     * @return Contact|User
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * @param Contact|User $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * @return string
     */
    public function getCreatedByEmailAddress()
    {
        return $this->created_by_email_address;
    }

    /**
     * @param string $created_by_email_address
     */
    public function setCreatedByEmailAddress($created_by_email_address)
    {
        $this->created_by_email_address = $created_by_email_address;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDateTime()
    {
        return $this->created_date_time;
    }

    /**
     * @param \DateTime $created_date_time
     */
    public function setCreatedDateTime($created_date_time)
    {
        $this->created_date_time = $created_date_time;
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
        $this->custom_fields = $custom_fields;
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
     * @return ItemDuration
     */
    public function getEstimatedDuration()
    {
        return $this->estimated_duration;
    }

    /**
     * @param ItemDuration $estimated_duration
     */
    public function setEstimatedDuration($estimated_duration)
    {
        $this->estimated_duration = $estimated_duration;
    }

    /**
     * @return boolean
     */
    public function isHasAttachments()
    {
        return $this->has_attachments;
    }

    /**
     * @param boolean $has_attachments
     */
    public function setHasAttachments($has_attachments)
    {
        $this->has_attachments = $has_attachments;
    }

    /**
     * @return boolean
     */
    public function isHasCommits()
    {
        return $this->has_commits;
    }

    /**
     * @param boolean $has_commits
     */
    public function setHasCommits($has_commits)
    {
        $this->has_commits = $has_commits;
    }

    /**
     * @return boolean
     */
    public function isHasEmails()
    {
        return $this->has_emails;
    }

    /**
     * @param boolean $has_emails
     */
    public function setHasEmails($has_emails)
    {
        $this->has_emails = $has_emails;
    }

    /**
     * @return boolean
     */
    public function isHasNotifications()
    {
        return $this->has_notifications;
    }

    /**
     * @param boolean $has_notifications
     */
    public function setHasNotifications($has_notifications)
    {
        $this->has_notifications = $has_notifications;
    }

    /**
     * @return boolean
     */
    public function isHasRelatedItems()
    {
        return $this->has_related_items;
    }

    /**
     * @param boolean $has_related_items
     */
    public function setHasRelatedItems($has_related_items)
    {
        $this->has_related_items = $has_related_items;
    }

    /**
     * @return boolean
     */
    public function isHasWorkLogs()
    {
        return $this->has_work_logs;
    }

    /**
     * @param boolean $has_work_logs
     */
    public function setHasWorkLogs($has_work_logs)
    {
        $this->has_work_logs = $has_work_logs;
    }

    /**
     * @return boolean
     */
    public function isHasZendeskTickets()
    {
        return $this->has_zendesk_tickets;
    }

    /**
     * @param boolean $has_zendesk_tickets
     */
    public function setHasZendeskTickets($has_zendesk_tickets)
    {
        $this->has_zendesk_tickets = $has_zendesk_tickets;
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
    public function isIsRanked()
    {
        return $this->is_ranked;
    }

    /**
     * @param boolean $is_ranked
     */
    public function setIsRanked($is_ranked)
    {
        $this->is_ranked = $is_ranked;
    }

    /**
     * @return string
     */
    public function getItemType()
    {
        return $this->item_type;
    }

    /**
     * @param string $item_type
     */
    public function setItemType($item_type)
    {
        $this->item_type = $item_type;
    }

    /**
     * @return Contact|User
     */
    public function getLastUpdatedBy()
    {
        return $this->last_updated_by;
    }

    /**
     * @param Contact|User $last_updated_by
     */
    public function setLastUpdatedBy($last_updated_by)
    {
        $this->last_updated_by = $last_updated_by;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdatedDateTime()
    {
        return $this->last_updated_date_time;
    }

    /**
     * @param \DateTime $last_updated_date_time
     */
    public function setLastUpdatedDateTime($last_updated_date_time)
    {
        $this->last_updated_date_time = $last_updated_date_time;
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
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return static
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param static $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return Project
     */
    public function getParentProject()
    {
        return $this->parent_project;
    }

    /**
     * @param Project $parent_project
     */
    public function setParentProject($parent_project)
    {
        $this->parent_project = $parent_project;
    }

    /**
     * @return float
     */
    public function getPercentComplete()
    {
        return $this->percent_complete;
    }

    /**
     * @param float $percent_complete
     */
    public function setPercentComplete($percent_complete)
    {
        $this->percent_complete = $percent_complete;
    }

    /**
     * @return ItemPriority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param ItemPriority $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @return boolean
     */
    public function isPubliclyViewable()
    {
        return $this->publicly_viewable;
    }

    /**
     * @param boolean $publicly_viewable
     */
    public function setPubliclyViewable($publicly_viewable)
    {
        $this->publicly_viewable = $publicly_viewable;
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return Release
     */
    public function getRelease()
    {
        return $this->release;
    }

    /**
     * @param Release $release
     */
    public function setRelease($release)
    {
        $this->release = $release;
    }

    /**
     * @return ItemDuration
     */
    public function getRemainingDuration()
    {
        return $this->remaining_duration;
    }

    /**
     * @param ItemDuration $remaining_duration
     */
    public function setRemainingDuration($remaining_duration)
    {
        $this->remaining_duration = $remaining_duration;
    }

    /**
     * @return string
     */
    public function getReplicationProcedures()
    {
        return $this->replication_procedures;
    }

    /**
     * @param string $replication_procedures
     */
    public function setReplicationProcedures($replication_procedures)
    {
        $this->replication_procedures = $replication_procedures;
    }

    /**
     * @return User
     */
    public function getReportedBy()
    {
        return $this->reported_by;
    }

    /**
     * @param User $reported_by
     */
    public function setReportedBy($reported_by)
    {
        $this->reported_by = $reported_by;
    }

    /**
     * @return Contact
     */
    public function getReportedByCustomerContact()
    {
        return $this->reported_by_customer_contact;
    }

    /**
     * @param Contact $reported_by_customer_contact
     */
    public function setReportedByCustomerContact($reported_by_customer_contact)
    {
        $this->reported_by_customer_contact = $reported_by_customer_contact;
    }

    /**
     * @return \DateTime
     */
    public function getReportedDate()
    {
        return $this->reported_date;
    }

    /**
     * @param \DateTime $reported_date
     */
    public function setReportedDate($reported_date)
    {
        $this->reported_date = $reported_date;
    }

    /**
     * @return string
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * @param string $resolution
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
    }

    /**
     * @return ItemSeverity
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * @param ItemSeverity $severity
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;
    }

    /**
     * @return ItemStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param ItemStatus $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getSubitemType()
    {
        return $this->subitem_type;
    }

    /**
     * @param string $subitem_type
     */
    public function setSubitemType($subitem_type)
    {
        $this->subitem_type = $subitem_type;
    }

    /**
     * @return static[]
     */
    public function getSubitems()
    {
        return $this->subitems;
    }

    /**
     * @param static[] $subitems
     */
    public function setSubitems($subitems)
    {
        $this->subitems = $subitems;
    }

    /**
     * @return ItemVote
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * @param ItemVote $vote
     */
    public function setVote($vote)
    {
        $this->vote = $vote;
    }

    /**
     * @return ItemWorkflowStep
     */
    public function getWorkflowStep()
    {
        return $this->workflow_step;
    }

    /**
     * @param ItemWorkflowStep $workflow_step
     */
    public function setWorkflowStep($workflow_step)
    {
        $this->workflow_step = $workflow_step;
    }

    /**
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
