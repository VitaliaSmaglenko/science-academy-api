<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\ScientistProfile;
use Illuminate\Database\Eloquent\Collection;

class ScientistProfileRepository
{
    public function get(): Collection
    {
        return ScientistProfile::get();
    }

    public function getById(int $id): ?ScientistProfile
    {
        return ScientistProfile::where('id', $id)->first();
    }

    public function getByUserId(int $userId): Collection
    {
        return ScientistProfile::where('user_id', $userId)->get();
    }

    public function getUserProfile(int $id, int $userId): ?ScientistProfile
    {
        return ScientistProfile::where(['user_id' => $userId, 'id' => $id])->first();
    }
}