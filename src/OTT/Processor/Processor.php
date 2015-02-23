<?php

namespace OTT\Processor;

use OTT\Api\Connection\ConnectionRequest;
use OTT\Api\OnTime;
use OTT\Processor\Helper\Attachment;
use OTT\Processor\Helper\Contact;
use OTT\Processor\Helper\Customer;
use OTT\Processor\Helper\Item;
use OTT\Processor\Helper\Project;
use OTT\Processor\Helper\Release;
use OTT\Processor\Helper\User;

/**
 * Class Processor
 * @package OTT\Api
 */
class Processor
{
    /** @var OnTime */
    private $ontime;

    /**
     * @param ConnectionRequest $request
     */
    public function __construct(ConnectionRequest $request)
    {
        $this->setOntime(new OnTime($request));
    }

    /**
     * @return OnTime
     */
    public function getOntime()
    {
        return $this->ontime;
    }

    /**
     * @param OnTime $ontime
     */
    public function setOntime(OnTime $ontime)
    {
        $this->ontime = $ontime;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function attachments($data = null)
    {
        $message = new Message();
        $result = $this->ontime->attachments($data);
        if (!isset($result['error'])) {
            $result = Attachment::fromApiToEntity($result);
            $message->setSuccess(true);
            $message->setResult($result);
        } else {
            $message->setErrors($result['error']);
        }

        return $message;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function contacts($data = null)
    {
        $message = new Message();
        $result = $this->ontime->contacts($data);
        if (!isset($result['error'])) {
            $result = Contact::fromApiToEntity($result);
            $message->setSuccess(true);
            $message->setResult($result);
        } else {
            $message->setErrors($result['error']);
        }

        return $message;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function customers($data = null)
    {
        $message = new Message();
        $result = $this->ontime->customers($data);
        if (!isset($result['error'])) {
            $result = Customer::fromApiToEntity($result);
            $message->setSuccess(true);
            $message->setResult($result);
        } else {
            $message->setErrors($result['error']);
        }

        return $message;
    }

    /**
     * @param $result
     * @param $type
     * @return Message
     */
    private function item($result, $type)
    {
        $message = new Message();
        if (!isset($result['error'])) {
            $item = Item::instanciateItemType($type);
            $result = Item::fromApiToEntity($result, $item);
            $message->setSuccess(true);
            $message->setResult($result);
        } else {
            $message->setErrors($result['error']);
        }

        return $message;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function defects($data = null)
    {
        $result = $this->item($this->ontime->defects($data), Item::ITEMTYPE_DEFECTS);

        return $result;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function features($data = null)
    {
        $result = $this->item($this->ontime->features($data), Item::ITEMTYPE_FEATURES);

        return $result;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function incidents($data = null)
    {
        $result = $this->item($this->ontime->incidents($data), Item::ITEMTYPE_INCIDENTS);

        return $result;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function tasks($data = null)
    {
        $result = $this->item($this->ontime->tasks($data), Item::ITEMTYPE_TASKS);

        return $result;
    }

    /**
     * @return Message
     */
    public function me()
    {
        $message = new Message();
        $result = $this->ontime->users(
            $this->ontime->me()['data']['id']
        );
        if (!isset($result['error'])) {
            $result = User::fromApiToEntity($result);
            $message->setSuccess(true);
            $message->setResult($result);
        } else {
            $message->setErrors($result['error']);
        }

        return $message;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function projects($data = null)
    {
        $message = new Message();
        $result = $this->ontime->projects($data);
        if (!isset($result['error'])) {
            $result = Project::fromApiToEntity($result);
            $message->setSuccess(true);
            $message->setResult($result);
        } else {
            $message->setErrors($result['error']);
        }

        return $message;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function releases($data = null)
    {
        $message = new Message();
        $result = $this->ontime->releases($data);
        if (!isset($result['error'])) {
            $result = Release::fromApiToEntity($result);
            $message->setSuccess(true);
            $message->setResult($result);
        } else {
            $message->setErrors($result['error']);
        }

        return $message;
    }

    /**
     * @param  null $data
     * @return Message
     */
    public function users($data = null)
    {
        $message = new Message();
        $result = $this->ontime->users($data);
        if (!isset($result['error'])) {
            $result = User::fromApiToEntity($result);
            $message->setSuccess(true);
            $message->setResult($result);
        } else {
            $message->setErrors($result['error']);
        }

        return $message;
    }
}
