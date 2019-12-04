<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $user_id = $request->header('authentication');
        return Task::where('user_id',$user_id)->get();
    }

    public function show($id)
    {
        return Task::find($id);
    }

    public function store(Request $request)
    {
        return Task::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());

        return $task;
    }

    public function delete(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return 204;
    }
}
