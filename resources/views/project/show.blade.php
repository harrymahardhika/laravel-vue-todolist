@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <div class="float-right">
              <project-progress :project-id="{{ $project->id }}"></project-progress>
            </div>

            {{ $project->name }}
          </div>

          <div class="card-body">
            <add-task-form :project-id="{{ $project->id }}"></add-task-form>
            <edit-task-form></edit-task-form>
          </div>
          <tasks :project-id="{{ $project->id }}"></tasks>
        </div>
      </div>
    </div>
  </div>
@endsection
