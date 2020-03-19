<?php

namespace ChurakovMike\EasyGrid\Columns\Actions;

use ChurakovMike\EasyGrid\Traits\Configurable;

/**
 * Class BaseButton.
 * @package ChurakovMike\EasyGrid\Columns\Actions
 */
abstract class BaseButton
{
    use Configurable;

    /**
     * Render action button.
     */
    public function render()
    {
    }
}
