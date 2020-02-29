<?php

namespace ChurakovMike\EasyGrid\Columns;

/**
 * Class DefaultColumn
 * @package ChurakovMike\EasyGrid\Columns
 */
class DefaultColumn extends BaseColumn
{
    /**
     * Return row value
     *
     * @param $row
     * @return string
     */
    public function getValue($row): string
    {
        return $row->{$this->attribute};
    }
}
