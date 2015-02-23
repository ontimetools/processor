<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\CustomField as CustomFieldEntity;

class CustomField extends HelperAbstract
{
    /**
     * @param  array                   $datas
     * @param  null                    $element
     * @return mixed|CustomFieldEntity
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $result = [];
        if (count($datas) > 0) {
            foreach ($datas as $id => $value) {
                $entity = $element instanceof CustomFieldEntity ? $element : new CustomFieldEntity();
                $entity->setId($id);
                $entity->setValue($value);
                $result[] = $entity;
            }
        }

        return $result;
    }
}
