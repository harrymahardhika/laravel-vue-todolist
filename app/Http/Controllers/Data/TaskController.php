<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Transformers\TaskTransformer;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasks(Project $project)
    {
        return fractal($project->tasks, new TaskTransformer())->toJson();
    }

    public function storeTask(Request $request, Project $project)
    {
        $task = new Task();
        $task->fill($request->all());
        $task->project()->associate($project);
        $task->save();
    }

    public function updateTask(Request $request, Task $task)
    {
        $task->fill($request->all());
        $task->save();
    }

    public function destroyTask(Task $task)
    {
        $task->delete();
    }

    public function markCompleted(Task $task)
    {
        $task->is_completed = true;
        $task->save();
    }

    public function markIncomplete(Task $task)
    {
        $task->is_completed = false;
        $task->save();
    }
}
