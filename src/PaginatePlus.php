<?php

namespace Blasttech\PaginatePlus;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface PaginatePlus.
 */
interface PaginatePlus
{
    /**
     * @param Builder  $query
     * @param int|null $per_page
     *
     * @return LengthAwarePaginator
     */
    public function scopePaginatePlus(Builder $query, $per_page = null);
}
