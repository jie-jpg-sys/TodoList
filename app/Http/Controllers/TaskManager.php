<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskManager extends Controller
{
    function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view("todo", compact('tasks'));
    }

    function addtask(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'task' => $request->description
        ]);

        return redirect()->route('home');
    }

    function delete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect()->route('home');
    }

    function complete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->status = 'completed';
            $task->save();
        }
        return redirect()->route('home');
    }
}
