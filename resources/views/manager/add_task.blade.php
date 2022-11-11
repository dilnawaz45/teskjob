@extends('manager.content')

@section('title')
Add New Task
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
                <form action="{{ @route('manager_add_new_task') }}" method="POST">
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
                        <label for="Task Name">* Assign To</label>
                        <select name="assign_to" id="assign_to" class="form-control">
                            <option value="">-- Select --</option>
                            @if (isset($users))
                                @foreach ($users as $user)
                                    <option value="{{ $user->username }}">{{ $user->name }} ({{ $user->username }})</option>
                                @endforeach
                            @endif
                        </select>
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