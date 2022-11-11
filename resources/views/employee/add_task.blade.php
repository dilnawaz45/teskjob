@extends('employee.content')

@section('title')
Add New Task || Employee
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
            <div class="card-header">Add New Task </div>
            <div class="card-body">
                <form action="{{ @route('employee_add_new_task') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Task Name">* Task Name</label>
                        <input type="text" name="name" id="name" required class="form-control" value="{{ old('name') }}"/>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Task Due Date">* Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('name') }}"/>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Task Description">Task Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add_task" value="Add Task" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection