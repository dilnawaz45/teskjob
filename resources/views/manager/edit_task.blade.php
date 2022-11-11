@extends('manager.content')

@section('title')
Edit New Task
@endsection

@section('main_content')

<style>
    .form-group{
        margin-bottom: 20px;
    }
</style>
<div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-3">
        @if (session('errors'))
            <div class="alert alert-danger">{{ session('errors') }}</div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card">
            <div class="card-header">Update New Task </div>
            <div class="card-body">
                <form action="{{ @route('manager_update_new_task') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Task Name">* Task Name</label>
                        <input type="text" name="name" id="name" required class="form-control" value="{{ $data->name }}"/>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Task Due Date">* Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $data->due_date }}"/>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Task Description">Task Description</label>
                        <textarea name="description" id="description" class="form-control">{{ $data->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="edit_id" value="{{ $data->id }}"/>
                        <input type="submit" name="add_task" value="Update Task" class="btn btn-info"/>
                    </div>
                </form>
            </div>
        </div>
        <div class="alert alert-danger"><strong>Note:</strong> You don't have permission to change <b>Assign To.</b></div>
      </div>
    </div>
  </div>

@endsection