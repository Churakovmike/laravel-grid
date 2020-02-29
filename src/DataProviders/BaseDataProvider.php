<?php

namespace ChurakovMike\EasyGrid\DataProviders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class BaseDataProvider
 * @package ChurakovMike\EasyGrid\DataProviders
 *
 * @property Builder $query
 */
abstract class BaseDataProvider
{
    /**
     * Copy of query
     *
     * @var Builder $query
     */
    protected $query;

    /**
     * EloquentDataProvider constructor.
     * @param Builder $query
     */
    public function __construct(Builder $query)
    {
        $this->query = clone $query;
    }

    /**
     * @param Request $request
     */
    public function get(Request $request) {}

    /**
     * Get rows count
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->query->count();
    }

    /**
     * Apply query sort
     *
     * @param string $column
     * @param string $direction
     */
    public function sort(string $column, string $direction): void
    {
        $this->query->orderBy($column, $direction);
    }
}
