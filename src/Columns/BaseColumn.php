<?php

namespace ChurakovMike\EasyGrid\Columns;

use ChurakovMike\EasyGrid\Filters\BaseFilter;
use ChurakovMike\EasyGrid\Filters\TextFilter;
use ChurakovMike\EasyGrid\Traits\Configurable;

/**
 * Class BaseColumn.
 * @package ChurakovMike\EasyGrid\Columns
 *
 * @property string $label
 * @property string $attribute
 * @property string|\Closure|mixed $value
 * @property BaseFilter $filter
 */
abstract class BaseColumn
{
    use Configurable;

    /**
     * @var string $label
     */
    public $label;

    /**
     * @var string $attribute
     */
    public $attribute;

    /**
     * @var string $value
     */
    public $value;

    /**
     * @var string $filter
     */
    public $filter;

    /**
     * BaseColumn constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->loadConfig($config);

        $this->buildFilter();
    }

    /**
     * @param $row
     * @return string
     */
    public function getValue($row): string
    {
    }

    /**
     * Get title for grid head.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label ?? ucfirst($this->attribute);
    }

    /**
     * Get attribute.
     *
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * Build filter for grid.
     *
     * @return void
     */
    protected function buildFilter()
    {
        if (is_null($this->filter)) {
            $this->filter = new TextFilter([
                'name' => $this->getAttribute(),
            ]);
        }
    }
}
