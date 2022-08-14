<?php

namespace App\Filters;

class EqualsTextSearchFilter
{
    public function filter($builder, $key, $value)
    {
        return $builder->where($key, $value);
    }
}
