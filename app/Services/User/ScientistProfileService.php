<?php  declare(strict_types=1);

namespace App\Services\User;

use App\Models\ScientistProfile;

class ScientistProfileService
{
    public function create(array $params): ScientistProfile
    {
        $scientistProfile = new ScientistProfile([
            'title' => $params['title'],
            'profile_link' => $params['profile_link'],
            'number_of_publication' => $params['number_of_publication'],
            'user_id' => $params['user_id'],
            'index' => $params['index'],
        ]);
        $scientistProfile->save();

        return $scientistProfile;
    }

    public function update(ScientistProfile $scientistProfile, array $params): ScientistProfile
    {
        $scientistProfile->title = $params['title'];
        $scientistProfile->profile_link = $params['profile_link'];
        $scientistProfile->number_of_publication = $params['number_of_publication'];
        $scientistProfile->index = $params['index'];

        $scientistProfile->save();

        return $scientistProfile;
    }

    public function delete(ScientistProfile $scientistProfile): bool
    {
        return $scientistProfile->delete();
    }
}