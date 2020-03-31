<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 31.03.2020
 * Time: 22:38
 */

namespace ChurakovMike\EasyGrid\Filters;

/**
 * Class DropdownFilter.
 * @package ChurakovMike\EasyGrid\Filters
 */
class DropdownFilter extends BaseFilter
{
    /**
     * @return string
     */
    public function render(): string
    {
        return view('churakovmike_easygrid::filters.dropdown', [
            'name' => $this->getName(),
        ]);
    }
}
