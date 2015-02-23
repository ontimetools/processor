<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\Release as ReleaseEntity;
use OTT\Processor\Entity\EntityAbstract;
use OTT\Processor\Entity\ReleaseCapacity;
use OTT\Processor\Entity\ReleaseStatus;
use OTT\Processor\Entity\ReleaseType;

/**
 * Class User
 * @package OTT\Processor\Helper
 */
class Release extends HelperAbstract
{
    /** Types */
    const RELEASETYPE_PRODUCT = 1;
    const RELEASETYPE_VERSION = 2;
    const RELEASETYPE_SPRINT = 3;
    protected $release_types = [
        self::RELEASETYPE_PRODUCT,
        self::RELEASETYPE_VERSION,
        self::RELEASETYPE_SPRINT,
    ];
    /** Status */
    const RELEASESTATUS_PRODUCT_CANCELED = 1;
    const RELEASESTATUS_PRODUCT_INPROGRESS = 1;
    const RELEASESTATUS_PRODUCT_CONCEPT = 1;
    const RELEASESTATUS_VERSION_CANCELED = 4;
    const RELEASESTATUS_VERSION_DESIGN = 5;
    const RELEASESTATUS_VERSION_DEVELOPTEST = 6;
    const RELEASESTATUS_VERSION_PLANNING = 7;
    const RELEASESTATUS_VERSION_RELEASED = 8;
    const RELEASESTATUS_SPRINT_COMPLETED = 9;
    const RELEASESTATUS_SPRINT_INPROGRESS = 10;
    const RELEASESTATUS_SPRINT_PLANED = 11;
    protected $release_status = [
        self::RELEASESTATUS_PRODUCT_CANCELED,
        self::RELEASESTATUS_PRODUCT_INPROGRESS,
        self::RELEASESTATUS_PRODUCT_CONCEPT,
        self::RELEASESTATUS_VERSION_CANCELED,
        self::RELEASESTATUS_VERSION_DESIGN,
        self::RELEASESTATUS_VERSION_DEVELOPTEST,
        self::RELEASESTATUS_VERSION_PLANNING,
        self::RELEASESTATUS_VERSION_RELEASED,
        self::RELEASESTATUS_SPRINT_COMPLETED,
        self::RELEASESTATUS_SPRINT_INPROGRESS,
        self::RELEASESTATUS_SPRINT_PLANED,
    ];

    /**
     * @param  array               $datas
     * @param  EntityAbstract      $element
     * @return mixed|ReleaseEntity
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $datas = parent::prepareData($datas);
        $entity = $element instanceof ReleaseEntity ? $element : new ReleaseEntity();
        $entity->setId($this->get($datas, 'id'));
        $entity->setName($this->get($datas, 'name'));
        $entity->setCanModify($this->get($datas, 'can_modify'));
        $entity->setIsActive($this->get($datas, 'is_active'));
        $entity->setReleaseNotes($this->get($datas, 'release_notes'));
        $entity->setReleaseType(
            isset($datas['release_type']) ? self::typeFromApiToEntitySingle($datas['release_type']) : null
        );
        $entity->setStatus(
            isset($datas['status']) ? self::statusFromApiToEntitySingle($datas['status']) : null
        );
        if (isset($datas['capacity']) && $capacity = $datas['capacity']) {
            $capacityEntity = new ReleaseCapacity();
            $capacityEntity->setUnit(Item::durationUnitFromApiToEntitySingle($capacity['time_unit']));
            $capacityEntity->setDuration($capacity['duration']);
            $entity->setCapacity($capacity);
        }
        $entity->setStartDate(
            isset($datas['start_date']) && null !== $datas['start_date'] ? new \DateTime($datas['start_date']) : null
        );
        $entity->setDueDate(
            isset($datas['due_date']) && null !== $datas['due_date'] ? new \DateTime($datas['due_date']) : null
        );
        $entity->setVelocityDueDate(
            isset($datas['velocity_start_date']) && null !== $datas['velocity_start_date'] ?
                new \DateTime($datas['velocity_start_date']) : null
        );
        if (isset($datas['parent'])) {
            $parent = $this->fromApiToEntitySingle($datas['parent']);
            $entity->setParent($parent);
        }
        if (isset($datas['children'])) {
            foreach ($datas['children'] as $child) {
                $child = $this->fromApiToEntitySingle($child);
                $entity->addChild($child);
            }
        }

        return $entity;
    }

    /**
     * @param $datas
     * @return ReleaseStatus
     */
    public static function statusFromApiToEntitySingle($datas)
    {
        $instance = new self();
        $status = new ReleaseStatus();
        if (is_int($datas)) {
            $status->setId($datas);
        } elseif (is_array($datas)) {
            $status->setId($instance->get($datas, 'id'));
            $status->setName($instance->get($datas, 'name'));
        }

        return $status;
    }

    /**
     * @param $datas
     * @return ReleaseStatus
     */
    public static function typeFromApiToEntitySingle($datas)
    {
        $instance = new self();
        $type = new ReleaseType();
        if (is_int($datas)) {
            $type->setId($datas);
        } elseif (is_array($datas)) {
            $type->setId($instance->get($datas, 'id'));
            $type->setName($instance->get($datas, 'name'));
            $type->setLevel($instance->get($datas, 'level'));
        }

        return $type;
    }

    /**
     * @return array
     */
    public function getReleaseStatus()
    {
        return $this->release_status;
    }

    /**
     * @return array
     */
    public function getReleaseTypes()
    {
        return $this->release_types;
    }
}
