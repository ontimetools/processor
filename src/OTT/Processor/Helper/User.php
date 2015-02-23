<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\EntityAbstract;
use OTT\Processor\Entity\User as UserEntity;

/**
 * Class User
 * @package OTT\Processor\Helper
 */
class User extends PeopleAbstract
{
    /**
     * @param  array            $datas
     * @param  EntityAbstract   $element
     * @return mixed|UserEntity
     */
    protected function fromApiToEntitySingle($datas = [], &$element = null)
    {
        $datas = parent::prepareData($datas);
        $entity = $element instanceof UserEntity ? $element : new UserEntity();
        $entity->setId($this->get($datas, 'id'));
        $entity->setFirstname($this->get($datas, 'first_name'));
        $entity->setLastname($this->get($datas, 'last_name'));
        $entity->setFullname($this->get($datas, 'full_name'));
        $entity->setEmail($this->get($datas, 'email'));
        $entity->setLoginId($this->get($datas, 'login_id'));
        $entity->setPassword($this->get($datas, 'password'));
        $entity->setCopySettingsUserId($this->get($datas, 'copy_settings_user_id'));
        $entity->setWindowsId($this->get($datas, 'windows_id'));
        $entity->setUseWindowsAuth($this->get($datas, 'use_windows_auth'));
        $entity->setBuiltInAccount($this->get($datas, 'built_in_account'));
        $entity->setAdmin($this->get($datas, 'is_admin'));
        $entity->setUseGravatar($this->get($datas, 'use_gravatar'));
        $entity->setActive($this->get($datas, 'is_active'));
        $entity->setLocked($this->get($datas, 'is_locked'));
        $entity->setFailedLogins($this->get($datas, 'failed_logins'));
        $entity->setUsingSampleData($this->get($datas, 'is_using_sample_data'));
        $entity->setUsedSampleData($this->get($datas, 'has_used_sample_data'));
        $entity->setTeams($this->get($datas, 'teams'));
        $entity->setSourceControlUserNames($this->get($datas, 'source_control_user_names'));
        $entity->setLastLoginDateTime(
            isset($datas['last_login_date_time']) && strlen($datas['last_login_date_time']) > 0 ?
            new \DateTime($datas['last_login_date_time']) : null
        );
        $entity->setCreatedDateTime(
            isset($datas['created_date_time']) && strlen($datas['created_date_time']) > 0 ?
            new \DateTime($datas['created_date_time']) : null
        );
        $entity->setLastUpdatedDateTime(
            isset($datas['last_updated_date_time']) && strlen($datas['last_updated_date_time']) > 0 ?
            new \DateTime($datas['last_updated_date_time']) : null
        );
        if (isset($datas['security_roles']) && $roles = $datas['security_roles']) {
            $entity->setSecurityRole(SecurityRole::fromApiToEntity($roles));
        }

        return $entity;
    }
}
