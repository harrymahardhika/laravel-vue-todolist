<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Transformers\ProjectTransformer;

class ProjectController extends Controller
{
    public function getProjects()
    {
        return fractal(Project::all(), new ProjectTransformer())->toJson();
    }

    public function getProjectProgress(Project $project)
    {
        return response()->json([
            'task_count' => $project->task_count,
            'completed_task_count' => $project->completed_task_count,
            'progress' => $project->progress,
        ]);
    }
}
