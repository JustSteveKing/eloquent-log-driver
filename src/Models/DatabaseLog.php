<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\Models;

use Illuminate\Database\Eloquent\Model;
use JustSteveKing\EloquentLogDriver\Models\LogBuilder;

class DatabaseLog extends Model
{
    protected $fillable = [
        'env',
        'message',
        'level',
        'context',
        'extra',
        'user_id'
    ];

    protected $casts = [
        'context' => 'array',
        'extra'   => 'array'
    ];

    public function newEloquentBuilder($query): LogBuilder
    {
        return new LogBuilder($query);
    }
}
