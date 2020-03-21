<?php

namespace ChurakovMike\EasyGrid\Columns\Actions;

/**
 * Class Update.
 * @package ChurakovMike\EasyGrid\Columns\Actions
 */
class Update extends BaseButton
{
    const ACTION = 'edit';

    /**
     * @param $row
     * @return array|string
     * @throws \Throwable
     */
    public function render($row)
    {
        return view('churakovmike_easygrid::actions.update', [
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
        return $this->getCurrentUrl() . '/' . $row->id . '/' . self::ACTION;
    }
}
