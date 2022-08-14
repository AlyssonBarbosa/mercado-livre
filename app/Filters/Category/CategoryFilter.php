<?php

namespace App\Filters\Category;

use App\Filters\AbstractFilter;
use App\Filters\EqualsTextSearchFilter;

class CategoryFilter extends AbstractFilter
{
    protected $filters = [
        'site_id' => EqualsTextSearchFilter::class,
    ];
}
