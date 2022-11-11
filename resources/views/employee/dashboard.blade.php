@extends('employee.content')

@section('title')
Employee Dashboard
@endsection

@section('main_content')

<div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        @if (session('errors'))
            <div class="alert alert-danger">{{ session('errors') }}</div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card">
            <div class="card-header">Assign Task Details</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Due Date</th>
                            <th>Assigned To</th>
                            <th>Assigned By</th>
                            <th>Assigned Date</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $i=1;
                    @endphp
                    @if(isset($datas))
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->due_date }}</td>
                            <td>{{ $data->assign_to }}</td>
                            <td>{{ $data->assign_by }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                <a href="{{ route('employee_task_status', ['id'=>$data->id]) }}" class="btn btn-warning btn-sm">{{ $data->status }}</a>
                            </td>
                            <td>
                                <a href="{{ route('employee_edit_new_task', ['id'=>$data->id]) }}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('manager_task_delete') }}" method="POST" onsubmit="return confirm('Do you want to delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="delete_id" value="{{ $data->id }}">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('employee_task_details', ['task_id'=>$data->id]) }}" class="btn btn-primary btn-sm">View</a>
                            </td>
                                
                        </tr>
                        @endforeach
                    @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection