@extends('employee.content')

@section('title')
Task Status
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
            <div class="card-header">Task Status</div>
            <div class="card-body">
                <form action="{{ @route('employee_update_task_status') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>Task Name</b></td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Task Due Date</b></td>
                                <td>{{ $data->due_date }}</td>
                            </tr>
                            <tr>
                                <td><b>Task Description</b></td>
                                <td>{{ $data->description }}</td>
                            </tr>
                            <tr>
                                <td><b>Assigned To</b></td>
                                <td>{{ $data->assign_to }}</td>
                            </tr>
                            <tr>
                                <td><b>Assigned By</b></td>
                                <td>{{ $data->assign_by }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="Task Due Date">* Change Status</label>
                        <select name="status" id="status" class="form-control">
                        @if (isset($status))
                            @foreach ($status as $sts)
                                @if ($sts == $data->status)
                                    <option selected value="{{ $sts }}">{{ $sts }}</option>
                                @else
                                    <option value="{{ $sts }}">{{ $sts }}</option>
                                @endif
                                
                            @endforeach
                        @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="edit_id" value="{{ $data->id }}"/>
                        <input type="submit" name="add_task" value="Update Task Status" class="btn btn-info"/>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection