<?php

namespace App\Repository\Eloquent;

use Generator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait CommonQueriesTrait
{
    protected function queryForSelect(
        Model $model,
        string $columnForIndex,
        string $columnForValue,
        ?string $orderByField = null
    ): Generator {
        $result = $model->query()->orderBy($orderByField ?? $columnForValue);

        foreach ($result->get() as $network) {
            (yield $network->$columnForIndex => $network->$columnForValue);
        }
    }

    protected function paginatorForListWithFilter(
        Model $model,
        int $currentPage,
        array $filters,
        ?string $sortBy,
        string $sortMethod,
        int $perPage = 30,
    ): LengthAwarePaginator {
        return $this->queryBuilderForListWithFilter($model, $filters, $sortBy, $sortMethod)
            ->paginate(perPage: $perPage, page: $currentPage);
    }

    protected function queryBuilderForListWithFilter(
        Model $model,
        array $filters,
        ?string $sortBy,
        string $sortMethod,
    ): Builder {
        $queryBuilder = $model->query();

        foreach ($filters as $field => $value) {
            if ($value === null) {
                continue;
            }

            $queryBuilder->where($field, '=', $value);
        }

        if ($sortBy !== null) {
            $queryBuilder->orderBy($sortBy, $sortMethod);
        }

        return $queryBuilder;
    }
}
