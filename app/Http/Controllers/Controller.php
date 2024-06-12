<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Base path for blade templates of entity
     * @var string
     */
    protected string $templateBase = '';

    /**
     * @var string
     */
    protected string $routePrefix = '';

    /**
     * Current controller's method name for blade path
     * @var string
     */
    protected string $currentMethod = '';

    public function __construct()
    {
        $this->currentMethod = Route::getCurrentRoute()->getActionMethod();
    }
}
