<?php

namespace ChurakovMike\EasyGrid\Formatters;

/**
 * Format row data as html.
 *
 * Class HtmlFormatter
 * @package ChurakovMike\EasyGrid\Formatters
 */
class HtmlFormatter extends BaseFormatter
{
    /**
     * Format value as html content.
     *
     * @param $value
     * @return mixed
     */
    public function format($value)
    {
        return $value;
    }
}
