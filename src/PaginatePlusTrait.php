<?php

namespace Blasttech\PaginatePlus;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

/**
 * Trait PaginatePlusTrait
 *
 * @package Blasttech\PaginatePlus
 */
trait PaginatePlusTrait
{
    /**
     * @param Builder $query
     * @param int|null $per_page
     * @return LengthAwarePaginator
     */
    public function scopePaginatePlus(Builder $query, $per_page = null)
    {
        $perPage = $per_page ?? $query->getModel()->getPerPage();
        $currentPage = Input::get('page', 1);

        $queryCount = (clone $query);
        $total = $queryCount
            ->getConnection()
            ->table(DB::raw("({$queryCount->toSql()}) as sub"))
            ->mergeBindings($queryCount->getQuery())
            ->count();

        $itemsForCurrentPage = array_slice($query->get()->toArray(), $offSet, $paginate, true);
        $offSet = ($currentPage * $perPage) - $perPage;
        $result = new LengthAwarePaginator(
            $itemsForCurrentPage,
            $total,
            $perPage,
            $currentPage
        );

        return $result;
    }
}