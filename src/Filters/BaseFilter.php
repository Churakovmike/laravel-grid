<?php

namespace ChurakovMike\EasyGrid\Filters;

use ChurakovMike\EasyGrid\Traits\Configurable;

/**
 * Class BaseFilter.
 * @package ChurakovMike\EasyGrid\Filters
 *
 * @property string $name
 * @property string $value
 */
abstract class BaseFilter
{
    use Configurable;

    /**
     * @var string $name
     */
    public $name;

    /**
     * @var string $value
     */
    public $value;

    /**
     * BaseFilter constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->loadConfig($config);
        $this->setValue();
    }

    /**
     * Render filters template.
     */
    public function render(): string
    {
    }

    /**
     * @return mixed
     */
    public function getValue(): string
    {
        return $this->value ?? '';
    }

    public function setValue()
    {
        $this->value = request()->input('filters.' . $this->getName());
    }

    /**
     * Return filter name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }
}
