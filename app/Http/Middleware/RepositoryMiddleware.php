<?php

namespace App\Http\Middleware;

use Closure;
use App\Repository;
use Illuminate\Http\Request;

class RepositoryMiddleware
{
    protected $repository;

    function __construct(Request $request)
    {
        $this->repository = new Repository();
        $this->repository->fill($request->input('repository')); 
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $action = null)
    {
        if ($this->repository->isNotValid()) {
            return response('Repository not authorized.', 401);
        }

        return $next($request);
    }
}
