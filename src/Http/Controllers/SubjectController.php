<?php

namespace ArtARTs36\ControlTime\Http\Controllers;

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectController extends BaseController
{
    protected $subjects;

    public function __construct(SubjectRepository $subjects)
    {
        $this->subjects = $subjects;
    }

    public function index(): AnonymousResourceCollection
    {
        return JsonResource::collection($this->subjects->all());
    }
}
