<?php

namespace ChurakovMike\EasyGrid\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class PaginationHelper
 * @package ChurakovMike\EasyGrid\Helpers
 *
 * @property LengthAwarePaginator $paginator
 */
class PaginationHelper
{
    /**
     * @var LengthAwarePaginator $paginator
     */
    public $paginator;

    /**
     * PaginationHelper constructor.
     * @param LengthAwarePaginator $paginator
     */
    public function __construct(LengthAwarePaginator $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * Build next page link with sort and filters.
     *
     * @return string
     */
    public function getNextUrl(): string
    {
        //TODO: доделать подстановку параметров
        return url()->current() . '/?page=' .  ($this->paginator->currentPage() - 1);
    }
}
