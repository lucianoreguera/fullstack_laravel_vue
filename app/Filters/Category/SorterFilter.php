<?php

namespace App\Filters\Category;

use App\Filters\BaseSorterFilter;

final class SorterFilter extends BaseSorterFilter
{
    public string $primaryKey = 'category_id';
    
    public array $availableColumSorters = [
        'name', 'is_active', 'created_at',
    ];
}
