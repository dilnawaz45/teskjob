<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(session()->has('username') && session()->has('password') && session()->has('type')){
        if(session('type') == "MANAGER"){
            return redirect(route('manager_dashboard'));
        }
        else{
            return redirect(route('employee_dashboard'));
        }
    }
    else{
        return view('manager_login');
    }
})->name('manager_login');

Route::post('/manager_login', [LoginController::class, 'manager_login'])->name('manager_login_process');

Route::get('/emp_login', function () {
    if(session()->has('username') && session()->has('password') && session()->has('type')){
        if(session('type') == "MANAGER"){
            return redirect(route('manager_dashboard'));
        }
        else{
            return redirect(route('employee_dashboard'));
        }
    }
    else{
        return view('employee_login');
    }
})->name('employee_login');
Route::post('/emp_login', [LoginController::class, 'employee_login'])->name('emp_login_process');

/* Manager Routes */
Route::get('/dashboard', [TaskController::class, 'getTask'])->name('manager_dashboard')->middleware('customAuth');
Route::get('/add_task', [TaskController::class, 'NewTaskView'])->name('manager_add_task')->middleware('customAuth');
Route::post('/add_task', [TaskController::class, 'assignNewTask'])->name('manager_add_new_task')->middleware('customAuth');
Route::get('/edit_task/{id}', [TaskController::class, 'editNewTask'])->name('manager_edit_new_task')->middleware('customAuth');
Route::post('/update_task', [TaskController::class, 'updateNewTask'])->name('manager_update_new_task')->middleware('customAuth');
Route::get('/task_status/{id}', [TaskController::class, 'taskStatus'])->name('manager_task_status')->middleware('customAuth');
Route::post('/update_task_status', [TaskController::class, 'updateTaskStatus'])->name('manager_update_task_status')->middleware('customAuth');
Route::get('/task_details/{task_id}', [TaskController::class, 'taskDetails'])->name('manager_task_details')->middleware('customAuth');
Route::delete('/task_deletes', [TaskController::class, 'taskDelete'])->name('manager_task_delete')->middleware('customAuth');

/* Employee Routes */
Route::get('/emp_dashboard', [TaskController::class, 'getEmpTask'])->name('employee_dashboard')->middleware('customAuth');
Route::get('/add_emp_task', [TaskController::class, 'NewEmpTaskView'])->name('employee_add_task')->middleware('customAuth');
Route::post('/add_emp_task', [TaskController::class, 'assignEmpNewTask'])->name('employee_add_new_task')->middleware('customAuth');
Route::get('/edit_emp_task/{id}', [TaskController::class, 'editEmpNewTask'])->name('employee_edit_new_task')->middleware('customAuth');
Route::post('/update_emp_task', [TaskController::class, 'updateEmpNewTask'])->name('employee_update_new_task')->middleware('customAuth');
Route::get('/emp_task_status/{id}', [TaskController::class, 'taskEmpStatus'])->name('employee_task_status')->middleware('customAuth');
Route::post('/update_emp_task_status', [TaskController::class, 'updateEmpTaskStatus'])->name('employee_update_task_status')->middleware('customAuth');
Route::get('/emp_task_details/{task_id}', [TaskController::class, 'taskEmpDetails'])->name('employee_task_details')->middleware('customAuth');

Route::get('/logout', function () {
    if(session()->has('username')) session()->forget('username');
    if(session()->has('password')) session()->forget('password');
    if(session()->has('type')){
        $type = session('type');
        session()->forget('type');
    }

    if(isset($type) && $type == "EMPLOYEE"){
        return redirect(route('employee_login'));
    }
    else{
        return redirect(route('manager_login'));
    }
})->name('logout');