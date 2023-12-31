<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'due_date',
        'is_completed'
    ];

    // protected function deadline(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Carbon::now($value)->format("m/d"),
    //     );
    // }
}
