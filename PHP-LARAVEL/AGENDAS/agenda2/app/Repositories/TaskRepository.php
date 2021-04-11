<?php

namespace App\Repositories;

use App\Task;
use App\Company;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{
    /**
    * @var $task
    */
    private $task;

    public function __contstruct(Task $task)
    {
        $this->task = $task;
    }

    public function all()
    {
        $company = Company::findOrFail(Auth::user()->company_id);

        return $company->tasks->all();
    }

}
