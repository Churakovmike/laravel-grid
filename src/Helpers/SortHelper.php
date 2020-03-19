<?php

namespace ChurakovMike\EasyGrid\Helpers;

use ChurakovMike\EasyGrid\Columns\BaseColumn;
use ChurakovMike\EasyGrid\Columns\ActionColumn;
use Illuminate\Http\Request;

/**
 * Class QueryHelper.
 */
class SortHelper
{
    const
        SORT_ASC = 'asc',
        SORT_DESC = 'desc';

    /**
     * Build sort link for model.
     *
     * @param Request $request
     * @param BaseColumn|ActionColumn $column
     * @return string
     */
    public static function getSortableLink(Request $request, $column): string
    {
        if ($column instanceof ActionColumn) {
            return '';
        }

        $sortQuery = $request->get('sort', null);

        if (is_null($sortQuery)) {
            return $request->fullUrlWithQuery([
                'sort' => $column->getAttribute(),
            ]);
        }

        if ($sortQuery == $column->getAttribute()) {
            return $request->fullUrlWithQuery([
                'sort' => '-' . $column->getAttribute(),
            ]);
        }

        if ($sortQuery == ('-' . $column->getAttribute())) {
            return $request->fullUrlWithQuery([
                'sort' => $column->getAttribute(),
            ]);
        }

        return $request->fullUrlWithQuery([
            'sort' => $column->getAttribute(),
        ]);
    }

    /**
     * Return column from request.
     *
     * @param Request $request
     * @return mixed
     */
    public static function getSortColumn(Request $request): string
    {
        $column = $request->get('sort');

        return str_replace('-', '', $column);
    }

    /**
     * Return column direction from request.
     *
     * @param Request $request
     * @return string
     */
    public static function getDirection(Request $request): string
    {
        $column = $request->get('sort');
        $position = mb_strpos($column, '-');
        if ($position === 0) {
            return self::SORT_DESC;
        }

        return self::SORT_ASC;
    }
}
