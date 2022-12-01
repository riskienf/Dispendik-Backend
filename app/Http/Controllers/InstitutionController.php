<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstitutionRequest;
use App\Http\Resources\InstitutionResource;
use App\Models\Institution;

class InstitutionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Institution::class);
    }

    public function index()
    {
        return InstitutionResource::collection(
            Institution::latest()->get(['id', 'name'])
        );
    }

    public function store(InstitutionRequest $request)
    {
        return [
            'data' => Institution::create($request->validated()),
        ];
    }

    public function update(InstitutionRequest $request, Institution $institution)
    {
        $institution->update($request->validated());

        return [
            'data' => $institution,
        ];
    }

    public function destroy(Institution $institution)
    {
        $institution->delete();

        return [
            'data' => $institution,
        ];
    }
}
