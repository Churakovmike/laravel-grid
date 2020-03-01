<?php

namespace ChurakovMike\EasyGrid\DataProviders;

use ChurakovMike\EasyGrid\Helpers\SortHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class EloquentDataProvider.
 * @package ChurakovMike\EasyGrid\DataProviders
 */
class EloquentDataProvider extends BaseDataProvider
{
    /**
     * Get result.
     *
     * @param Request $request
     * @return Collection
     */
    public function get(Request $request): Collection
    {
        if ($request->get('sort', null)) {
            $this->query->orderBy(SortHelper::getSortColumn($request), SortHelper::getDirection($request));
        }

        return $this->query->offset(($request->page - 1) * ($request->perPage))
            ->limit($request->perPage)
            ->get() ?? new Collection();
    }
}
