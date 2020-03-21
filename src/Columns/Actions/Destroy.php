<?php

namespace ChurakovMike\EasyGrid\Columns\Actions;

/**
 * Class Destroy.
 * @package ChurakovMike\EasyGrid\Columns\Actions
 */
class Destroy extends BaseButton
{
    const ACTION = 'delete';

    /**
     * @param $row
     * @return array|string
     * @throws \Throwable
     */
    public function render($row)
    {
        return view('churakovmike_easygrid::actions.destroy', [
            'url' => $this->getUrl($row),
        ])->render();
    }

    /**
     * Build link to edit delete item.
     *
     * @param $row
     * @return string
     */
    public function buildUrl($row)
    {
        return $this->getCurrentUrl() . '/' . $row->id . '/' . self::ACTION;
    }
}
