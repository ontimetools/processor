<?php

namespace OTT\Processor\Helper;

use OTT\Processor\Entity\Contact;
use OTT\Processor\Entity\User;

abstract class PeopleAbstract extends HelperAbstract
{
    /**
     * People types
     */
    const PEOPLETYPE_USERS = 0;
    const PEOPLETYPE_CONTACTS = 1;
    private static $people_types = [
        self::PEOPLETYPE_USERS,
        self::PEOPLETYPE_CONTACTS,
    ];

    /**
     * @return array
     */
    private static function getPeopleTypes()
    {
        return self::$people_types;
    }

    /**
     * @param $type
     * @return null|Contact|User
     */
    public static function instanciatePeopleType($type)
    {
        $result = null;
        if (in_array($type, self::getPeopleTypes())) {
            switch ($type) {
                case self::PEOPLETYPE_USERS:
                    $result = new User();
                    break;
                case self::PEOPLETYPE_CONTACTS:
                    $result = new Contact();
                    break;
            }
        }

        return $result;
    }
}
