<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'phone_number' => $this->phone_number,
            'institution_id' => $this->institution_id,
            'token' => $this->createToken($request->getClientIp())->plainTextToken,
            'role_id' => $this->role_id
        ];
    }
}
