<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="task_type">Task Type:</label>
        <input type="text" name="task_type" id="task_type" value="{{ $task->task_type }}"><br>

        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" id="task_name" value="{{ $task->task_name }}"><br>

        <label for="start_time">Start Time:</label>
        <input type="datetime-local" name="start_time" id="start_time" value="{{ $task->start_time->format('Y-m-d\TH:i') }}"><br>

        <label for="end_time">End Time:</label>
        <input type="datetime-local" name="end_time" id="end_time" value="{{ $task->end_time->format('Y-m-d\TH:i') }}"><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="in_progress" @if($task->status == 'in_progress') selected @endif>In Progress</option>
            <option value="completed" @if($task->status == 'completed') selected @endif>Completed</option>
            <option value="cancelled" @if($task->status == 'cancelled') selected @endif>Cancelled</option>
        </select><br>

        <button type="submit">Update Task</button>
    </form>
</body>
</html>
