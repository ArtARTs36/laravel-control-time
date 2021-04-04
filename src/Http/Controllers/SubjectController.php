<?php

namespace ArtARTs36\ControlTime\Http\Controllers;

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use ArtARTs36\ControlTime\Http\Requests\StoreSubjectRequest;
use ArtARTs36\ControlTime\Models\Subject;
use ArtARTs36\ControlTime\Models\SubjectType;
use ArtARTs36\ControlTime\Services\SubjectService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectController extends BaseController
{
    protected $subjects;

    protected $service;

    public function __construct(SubjectRepository $subjects, SubjectService $service)
    {
        $this->subjects = $subjects;
        $this->service = $service;
    }

    public function index(): AnonymousResourceCollection
    {
        return JsonResource::collection($this->subjects->all());
    }

    public function store(StoreSubjectRequest $request): JsonResource
    {
        return JsonResource::make(
            $this->service->create(
                $request->input(Subject::FIELD_TITLE),
                SubjectType::query()->findOrFail($request->input(Subject::FIELD_TYPE_ID)),
                $request->input(Subject::FIELD_CODE)
            )
        );
    }
}
