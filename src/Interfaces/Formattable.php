<?php

namespace ChurakovMike\EasyGrid\Interfaces;

/**
 * Interface for all classes formatters.
 *
 * Interface Formattable
 * @package ChurakovMike\EasyGrid\Interfaces
 */
interface Formattable
{
    /**
     * Format value.
     *
     * @param $value
     * @return mixed
     */
    public function format($value);
}
