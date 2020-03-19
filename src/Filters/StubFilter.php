<?php

namespace ChurakovMike\EasyGrid\Filters;

/**
 * Class StubFilter.
 * @package ChurakovMike\EasyGrid\Filters
 */
class StubFilter extends BaseFilter
{
    /**
     * @return string
     */
    public function render(): string
    {
        return view('churakovmike_easygrid::filters.stub', []);
    }
}
