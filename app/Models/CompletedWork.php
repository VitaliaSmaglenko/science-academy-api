<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompletedWork extends Model
{
    protected $fillable = [
        'id', 'user_id', 'type_id', 'title', 'reference', 'reference',
        'co-author_id', 'number_of_hours', 'season',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function authors(): BelongsTo
    {
        return $this->belongsTo(User::class, "co-author_id");
    }

    public function works(): BelongsTo
    {
        return $this->belongsTo(Work::class, "type_id");
    }
}
