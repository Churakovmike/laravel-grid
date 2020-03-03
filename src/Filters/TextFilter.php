<?php

namespace ChurakovMike\EasyGrid\Filters;

/**
 * Class InputFilter
 * @package ChurakovMike\EasyGrid\Filters
 */
class TextFilter extends BaseFilter
{
    public function render(): string
    {
        return view('churakovmike_easygrid::filters.text-filter', [
            'name' => $this->name,
            'value' => $this->getValue(),
        ]);
    }
}
