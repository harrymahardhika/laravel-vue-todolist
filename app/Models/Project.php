<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $appends = [
        'task_count',
        'completed_task_count',
        'progress',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class)
            ->orderBy('is_completed', 'asc')
            ->orderBy('created_at', 'desc');
    }

    public function getTaskCountAttribute()
    {
        return $this->tasks()->count();
    }

    public function getCompletedTaskCountAttribute()
    {
        return $this->tasks()->where('is_completed', 1)->count();
    }

    public function getProgressAttribute()
    {
        return $this->completedTaskCount > 0 ? ($this->completedTaskCount / $this->taskCount) : 0;
    }
}
