<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Department extends Model
{
    protected $fillable = [
        'id', 'department', 'city',
    ];

    public function users(){
        return $this->belongsToMany(User::class,
            'department_user', 'department_id')
            ->withPivot('position');
    }
}
