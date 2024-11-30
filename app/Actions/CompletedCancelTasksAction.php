<?php

namespace App\Actions;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class CompletedCancelTasksAction
{
    public function completed_or_cancel(Request $request): void
    {

        $id = $request->id;

        $task = Task::find($id);

        $task->update(['completedTask' => !$task->completedTask]);

    }
}
