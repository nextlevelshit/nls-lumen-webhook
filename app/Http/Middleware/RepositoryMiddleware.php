<?php

namespace App\Http\Middleware;

use Closure;
use App\Repository;

class RepositoryMiddleware
{
    protected $allowedRepositories;

    function __construct() {
        $this->allowedRepositories = explode(';', env('ALLOWED_REPOSITORIES'));
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $action = null)
    {
        $repositoryName = $request->input('repository.name');

        if (!in_array($repositoryName, $this->allowedRepositories)) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
