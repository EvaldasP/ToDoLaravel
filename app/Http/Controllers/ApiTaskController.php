<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Validator;
use App\Models\Task;


class ApiTaskController extends Controller
{

    public function index()
    {
        return \App\Models\Task::all();
    }


    public function store(Request $request)
    {

        $data = $request->json()->all();

        $rules = [
            'user_id' => 'required',
            'task' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            $task = new Task();
            $task->task = $data['task'];
            $task->user_id = $data['user_id'];
            return ($task->save() !== 1) ?
                response()->json(['success' => 'success'], 201) :
                response()->json(['error' => 'saving to database was not successful'], 500);
        } else {
            return $validator->errors()->all();
        }
    }


    public function destroy($id)
    {
        return (Task::destroy($id) == 1) ?
            response()->json(['success' => 'success'], 200) :
            response()->json(['error' => 'deleting from database was not successful'], 500);
    }


    public function show($id)
    {
        return Task::find($id);
    }
}
