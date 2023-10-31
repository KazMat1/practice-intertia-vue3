<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\WhereLike;

class Todo extends Model
{
    use HasFactory, SoftDeletes, WhereLike;

    protected $fillable = [
        'title',
        'due_date',
        'is_completed'
    ];
}
