<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScientistProfile extends Model
{
    protected $fillable = [
        'user_id', 'title', 'profile_link', 'number_of_publication', 'index',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
