<?php

namespace ChurakovMike\EasyGrid\Columns\Actions;

/**
 * Class Show.
 * @package ChurakovMike\EasyGrid\Columns\Actions
 */
class Show extends BaseButton
{
    public function render()
    {
        return view('churakovmike_easygrid::actions.show', [

        ])->render();
    }
}
