<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\Customer as CustomerEntity;
use OTT\Processor\Entity\EntityAbstract;

/**
 * Class User
 * @package OTT\Processor\Helper
 */
class Customer extends PeopleAbstract
{
    /**
     * @param  array                $datas
     * @param  EntityAbstract       $element
     * @return mixed|CustomerEntity
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $datas = parent::prepareData($datas);
        $entity = $element instanceof CustomerEntity ? $element : new CustomerEntity();
        $entity->setId($this->get($datas, 'id'));
        $entity->setCompanyName($this->get($datas, 'company_name'));
        $entity->setCompanyUrl($this->get($datas, 'company_url'));
        $entity->setContactsCount($this->get($datas, 'contacts_count'));
        $entity->setNewContactsCount($this->get($datas, 'new_contacts_count'));
        $entity->setRejectedContactsCount($this->get($datas, 'rejected_contacts_count'));
        $entity->setApprovedContactsCount($this->get($datas, 'approved_contacts_count'));

        return $entity;
    }
}
