<?php

namespace App\Http\Controllers;

use App\Actions\CreateTaskAction;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function create()
    {
        return Inertia::render('Tasks/CreateTask');
    }

    public function store(CreateTaskRequest $request, CreateTaskAction $createTaskAction)
    {
        $createTaskAction->createTask($request);

        return Redirect::route('dashboard');
    }
}
