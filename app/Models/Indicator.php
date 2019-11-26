<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Indicator extends Model
{
    protected $fillable = [
        'id', 'user_id', 'work_id', 'quantity', 'number_of_hours', 'season',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function works(): BelongsTo
    {
        return $this->belongsTo(Work::class, "work_id");
    }
}
