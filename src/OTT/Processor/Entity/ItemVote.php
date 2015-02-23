<?php
namespace OTT\Processor\Entity;

class ItemVote extends EntityAbstract
{
    /** @var int */
    protected $count;
    /** @var float */
    protected $average;

    /**
     * @return float
     */
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * @param float $average
     */
    public function setAverage($average)
    {
        $this->average = $average;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return null|\OTT\Processor\Helper\HelperAbstract
     */
    public function getHelper()
    {
        return;
    }
}
