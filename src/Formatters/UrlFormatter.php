<?php

namespace ChurakovMike\EasyGrid\Formatters;

/**
 * Format row data in html url tag.
 *
 * Class UrlFormatter.
 * @package ChurakovMike\EasyGrid\Formatters
 */
class UrlFormatter extends BaseFormatter
{
    /**
     * Format value as url.
     *
     * @param $value
     * @return mixed|string
     */
    public function format($value)
    {
        return '<a href="' . $value . '"/>';
    }
}
