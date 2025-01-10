<?php

namespace App\Enums\Filters;

use App\Filters\Category\QueryFilter;
use App\Filters\Category\SorterFilter;
use App\Filters\Filter;
use App\Filters\FilterValue;
use App\Filters\Shared\IsActiveFilter;

enum CategoryFilters: string
{
    case Sorter = 'sorter';
    case Query = 'query';
    case IsActive = 'is_active';

    public function create(FilterValue $filter): Filter
    {
        return match ($this) {
            self::Sorter => new SorterFilter($filter),
            self::Query => new QueryFilter($filter),
            self::IsActive => new IsActiveFilter($filter),
        };
    }
}
