@extends('layouts.default')

@section('title')
    Todo List
@endsection

@section('header')

@endsection

@section('main')
    <div class="todo-card">
        <div class="todo-header">
            <h2>Todo List</h2>
        </div>
    </div>
    <div class="todo-container">
        <div class="todo-form">
            <form action="{{ route('task.add') }}" method="post" class="d-flex flex-column align-items-center gap-3">
                @csrf
                <div class="form-group m-3">
                    <!-- <label for="title" class="title">Title</label> -->
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                </div>
                <div class="form-group m-3">
                    <!-- <label for="task" class="task">Task</label> -->
                    <textarea class="form-control" name="description" rows="3" placeholder="Task" required></textarea>
                </div>
                <div class="m-3">
                    <button type="submit" name="addtask" class="btn btn-primary border rounded-5 px-4">Add
                        Task</button>
                </div>
            </form>
        </div>
    </div>
    <div class="list-container mt-7 flex-column align-items-center">
        <div class="list-container mt-7 flex-column align-items-center">
            <table class="table" style="border: none; width: 100%; max-width: 800px;">
                <thead>
                    <tr style="border-bottom: 2px solid #ddd;">
                        <th style="border: none; text-align: left; padding: 10px;">Title</th>
                        <th style="border: none; text-align: left; padding: 10px;">Task</th>
                        <th style="border: none; text-align: center; padding: 10px;">CreateDate</th>
                        <th style="border: none; text-align: center; padding: 10px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr style="border: none;">
                            <td style="border: none; text-align: left; padding: 10px;">
                                <strong
                                    class="{{ $task->status == 'completed' ? 'text-decoration-line-through text-muted' : '' }}">
                                    {{ $task->title }}
                                </strong>
                            </td>
                            <td style="border: none; text-align: left; padding: 10px;">
                                <span
                                    class="{{ $task->status == 'completed' ? 'text-decoration-line-through text-muted' : '' }}">
                                    {{ $task->task }}
                                </span>
                            </td>
                            <td style="border: none; text-align: center; padding: 10px;">
                                <span class="text-muted small">{{ $task->created_at }}</span>
                            </td>
                            <td style="border: none; text-align: center; padding: 10px;">
                                <div class="d-flex justify-content-center gap-2">
                                    @if($task->status != 'completed')
                                        <form action="{{ route('task.complete', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success border rounded-5 btn-sm"
                                                id="completed">Completed</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger border rounded-5 btn-sm"
                                            id="delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')

@endsection