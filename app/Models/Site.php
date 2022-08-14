<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'default_currency_id',
        'status',
    ];

    protected $attributes = [
        'status' => \App\Enums\StatusEnum::NONE,
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
