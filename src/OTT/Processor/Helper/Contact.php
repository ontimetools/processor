<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\Contact as ContactEntity;
use OTT\Processor\Entity\EntityAbstract;

/**
 * Class User
 * @package OTT\Processor\Helper
 */
class Contact extends PeopleAbstract
{
    /**
     * @param  array               $datas
     * @param  EntityAbstract      $element
     * @return mixed|ContactEntity
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $datas = parent::prepareData($datas);
        $entity = $element instanceof ContactEntity ? $element : new ContactEntity();
        $entity->setId($this->get($datas, 'id'));
        $entity->setFirstname($this->get($datas, 'first_name'));
        $entity->setLastname($this->get($datas, 'last_name'));
        $entity->setEmail($this->get($datas, 'email'));
        $entity->setLoginId($this->get($datas, 'login_id'));
        $entity->setPassword($this->get($datas, 'password'));
        $entity->setPhone($this->get($datas, 'phone'));
        $entity->setCanLogin($this->get($datas, 'can_login'));
        $entity->setStatus($this->get($datas, 'status'));
        if (isset($datas['portal_security_role']) && $roles = $datas['portal_security_role']) {
            $entity->setSecurityRole(SecurityRole::fromApiToEntity($roles));
        }
        if (isset($datas['customer']) && $customer = $datas['customer']) {
            $entity->setCustomer(Customer::fromApiToEntity($customer));
        }
        if (isset($datas['custom_fields']) && $fields = $datas['custom_fields']) {
            $entity->setCustomFields(CustomField::fromApiToEntity($fields));
        }

        return $entity;
    }
}
