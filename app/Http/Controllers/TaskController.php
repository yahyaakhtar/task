<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::when($request->project_id, function ($query) use ($request) {
            return $query->where('project_id', $request->project_id);
        })->orderBy('priority')->get();

        $projects = Project::all();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'name' => $request->name,
            'priority' => Task::max('priority') + 1, // auto increment priority
            'project_id' => $request->project_id,
        ]);
        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'name' => $request->name,
            'priority' => $request->priority,
        ]);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }
        return response()->json(['success' => true]);
        // return response()->json(['success' => true, 'order' => $request->order]);
    }

    public function delete($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete(); 
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Task not found']);
    }

}
