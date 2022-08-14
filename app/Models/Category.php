<?php

namespace App\Models;

use App\Filters\Category\CategoryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'picture',
        'site_id',
        'category_id'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new CategoryFilter($request))->filter($builder);
    }
}
