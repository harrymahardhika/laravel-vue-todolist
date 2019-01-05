<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('projects')->truncate();
        Schema::enableForeignKeyConstraints();

        factory(\App\Models\Project::class, 20)->create();
    }
}
