<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\Defect;
use OTT\Processor\Entity\EntityAbstract;
use OTT\Processor\Entity\Feature;
use OTT\Processor\Entity\Incident;
use OTT\Processor\Entity\ItemAbstract;
use OTT\Processor\Entity\ItemDuration;
use OTT\Processor\Entity\ItemDurationUnit;
use OTT\Processor\Entity\ItemOptionAbstract;
use OTT\Processor\Entity\ItemPriority;
use OTT\Processor\Entity\ItemSeverity;
use OTT\Processor\Entity\ItemStatus;
use OTT\Processor\Entity\ItemVote;
use OTT\Processor\Entity\ItemWorkflowStep;
use OTT\Processor\Entity\Task;

class Item extends HelperAbstract
{
    /**
     * Item types
     */
    const ITEMTYPE_DEFECTS = 'defects';
    const ITEMTYPE_FEATURES = 'features';
    const ITEMTYPE_INCIDENTS = 'incidents';
    const ITEMTYPE_TASKS = 'tasks';
    private static $item_types = [
        self::ITEMTYPE_DEFECTS,
        self::ITEMTYPE_FEATURES,
        self::ITEMTYPE_INCIDENTS,
        self::ITEMTYPE_TASKS,
    ];

    /**
     * @return array
     */
    public static function getItemTypes()
    {
        return self::$item_types;
    }

    /**
     * @param $type
     * @return null|Defect|Feature|Incident|Task
     */
    public static function instanciateItemType($type = null)
    {
        $result = null;
        if (in_array($type, self::getItemTypes())) {
            switch ($type) {
                case self::ITEMTYPE_DEFECTS:
                    $result = new Defect();
                    break;
                default:
                case self::ITEMTYPE_FEATURES:
                    $result = new Feature();
                    break;
                case self::ITEMTYPE_INCIDENTS:
                    $result = new Incident();
                    break;
                case self::ITEMTYPE_TASKS:
                    $result = new Task();
                    break;
            }
        }

        return $result;
    }

    /**
     * @param  array          $datas
     * @param  EntityAbstract $element
     * @return mixed|void
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $datas = parent::prepareData($datas);
        $entity = $element instanceof ItemAbstract ? $element : self::instanciateItemType(
            $this->get($datas, 'item_type')
        );
        $entity->setId($this->get($datas, 'id'));
        $entity->setNumber($this->get($datas, 'number'));
        $entity->setName($this->get($datas, 'name'));
        $entity->setDescription($this->get($datas, 'description'));
        $entity->setNotes($this->get($datas, 'notes'));
        $entity->setHasWorkLogs($this->get($datas, 'has_work_logs'));
        $entity->setHasAttachments($this->get($datas, 'has_attachments'));
        $entity->setHasNotifications($this->get($datas, 'has_notifications'));
        $entity->setHasRelatedItems($this->get($datas, 'has_related_items'));
        $entity->setHasEmails($this->get($datas, 'has_emails'));
        $entity->setHasCommits($this->get($datas, 'has_commits'));
        $entity->setHasZendeskTickets($this->get($datas, 'has_zendesk_tickets'));
        $entity->setIsRanked($this->get($datas, 'is_ranked'));
        $entity->setArchived($this->get($datas, 'archived'));
        $entity->setPubliclyViewable($this->get($datas, 'publicly_viewable'));
        $entity->setRank($this->get($datas, 'rank'));
        $entity->setItemType($this->get($datas, 'item_type'));
        $entity->setHasNotifications($this->get($datas, 'has_notifications'));
        $entity->setSubitemType($this->get($datas, 'subitem_type'));
        $entity->setResolution($this->get($datas, 'resolution'));
        $entity->setPercentComplete($this->get($datas, 'percent_complete'));
        $entity->setBuildNumber($this->get($datas, 'build_number'));
        $entity->setBuildNumberOfFix($this->get($datas, 'build_number_of_fix'));
        $entity->setVote(isset($datas['vote']) ? self::voteFromApiToEntitySingle($datas['vote']) : null);
        if (isset($datas['parent'])) {
            $parent = self::instanciateItemType($this->get($datas, 'item_type'));
            $entity->setParent(self::fromApiToEntity($datas['parent'], $parent));
        }
        $entity->setCustomFields(
            isset($datas['custom_fields']) ? CustomField::fromApiToEntity($datas['custom_fields']) : null
        );
        $entity->setReplicationProcedures(
            $this->get($datas, 'replication_procedures')
        );
        // Dates
        $entity->setReportedDate(
            isset($datas['reported_date']) && null !== $datas['reported_date'] ?
            new \DateTime($datas['reported_date']) : null
        );
        $entity->setCompletionDate(
            isset($datas['completion_date']) && null !== $datas['completion_date'] ?
            new \DateTime($datas['completion_date']) : null
        );
        $entity->setCreatedDateTime(
            isset($datas['created_date_time']) && null !== $datas['created_date_time'] ?
            new \DateTime($datas['created_date_time']) : null
        );
        $entity->setLastUpdatedDateTime(
            isset($datas['last_updated_date_time']) && null !== $datas['last_updated_date_time'] ?
            new \DateTime($datas['last_updated_date_time']) : null
        );
        $entity->setDueDate(
            isset($datas['due_date']) && null !== $datas['due_date'] ? new \DateTime($datas['due_date']) : null
        );
        // Subitems
        if (isset($datas['subitems'])) {
            if (isset($datas['subitems']['count']) && $datas['subitems']['count'] > 0) {
            }
        }
        // Project
        $entity->setProject(
            isset($datas['project']) ? Project::fromApiToEntity($datas['project']) : null
        );
        $entity->setParentProject(
            isset($datas['project_parent']) ? Project::fromApiToEntity($datas['project_parent']) : null
        );
        // Release
        $entity->setRelease(
            isset($datas['release']) ? Release::fromApiToEntity($datas['release']) : null
        );
        // Durations
        $entity->setRemainingDuration(
            isset($datas['remaining_duration']) ?
            self::durationFromApiToEntitySingle($datas['remaining_duration']) : null
        );
        $entity->setActualDuration(
            isset($datas['actual_duration']) ?
            self::durationFromApiToEntitySingle($datas['actual_duration']) : null
        );
        $entity->setEstimatedDuration(
            isset($datas['estimated_duration']) ?
            self::durationFromApiToEntitySingle($datas['estimated_duration']) : null
        );
        // User, contacts and customer
        $entity->setReportedBy(isset($datas['reported_by']) ? User::fromApiToEntity($datas['reported_by']) : null);
        $entity->setCreatedBy(isset($datas['created_by']) ? User::fromApiToEntity($datas['created_by']) : null);
        $entity->setLastUpdatedBy(
            isset($datas['last_updated_by']) ? User::fromApiToEntity($datas['last_updated_by']) : null
        );
        if (isset($datas['assigned_to']) && $datas['assigned_to']['type']) {
            $assignedTo = PeopleAbstract::instanciatePeopleType($datas['assigned_to']['type']);
            $entity->setCreatedBy($assignedTo->getHelper()->fromApiToEntity($datas['assigned_to']));
        }
        $entity->setReportedByCustomerContact(
            isset($datas['reported_by_customer_contact']) ?
            Contact::fromApiToEntity($datas['reported_by_customer_contact']) : null
        );
        $entity->setCustomer(isset($datas['customer']) ? Customer::fromApiToEntity($datas['customer']) : null);
        // Item options type
        $entity->setPriority(
            isset($datas['priority']) ? self::priorityFromApiToEntitySingle($datas['priority']) : null
        );
        $entity->setStatus(
            isset($datas['status']) ? self::statusFromApiToEntitySingle($datas['status']) : null
        );
        $entity->setSeverity(
            isset($datas['severity']) ? self::severityFromApiToEntitySingle($datas['severity']) : null
        );
        $entity->setWorkflowStep(
            isset($datas['workflow_step']) ? self::workflowStepFromApiToEntitySingle($datas['workflow_step']) : null
        );

        return $entity;
    }

    /**
     * @param  array        $datas
     * @return ItemDuration
     */
    public static function durationFromApiToEntitySingle(array $datas)
    {
        $entity = new ItemDuration();
        $entity->setDurationText(isset($datas['duration_text']) ? $datas['duration_text'] : null);
        $entity->setAbbreviation(isset($datas['abbreviation']) ? $datas['abbreviation'] : null);
        $entity->setDurationMinutes(isset($datas['duration_minutes']) ? $datas['duration_minutes'] : null);
        $entity->setAggregateDurationMinutes(
            isset($datas['aggregate_duration_minutes']) ? $datas['aggregate_duration_minutes'] : null
        );
        $entity->setValue(isset($datas['value']) ? $datas['value'] : null);
        $entity->setTimeUnit(
            isset($datas['time_unit']) ? self::durationUnitFromApiToEntitySingle($datas['time_unit']) : null
        );

        return $entity;
    }

    /**
     * @param  array    $datas
     * @return ItemVote
     */
    public static function voteFromApiToEntitySingle(array $datas)
    {
        $entity = new ItemVote();
        $entity->setCount(isset($datas['count']) ? $datas['count'] : null);
        $entity->setAverage(isset($datas['average']) ? $datas['average'] : null);

        return $entity;
    }

    /**
     * @param  array            $datas
     * @return ItemDurationUnit
     */
    public static function durationUnitFromApiToEntitySingle(array $datas)
    {
        $entity = new ItemDurationUnit();
        $entity->setId(isset($datas['id']) ? $datas['id'] : null);
        $entity->setName(isset($datas['name']) ? $datas['name'] : null);

        return $entity;
    }

    /**
     * @param  array        $datas
     * @return ItemSeverity
     */
    public static function severityFromApiToEntitySingle(array $datas)
    {
        return self::itemOptionFromApiToEntitySingle($datas, new ItemSeverity());
    }

    /**
     * @param  array            $datas
     * @return ItemWorkflowStep
     */
    public static function workflowStepFromApiToEntitySingle(array $datas)
    {
        return self::itemOptionFromApiToEntitySingle($datas, new ItemWorkflowStep());
    }

    /**
     * @param  array        $datas
     * @return ItemPriority
     */
    public static function priorityFromApiToEntitySingle(array $datas)
    {
        return self::itemOptionFromApiToEntitySingle($datas, new ItemPriority());
    }

    /**
     * @param  array      $datas
     * @return ItemStatus
     */
    public static function statusFromApiToEntitySingle(array $datas)
    {
        return self::itemOptionFromApiToEntitySingle($datas, new ItemStatus());
    }

    /**
     * @param  array              $datas
     * @param  ItemOptionAbstract $entity
     * @return ItemOptionAbstract
     */
    private static function itemOptionFromApiToEntitySingle(array $datas, ItemOptionAbstract &$entity)
    {
        $entity->setId(isset($datas['id']) ? $datas['id'] : null);
        $entity->setName(isset($datas['name']) ? $datas['name'] : null);
        $entity->setOrder(isset($datas['order']) ? $datas['order'] : null);

        return $entity;
    }
}
