<?php

namespace ArtARTs36\ControlTime\Http\Controllers;

use ArtARTs36\ControlTime\Contracts\SubjectTypeRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectTypeController extends BaseController
{
    protected $types;

    public function __construct(SubjectTypeRepository $types)
    {
        $this->types = $types;
    }

    public function index(): AnonymousResourceCollection
    {
        return JsonResource::collection($this->types->all());
    }
}
