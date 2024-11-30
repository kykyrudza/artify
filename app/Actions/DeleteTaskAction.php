<?php

namespace App\Actions;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class DeleteTaskAction
{
    public function delete(Request $request): void
    {

        $id = $request->id;

        $task = Task::find($id);

        $task->delete();

    }
}
