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
        $tasks = $user->tasks;

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

        return back();
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect('tasks');
    }
}
