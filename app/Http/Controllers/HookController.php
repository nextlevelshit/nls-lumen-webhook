<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Repository;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HookController extends BaseController
{
    protected $repository;
    protected $path;

    /**
     * Create a new controller instance.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->repository = new Repository();
        $this->repository->fill($request->input('repository'));

        $this->path = implode('/', [
            env('REPO_DIRECTORY'),
            $this->repository->name
        ]);
    }

    /**
     * Pull Repository on push-hook.
     * 
     * @return void
     */

    public function onPush() 
    {
        $this->run([
            'git',
            '--git-dir=' . $this->path . '/.git',
            '--work-tree=' . $this->path,
            'pull',
            'origin',
            $this->repository->default_branch
        ]);
    }
    
    /**
     * Run a process command
     * 
     * @var Array $command
     * @return Response
     */
    
    protected function run($command)
    {
        $process = new Process($command);
        
        try {
            $process->run();
            return response('Succesfully updated repository.', 200);

        } catch(ProcessFailedException $exception) {
            return response($exception->getMessage(), 500);
        }
    }
}
