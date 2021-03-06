<?php

namespace ArtARTs36\ControlTime\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as LaravelController;

abstract class BaseController extends LaravelController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
