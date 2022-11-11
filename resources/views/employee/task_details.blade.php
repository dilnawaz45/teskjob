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
      <div class="col-md-8 offset-2">
        @if (session('errors'))
            <div class="alert alert-danger">{{ session('errors') }}</div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card">
            <div class="card-header">Task Status</div>
            <div class="card-body">
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

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Update by</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($activity))
                        @foreach ($activity as $act)
                        <tr>
                            <td>{{ $act->status }}</td>
                            <td>{{ $act->updated_by }}</td>
                            <td>{{ $act->created_at }}</td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="3">No Activity available.</td>
                    </tr>
                    @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection