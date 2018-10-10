<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Repository;

class HookController extends BaseController
{
    protected $repository;

    /**
     * Create a new controller instance.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->repository = new Repository($request->all());
    }

    public function onPush() 
    {
        print_r($this->repository);

        die();
    }
}
