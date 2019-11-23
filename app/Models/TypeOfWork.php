<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfWork extends Model
{
    protected $fillable = [
        'id', 'type', 'part', 'title', 'reference',
    ];
}
