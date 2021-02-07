<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks()->paginate(6);



        return view('layouts.tasks', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'task' => 'required'
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'task' => $request->task
        ]);

        return back()->with('status_success', 'Task added Sucesfully !');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect('tasks')->with('status_success', 'Task deleted Sucesfully !');
    }


    public function complete($id)
    {
        $t = Task::find($id);
        $t->completed = true;
        $t->save();
        return back();
    }
}
