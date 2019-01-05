<?php

namespace App\Transformers;

use App\Models\Task;
use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param \App\Models\Task $task
     * @return array
     */
    public function transform(Task $task)
    {
        return [
            'id' => $task->id,
            'description' => $task->description,
            'is_completed' => $task->is_completed,
        ];
    }
}
