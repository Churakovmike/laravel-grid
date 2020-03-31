<?php

namespace ChurakovMike\EasyGrid\Formatters;

/**
 * Class StubFormatter.
 * @package ChurakovMike\EasyGrid\Formatters
 */
class StubFormatter extends BaseFormatter
{
    /**
     * @param $value
     * @return mixed
     */
    public function format($value)
    {
        return $value;
    }
}
