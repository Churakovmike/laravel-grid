<?php

namespace ChurakovMike\EasyGrid\Formatters;

use ChurakovMike\EasyGrid\Interfaces\Formattable;
use ChurakovMike\EasyGrid\Traits\Configurable;

/**
 * Format column value.
 *
 * Class BaseFormatter
 * @package ChurakovMike\EasyGrid\Formatters
 */
abstract class BaseFormatter implements Formattable
{
    use Configurable;
}
