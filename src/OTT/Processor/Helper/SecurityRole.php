<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\EntityAbstract;
use OTT\Processor\Entity\SecurityRole as SecurityRoleEntity;

/**
 * Class SecurityRole
 * @package OTT\Processor\Helper
 */
class SecurityRole extends HelperAbstract
{
    /**
     * @param  array                    $datas
     * @param  EntityAbstract           $element
     * @return mixed|SecurityRoleEntity
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $datas = parent::prepareData($datas);
        $entity = $element instanceof SecurityRoleEntity ? $element : new SecurityRoleEntity();
        $entity->setId($this->get($datas, 'id'));
        $entity->setName($this->get($datas, 'name'));

        return $entity;
    }
}
