<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('due_date')) {
            $query->whereDate('due_date', $request->input('due_date'));
        }

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        $tasks = $query->paginate(10);

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks found matching the criteria.'], 404);
        }

        return response()->json($tasks);
    }

    // Get a specific task
    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found.'], 404);
        }
        return response()->json($task);
    }

    // Create a new task
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tasks|max:255',
            'description' => 'nullable',
            'due_date' => 'required|date|after:today',
            'status' => 'nullable|in:pending,completed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the new task
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status ?? 'pending',
        ]);

        return response()->json(['message' => 'Task created successfully.', 'task' => $task,], 201);
    }

    // Update a task
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|unique:tasks,title,' . $task->id . '|max:255',
            'description' => 'sometimes|nullable',
            'due_date' => 'sometimes|required|date|after:today',
            'status' => 'sometimes|nullable|in:pending,completed',
        ]);

        if ($request->has('title') && $request->input('title') === '') {
            return response()->json(['message' => 'Title cannot be empty.'], 422);
        }

        if ($request->has('due_date') && $request->input('due_date') === '') {
            return response()->json(['message' => 'Due date cannot be empty.'], 422);
        }

        if ($request->has('status') && $request->input('status') === '') {
            return response()->json(['message' => 'Status cannot be empty.'], 422);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $task->update($request->only(['title', 'description', 'due_date', 'status']));

        return response()->json(['success' => true, 'message' => 'Task updated successfully.', 'task' => $task], 200);
    }


    // Delete a task
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return response()->json(['message' => 'Task deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Task not found.'], 404);
        }
    }
}
