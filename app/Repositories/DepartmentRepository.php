<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Departments;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepository
{
    public function getDepartments(): Collection
    {
        return Departments::get();
    }
}