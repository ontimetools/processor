<?php
namespace OTT\Processor\Entity;

use OTT\Processor\Helper\User as Helper;

class User extends PeopleAbstract
{
    /** @var string */
    protected $fullname;
    /** @var string */
    protected $windows_id;
    /** @var \DateTime */
    protected $last_login_date_time;
    /** @var \DateTime */
    protected $created_date_time;
    /** @var \DateTime */
    protected $last_updated_date_time;
    /** @var int */
    protected $failed_logins;
    /** @var int */
    protected $copy_settings_user_id;
    /** @var bool */
    protected $use_windows_auth;
    /** @var bool */
    protected $built_in_account;
    /** @var bool */
    protected $active;
    /** @var bool */
    protected $locked;
    /** @var bool */
    protected $admin;
    /** @var bool */
    protected $using_sample_data;
    /** @var bool */
    protected $used_sample_data;
    /** @var bool */
    protected $use_gravatar;
    /** @var array */
    protected $teams;
    /** @var array */
    protected $source_control_user_names;

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * @param boolean $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
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
     * @return boolean
     */
    public function isBuiltInAccount()
    {
        return $this->built_in_account;
    }

    /**
     * @param boolean $built_in_account
     */
    public function setBuiltInAccount($built_in_account)
    {
        $this->built_in_account = $built_in_account;
    }

    /**
     * @return int
     */
    public function getCopySettingsUserId()
    {
        return $this->copy_settings_user_id;
    }

    /**
     * @param int $copy_settings_user_id
     */
    public function setCopySettingsUserId($copy_settings_user_id)
    {
        $this->copy_settings_user_id = $copy_settings_user_id;
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
     * @return int
     */
    public function getFailedLogins()
    {
        return $this->failed_logins;
    }

    /**
     * @param int $failed_logins
     */
    public function setFailedLogins($failed_logins)
    {
        $this->failed_logins = $failed_logins;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return \DateTime
     */
    public function getLastLoginDateTime()
    {
        return $this->last_login_date_time;
    }

    /**
     * @param \DateTime $last_login_date_time
     */
    public function setLastLoginDateTime($last_login_date_time)
    {
        $this->last_login_date_time = $last_login_date_time;
    }

    /**
     * @return boolean
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @param boolean $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * @return string
     */
    public function getLoginId()
    {
        return $this->login_id;
    }

    /**
     * @param string $login_id
     */
    public function setLoginId($login_id)
    {
        $this->login_id = $login_id;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getSourceControlUserNames()
    {
        return $this->source_control_user_names;
    }

    /**
     * @param array $source_control_user_names
     */
    public function setSourceControlUserNames($source_control_user_names)
    {
        $this->source_control_user_names = $source_control_user_names;
    }

    /**
     * @return array
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param array $teams
     */
    public function setTeams($teams)
    {
        $this->teams = $teams;
    }

    /**
     * @return boolean
     */
    public function isUseGravatar()
    {
        return $this->use_gravatar;
    }

    /**
     * @param boolean $use_gravatar
     */
    public function setUseGravatar($use_gravatar)
    {
        $this->use_gravatar = $use_gravatar;
    }

    /**
     * @return boolean
     */
    public function isUseWindowsAuth()
    {
        return $this->use_windows_auth;
    }

    /**
     * @param boolean $use_windows_auth
     */
    public function setUseWindowsAuth($use_windows_auth)
    {
        $this->use_windows_auth = $use_windows_auth;
    }

    /**
     * @return boolean
     */
    public function isUsedSampleData()
    {
        return $this->used_sample_data;
    }

    /**
     * @param boolean $used_sample_data
     */
    public function setUsedSampleData($used_sample_data)
    {
        $this->used_sample_data = $used_sample_data;
    }

    /**
     * @return boolean
     */
    public function isUsingSampleData()
    {
        return $this->using_sample_data;
    }

    /**
     * @param boolean $using_sample_data
     */
    public function setUsingSampleData($using_sample_data)
    {
        $this->using_sample_data = $using_sample_data;
    }

    /**
     * @return string
     */
    public function getWindowsId()
    {
        return $this->windows_id;
    }

    /**
     * @param string $windows_id
     */
    public function setWindowsId($windows_id)
    {
        $this->windows_id = $windows_id;
    }

    /**
     * @return Helper
     */
    public function getHelper()
    {
        return new Helper();
    }
}
