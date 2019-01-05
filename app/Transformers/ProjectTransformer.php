<?php

namespace App\Transformers;

use App\Models\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param \App\Models\Project $project
     * @return array
     */
    public function transform(Project $project)
    {
        return [
            'id' => $project->id,
            'name' => $project->name,
            'task_count' => $project->task_count,
            'completed_task_count' => $project->completed_task_count,
            'progress' => $project->progress,
        ];
    }
}
