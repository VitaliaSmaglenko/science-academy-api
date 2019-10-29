<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateScientistProfileRequest;
use App\Http\Resources\ScientistProfileResource;
use App\Http\Resources\SuccessfullyResource;
use App\Repositories\ScientistProfileRepository;
use App\Services\User\ScientistProfileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Lang;

class ScientistProfileController extends Controller
{
    /**
     * @var ScientistProfileService
     */
    private $scientistProfileService;

    /**
     * @var ScientistProfileRepository
     */
    private $scientistProfileRepository;

    public function __construct(
        ScientistProfileService $scientistProfileService,
        ScientistProfileRepository $scientistProfileRepository
    )
    {
        $this->scientistProfileRepository = $scientistProfileRepository;
        $this->scientistProfileService = $scientistProfileService;
    }

    public function index(): AnonymousResourceCollection
    {
        $scientistProfiles = $this->scientistProfileRepository->get();

        return ScientistProfileResource::collection($scientistProfiles);
    }

    public function getForUser(Request $request): AnonymousResourceCollection
    {
        $scientistProfiles = $this->scientistProfileRepository->getByUserId($request->user()->id);

        return ScientistProfileResource::collection($scientistProfiles);

    }

    public function create(CreateScientistProfileRequest $request): ScientistProfileResource
    {
        $scientistProfile = $this->scientistProfileService->create([
            'title' => $request->title,
            'profile_link' => $request->profile_link,
            'number_of_publication' => $request->number_of_publication,
            'user_id' => $request->user()->id,
            'index' => $request->index,
        ]);

        return ScientistProfileResource::make($scientistProfile);
    }

    public function show($id)
    {
        $scientistProfile = $this->scientistProfileRepository->getById((int) $id);
        if(!$scientistProfile) {
            return response()->json([
                'message' => Lang::get("message.scientistProfile.notFound")
            ], 404);
        }

        return ScientistProfileResource::make($scientistProfile);
    }


    public function update(string $id, CreateScientistProfileRequest $request)
    {
        $scientistProfile = $this->scientistProfileRepository->getUserProfile((int) $id, $request->user()->id);
        if(!$scientistProfile) {
            return response()->json([
                'message' => Lang::get("message.scientistProfile.assessDenied")
            ], 404);
        }

        $scientistProfile = $this->scientistProfileService->update($scientistProfile, [
            'title' => $request->title,
            'profile_link' => $request->profile_link,
            'number_of_publication' => $request->number_of_publication,
            'index' => $request->index,
        ]);

        return ScientistProfileResource::make($scientistProfile);
    }

    public function destroy($id, Request $request)
    {
        $scientistProfile = $this->scientistProfileRepository->getUserProfile((int) $id, $request->user()->id);
        if(!$scientistProfile) {
            return response()->json([
                'message' => Lang::get("message.scientistProfile.assessDenied")
            ], 404);
        }

        $this->scientistProfileService->delete($scientistProfile);

        return SuccessfullyResource::make([
            'message' => Lang::get("message.scientistProfile.delete")
        ]);
    }
}
