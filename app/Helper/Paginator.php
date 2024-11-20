<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginator
{
    /**
     * Paginate the provided query.
     *
     * @param  $query
     * @param  int  $perPage
     * @param  array  $options
     * @return LengthAwarePaginator
     */
    public static function paginate($query, int $page = 1, int $perPage = 25, array $options = []): array
    {
        $page = $page ?: (self::resolveCurrentPage() ?: 1);
        $results = $query->paginate($perPage, ['*'], 'page', $page);
        return [
            'data' => $results->items(),
            'pagination' => [
                'total' => $results->total(),
                'current_page' => $results->currentPage(),
                'per_page' => $results->perPage(),
                'last_page' => $results->lastPage(),
                'next_page' => $results->hasMorePages() ? $results->currentPage() + 1 : null,
                'previous_page' => $results->currentPage() > 1 ? $results->currentPage() - 1 : null,
                'total_pages' => $results->lastPage(),
                'has_previous_page' => $results->currentPage() > 1,
                'has_next_page' => $results->hasMorePages(),
            ],
        ];
    }

    public static function resolveCurrentPage()
    {
        return request()->query('page') ?? 1;
    }
}
