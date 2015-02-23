<?php
namespace OTT\Processor\Helper;

use OTT\Processor\Entity\EntityAbstract;

abstract class HelperAbstract
{
    /**
     * @param  array $datas
     * @return array
     */
    final public static function prepareData($datas = [])
    {
        return isset($datas['data']) ? $datas['data'] : $datas;
    }

    /**
     * @param  array $datas
     * @param  EntityAbstract $element
     * @return array|mixed
     */
    public static function fromApiToEntity($datas = [], &$element = null)
    {
        $instance = new static();
        $result = null;
        if (is_array($datas)) {
            // Only way to know if there is one or more results
            $multi = isset($datas['data']) ? isset($datas['data'][0]) : false;
            $datas = self::prepareData($datas);
            if (!$multi) {
                $result = count($datas) > 0 ? $instance->fromApiToEntitySingle($datas, $element) : null;
            } else {
                foreach ($datas as $data) {
                    $element = is_object($element) ? clone $element : $element;
                    $result[] = $instance->fromApiToEntitySingle($data, $element);
                }
            }
        }

        return $result;
    }

    /**
     * @param $key
     * @param $array
     * @return null
     */
    public function get($array, $key)
    {
        return isset($array[$key]) ? $array[$key] : null;
    }

    /**
     * @param  array $datas
     * @param  EntityAbstract $element
     * @return mixed
     */
    abstract protected function fromApiToEntitySingle($datas = [], &$element = null);
}
