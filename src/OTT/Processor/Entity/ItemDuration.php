<?php
namespace OTT\Processor\Entity;

class ItemDuration extends EntityAbstract
{
    /** @var string */
    protected $duration_text;
    /** @var string */
    protected $abbreviation;
    /** @var ItemDurationUnit */
    protected $time_unit;
    /** @var int */
    protected $duration_minutes;
    /** @var int */
    protected $aggregate_duration_minutes;
    /** @var int */
    protected $value;

    /**
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * @param string $abbreviation
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;
    }

    /**
     * @return int
     */
    public function getAggregateDurationMinutes()
    {
        return $this->aggregate_duration_minutes;
    }

    /**
     * @param int $aggregate_duration_minutes
     */
    public function setAggregateDurationMinutes($aggregate_duration_minutes)
    {
        $this->aggregate_duration_minutes = $aggregate_duration_minutes;
    }

    /**
     * @return int
     */
    public function getDurationMinutes()
    {
        return $this->duration_minutes;
    }

    /**
     * @param int $duration_minutes
     */
    public function setDurationMinutes($duration_minutes)
    {
        $this->duration_minutes = $duration_minutes;
    }

    /**
     * @return string
     */
    public function getDurationText()
    {
        return $this->duration_text;
    }

    /**
     * @param string $duration_text
     */
    public function setDurationText($duration_text)
    {
        $this->duration_text = $duration_text;
    }

    /**
     * @return ItemDurationUnit
     */
    public function getTimeUnit()
    {
        return $this->time_unit;
    }

    /**
     * @param ItemDurationUnit $time_unit
     */
    public function setTimeUnit($time_unit)
    {
        $this->time_unit = $time_unit;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return null|\OTT\Processor\Helper\HelperAbstract
     */
    public function getHelper()
    {
        return;
    }
}
