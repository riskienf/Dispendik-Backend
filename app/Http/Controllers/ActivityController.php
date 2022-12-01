<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityCollection;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Activity::class);
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $activities = Activity::query();

        if ($user->isUser()) {
            $activities->where('institution_id', $user->institution_id);
        }

        if ($request->query('date')) {
            return new ActivityCollection(
                $activities->whereDate('date', $request->query('date'))
                    ->paginate(15, ['id', 'name'])
            );
        }

        return new ActivityCollection(
            $activities->latest()
                ->paginate(15, ['id', 'name'])
        );
    }

    public function store(CreateActivityRequest $request)
    {
        $data = $request->validated();
        $url = $request->file('picture')->store('activity_pictures');
        $data['picture'] = $url;
        $data['institution_id'] = 1;

        return new ActivityResource(Activity::create($data));
    }

    public function show(Activity $activity)
    {
        return new ActivityResource($activity);
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update($request->validated());

        return new ActivityResource($activity);
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return new ActivityResource($activity);
    }
}
