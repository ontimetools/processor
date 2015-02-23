<?php


namespace OTT\Processor\Entity;

abstract class PeopleAbstract extends EntityAbstract
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $email;
    /** @var string */
    protected $login_id;
    /** @var string */
    protected $password;
    /** @var string */
    protected $lastname;
    /** @var string */
    protected $firstname;
    /** @var SecurityRole[]|SecurityRole */
    protected $security_role;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
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
     * @return SecurityRole|SecurityRole[]
     */
    public function getSecurityRole()
    {
        return $this->security_role;
    }

    /**
     * @param SecurityRole|SecurityRole[] $security_role
     */
    public function setSecurityRole($security_role)
    {
        $this->security_role = $security_role;
    }
}
