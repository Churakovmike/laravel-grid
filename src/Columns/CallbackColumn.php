<?php

namespace ChurakovMike\EasyGrid\Columns;

/**
 * Class CallbackColumn.
 * @package ChurakovMike\EasyGrid\Columns
 */
class CallbackColumn extends BaseColumn
{
    /**
     * Return user callback.
     *
     * @param $row
     * @return string
     */
    public function getValue($row): string
    {
        return call_user_func($this->value, $row);
    }
}
