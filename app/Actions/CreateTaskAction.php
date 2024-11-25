<?php

namespace App\Actions;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
class CreateTaskAction
{
    public function createTask(CreateTaskRequest $request): void
    {

        $task = $request->validated();

        Task::create([
            'nameTask' => $task['nameTask'],
            'descriptionTask' => $task['descriptionTask'],
            'dueDateTask' => $task['dueDateTask'],
        ]);

    }
}
