<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('tasks')->truncate();
        Schema::enableForeignKeyConstraints();

        $projects = \App\Models\Project::all();

        if ($projects) {
            $projects->each(function ($project) {
                $tasks = factory(\App\Models\Task::class, mt_rand(5, 30))->make();
                foreach ($tasks as $task) {
                    $task->project()->associate($project);
                    $task->save();
                }
            });
        }
    }
}
