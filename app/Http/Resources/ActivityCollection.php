<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->transform(
            fn ($activity) => [
                'id' => $activity->id,
                'name' => $activity->name,
            ]
        );
    }
}
