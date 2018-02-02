<?php

namespace Blasttech\PaginatePlus;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Trait PaginatePlusTrait.
 */
trait PaginatePlusTrait
{
    /**
     * @param Builder  $query
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function scopePaginatePlus(Builder $query, $perPage = null)
    {
        $perPage = $perPage ?: $query->getModel()->getPerPage();
        $currentPage = Input::get('page', 1);

        // Total number of records in query
        $total = $this->getTotal($query);

        // Items for current page
        $items = $this->getItems($query, $currentPage, $perPage);

        $result = new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage
        );

        return $result;
    }

    /**
     * Get the total number of records in the query.
     *
     * @param Builder $query
     *
     * @return int
     */
    protected function getTotal(Builder $query)
    {
        $clone = (clone $query);

        return $clone
            ->getConnection()
            ->table(DB::raw("({$clone->toSql()}) as sub"))
            ->mergeBindings($clone->getQuery())
            ->count();
    }

    /**
     * Get the items for the current page.
     *
     * @param Builder $query
     * @param int     $currentPage
     * @param int     $perPage
     *
     * @return array
     */
    protected function getItems(Builder $query, $currentPage, $perPage)
    {
        $offSet = ($currentPage * $perPage) - $perPage;

        return $query
            ->offset($offSet)
            ->limit($perPage)
            ->get()
            ->toArray();
    }
}
