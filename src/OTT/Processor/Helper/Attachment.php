<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\Attachment as AttachmentEntity;
use OTT\Processor\Entity\Contact;
use OTT\Processor\Entity\EntityAbstract;
use OTT\Processor\Entity\User;

/**
 * Class Attachment
 * @package OTT\Processor\Helper
 */
class Attachment extends HelperAbstract
{
    /**
     * @param  array                  $datas
     * @param  EntityAbstract         $element
     * @return mixed|AttachmentEntity
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $datas = isset($datas['data']) ? $datas['data'] : $datas;
        $entity = $element instanceof AttachmentEntity ? $element : new AttachmentEntity();
        $entity->setId($this->get($datas, 'id'));
        $entity->setFileName($this->get($datas, 'file_name'));
        $entity->setDescription($this->get($datas, 'description'));
        $entity->setFileData($this->get($datas, 'file_data'));
        $entity->setAttachDate($this->get($datas, 'attach_date'));
        $entity->setDataHash($this->get($datas, 'data_hash'));
        if (isset($datas['source']) && isset($datas['source']['source_type'])) {
            $sourceEntity = Item::instanciateItemType($datas['source']['source_type']);
            $entity->setSource(
                $sourceEntity->getHelper()->fromApiToEntity($datas['source'], $sourceEntity)
            );
        }
        if (isset($datas['created_by']) && isset($datas['created_by']['user_type'])) {
            /** @var User|Contact $authorEntity */
            $authorEntity = PeopleAbstract::instanciatePeopleType($datas['created_by']['user_type']);
            $entity->setCreatedBy(
                $authorEntity->getHelper()->fromApiToEntity($datas['created_by'], $authorEntity)
            );
        }

        return $entity;
    }
}
