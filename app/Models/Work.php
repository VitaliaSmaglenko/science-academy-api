<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'id', 'type', 'part', 'title_hint', 'reference_hint',
    ];

    protected $table = 'works';
}
