<?php

namespace ChurakovMike\EasyGrid\Formatters;

/**
 * Format row data as text.
 *
 * Class TextFormatter
 * @package ChurakovMike\EasyGrid\Formatters
 */
class TextFormatter extends BaseFormatter
{
    /**
     * Format value as simple text without html tags.
     *
     * @param $value
     * @return mixed
     */
    public function format($value)
    {
        return strip_tags($value);
    }
}
