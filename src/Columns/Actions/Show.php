<?php

namespace ChurakovMike\EasyGrid\Columns\Actions;

/**
 * Class Show.
 * @package ChurakovMike\EasyGrid\Columns\Actions
 */
class Show extends BaseButton
{
    /**
     * @return array|string
     * @throws \Throwable
     */
    public function render($row)
    {
        return view('churakovmike_easygrid::actions.show', [
            'url' => $this->getUrl($row),
        ])->render();
    }

    /**
     * Build link to edit page.
     *
     * @param $row
     * @return string
     */
    public function buildUrl($row)
    {
        return $this->getCurrentUrl() . '/' . $row->id;
    }
}
