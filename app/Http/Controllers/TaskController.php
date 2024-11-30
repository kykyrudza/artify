<?php

namespace App\Http\Controllers;

use App\Actions\CompletedCancelTasksAction;
use App\Actions\CreateTaskAction;
use App\Actions\DeleteTaskAction;
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

    public function complete()
    {
        $user = auth()->user();

        $tasks = $user->tasks()->where(['completedTask' => true])->get();

        return Inertia::render('Tasks/CompleteTask', [
            'tasks' => $tasks
        ]);
    }

    public function completed(Request $request,CompletedCancelTasksAction $completedTaskAction)
    {
        $completedTaskAction->completed_or_cancel($request);

        return 0;
    }

    public function delete(Request $request, DeleteTaskAction $deleteTaskAction)
    {
        $deleteTaskAction->delete($request);

        return 0;
    }
}
