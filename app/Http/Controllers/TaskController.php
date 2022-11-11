<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskActivity;
use App\Models\User;

class TaskController extends Controller
{
    /* Manager Operations */
    function getTask(){
        $user = session('username');
        $datas = Task::where(['assign_by'=> $user])->get();
        return view('manager.dashboard', compact('datas'));
    }

    function NewTaskView(){
        $users = User::where(['type'=> 'EMPLOYEE'])->get();
        return view('manager.add_task', compact('users'));
    }

    function assignNewTask(Request $req){
        $user = session('username');

        $req->validate([
            "name"=>"required",
            "due_date"=>"required",
            "assign_to"=>"required",
        ]);

        $task = new Task;
        $task->name = $req->name;
        $task->due_date = date("Y-m-d", strtotime($req->due_date));
        $task->assign_to = $req->assign_to;
        $task->assign_by = $user;
        $task->description = $req->description;
        $task->status = "To Do";
        $sts = $task->save();
        if($sts){
            $task_id = $task->id;
            $ta = new TaskActivity;
            $ta->task_id = $task_id;
            $ta->status = "To Do";
            $ta->updated_by = $user;
            $ta->save();
            return redirect(route('manager_add_task'))->with("status", "Task Added Successfully!");
        }
        else{
            return redirect(route('manager_add_task'))->with("errors", "Failed to Add Task!");
        }
    }

    function editNewTask($id){
        $data = Task::find($id);
        return view('manager.edit_task', compact('data'));
    }

    function updateNewTask(Request $req){
        $user = session('username');

        $req->validate([
            "name"=>"required",
            "due_date"=>"required",
        ]);

        $task = Task::find($req->edit_id);
        $task->name = $req->name;
        $task->due_date = date("Y-m-d", strtotime($req->due_date));
        $task->description = $req->description;
        $sts = $task->save();
        if($sts){
            return redirect(route('manager_dashboard'))->with("status", "Task Updated Successfully!");
        }
        else{
            return redirect(route('manager_dashboard'))->with("errors", "Failed to Update Task!");
        }
    }

    function taskStatus($id){
        $data = Task::find($id);
        $status = ["To Do", "In Progress", "Done"];
        return view('manager.task_status', compact('data', 'status'));
    }

    function taskDetails($id){
        $data = Task::find($id);
        $activity = TaskActivity::where(["task_id"=>$id])->get();
        return view('manager.task_details', compact('data', 'activity'));
    }

    function updateTaskStatus(Request $req){
        $user = session('username');
        $task = Task::find($req->edit_id);
        $task->status = $req->status;
        $sts = $task->save();
        if($sts){
            $ta = new TaskActivity;
            $ta->task_id = $req->edit_id;
            $ta->status = $req->status;
            $ta->updated_by = $user;
            $ta->save();
            return redirect(route('manager_dashboard'))->with("status", "Task Status Updated Successfully!");
        }
        else{
            return redirect(route('manager_dashboard'))->with("errors", "Failed to Update Task Status!");
        }
    }

    function taskDelete(Request $req){
        $task = Task::find($req->delete_id);
        if(!is_null($task)){
            $task->delete();
            $activity = TaskActivity::where('task_id', $req->delete_id);
            if(!is_null($activity)){
                $activity->delete();
            }
            if($req->session('type') == "MANAGER"){
                return redirect(route('manager_dashboard'))->with("status", "Task Status Deleted Successfully!");
            }
            else{
                return redirect(route('employee_dashboard'))->with("status", "Task Status Deleted Successfully!");
            }
        }
        else{
            if($req->session('type') == "MANAGER"){
                return redirect(route('manager_dashboard'))->with("errors", "Task Status Failed to Delete!");
            }
            else{
                return redirect(route('employee_dashboard'))->with("errors", "Task Status Failed to Delete!");
            }
        }
    }


    /* Employee Operations */
    function getEmpTask(){
        $user = session('username');
        $datas = Task::where('assign_by', $user)->orWhere("assign_to",$user)->get();
        return view('employee.dashboard', compact('datas'));
    }

    function NewEmpTaskView(){
        return view('employee.add_task');
    }

    function assignEmpNewTask(Request $req){
        $user = session('username');

        $req->validate([
            "name"=>"required",
            "due_date"=>"required"
        ]);

        $task = new Task;
        $task->name = $req->name;
        $task->due_date = date("Y-m-d", strtotime($req->due_date));
        $task->assign_to = $user;
        $task->assign_by = $user;
        $task->description = $req->description;
        $task->status = "To Do";
        $sts = $task->save();
        if($sts){
            $task_id = $task->id;
            $ta = new TaskActivity;
            $ta->task_id = $task_id;
            $ta->status = "To Do";
            $ta->updated_by = $user;
            $ta->save();
            return redirect(route('employee_add_task'))->with("status", "Task Added Successfully!");
        }
        else{
            return redirect(route('employee_add_task'))->with("errors", "Failed to Add Task!");
        }
    }

    function editEmpNewTask($id){
        $data = Task::find($id);
        return view('employee.edit_task', compact('data'));
    }

    function updateEmpNewTask(Request $req){
        $user = session('username');

        $req->validate([
            "name"=>"required",
            "due_date"=>"required",
        ]);

        $task = Task::find($req->edit_id);
        $task->name = $req->name;
        $task->due_date = date("Y-m-d", strtotime($req->due_date));
        $task->description = $req->description;
        $sts = $task->save();
        if($sts){
            return redirect(route('employee_dashboard'))->with("status", "Task Updated Successfully!");
        }
        else{
            return redirect(route('employee_dashboard'))->with("errors", "Failed to Update Task!");
        }
    }

    function taskEmpStatus($id){
        $data = Task::find($id);
        $status = ["To Do", "In Progress", "Done"];
        return view('employee.task_status', compact('data', 'status'));
    }

    function taskEmpDetails($id){
        $data = Task::find($id);
        $activity = TaskActivity::where(["task_id"=>$id])->get();
        return view('employee.task_details', compact('data', 'activity'));
    }

    function updateEmpTaskStatus(Request $req){
        $user = session('username');
        $task = Task::find($req->edit_id);
        $task->status = $req->status;
        $sts = $task->save();
        if($sts){
            $ta = new TaskActivity;
            $ta->task_id = $req->edit_id;
            $ta->status = $req->status;
            $ta->updated_by = $user;
            $ta->save();
            return redirect(route('employee_dashboard'))->with("status", "Task Status Updated Successfully!");
        }
        else{
            return redirect(route('employee_dashboard'))->with("errors", "Failed to Update Task Status!");
        }
    }

}
