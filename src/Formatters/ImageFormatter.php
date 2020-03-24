<?php

namespace ChurakovMike\EasyGrid\Formatters;

/**
 * Format row data in html img tag.
 *
 * Class ImageFormatter.
 * @package ChurakovMike\EasyGrid\Formatters
 */
class ImageFormatter extends BaseFormatter
{
    /**
     * Format value as image.
     *
     * @param $value
     * @return mixed|string
     */
    public function format($value)
    {
        return '<img src="' . $value . '"/>';
    }
}
