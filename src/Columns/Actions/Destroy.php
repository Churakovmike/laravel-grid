<?php

namespace ChurakovMike\EasyGrid\Columns\Actions;

/**
 * Class Destroy.
 * @package ChurakovMike\EasyGrid\Columns\Actions
 */
class Destroy extends BaseButton
{
    public function render()
    {
        return view('churakovmike_easygrid::actions.destroy', [
        ])->render();
    }
}
