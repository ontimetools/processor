<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\Project as ProjectEntity;
use OTT\Processor\Entity\EntityAbstract;

/**
 * Class User
 * @package OTT\Processor\Helper
 */
class Project extends HelperAbstract
{
    /**
     * @param  array               $datas
     * @param  EntityAbstract      $element
     * @return mixed|ProjectEntity
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $datas = parent::prepareData($datas);
        $entity = $element instanceof ProjectEntity ? $element : new ProjectEntity();
        $entity->setId($this->get($datas, 'id'));
        $entity->setName($this->get($datas, 'name'));
        $entity->setIsActive($this->get($datas, 'is_active'));
        $entity->setDescription($this->get($datas, 'description'));
        $entity->setStartDate(
            isset($datas['start_date']) && null !== $datas['start_date'] ? new \DateTime($datas['start_date']) : null
        );
        $entity->setDueDate(
            isset($datas['due_date']) && null !== $datas['due_date'] ? new \DateTime($datas['due_date']) : null
        );
        if (isset($datas['parent'])) {
            $parent = $this->fromApiToEntitySingle($datas['parent']);
            $entity->setProjectParent($parent);
        }
        if (isset($datas['children'])) {
            foreach ($datas['children'] as $child) {
                $child = $this->fromApiToEntitySingle($child);
                $entity->addChild($child);
            }
        }

        return $entity;
    }
}
