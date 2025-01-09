<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
</head>
<body>
    <h1>Create New Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="task_type">Task Type:</label>
        <input type="text" name="task_type" id="task_type"><br>

        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" id="task_name"><br>

        <label for="start_time">Start Time:</label>
        <input type="datetime-local" name="start_time" id="start_time"><br>

        <label for="end_time">End Time:</label>
        <input type="datetime-local" name="end_time" id="end_time"><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select><br>

        <button type="submit">Save Task</button>
    </form>
</body>
</html>
