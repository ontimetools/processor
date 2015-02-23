<?php
namespace OTT\Processor\Entity;

class ReleaseCapacity extends EntityAbstract
{
    /** @var int */
    protected $duration;
    /** @var ItemDurationUnit */
    protected $unit;

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return ItemDurationUnit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param ItemDurationUnit $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return null|\OTT\Processor\Helper\HelperAbstract
     */
    public function getHelper()
    {
        return;
    }
}
