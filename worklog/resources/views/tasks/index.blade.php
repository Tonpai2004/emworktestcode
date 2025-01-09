<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1>Task List</h1>
        
        <!-- แสดงข้อความสำเร็จหรือข้อผิดพลาด -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- ลิงก์ไปยังหน้าสร้างงานใหม่ -->
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

        <!-- ฟอร์มค้นหาตามวันที่ -->
        <form action="{{ route('tasks.search') }}" method="GET" class="mb-4">
            <input type="date" name="date" class="form-control d-inline-block w-auto" />
            <button type="submit" class="btn btn-info">Search</button>
        </form>

        <!-- ตารางแสดง Task -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->task_type }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->start_time)->format('Y-m-d H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->end_time)->format('Y-m-d H:i') }}</td>
                    <td>
                        <!-- ปุ่มแก้ไข -->
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- ฟอร์มลบ -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- เพิ่มสคริปต์เพื่อให้ฟอร์มสามารถใช้งานได้ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
