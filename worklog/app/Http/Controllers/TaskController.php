<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // หน้าแสดงรายการงานทั้งหมด
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // หน้าเพิ่มงานใหม่
    public function create()
    {
        return view('tasks.create');
    }

    // การบันทึกงานใหม่
    public function store(Request $request)
    {
        $request->validate([
            'task_type' => 'required',
            'task_name' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'status' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    // หน้าแก้ไขงาน
    public function edit($id)
    {
        $task = Task::findOrFail($id);  // ดึงข้อมูล Task ที่ต้องการแก้ไข
        return view('tasks.edit', compact('task'));  // ส่งข้อมูล Task ไปที่ฟอร์ม edit
    }

    // Method สำหรับการอัพเดตข้อมูล Task
    public function update(Request $request, $id)
    {
        $request->validate([
            'task_type' => 'required|string',
            'task_name' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'status' => 'required|string',
        ]);

        $task = Task::findOrFail($id);  // ดึงข้อมูล Task ที่ต้องการอัพเดต
        $task->task_type = $request->input('task_type');
        $task->task_name = $request->input('task_name');
        $task->start_time = $request->input('start_time');
        $task->end_time = $request->input('end_time');
        $task->status = $request->input('status');
        $task->updated_at = now();  // อัพเดตเวลาแก้ไข
        $task->save();  // บันทึกการอัพเดต

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // การลบงาน
    // Method สำหรับการลบ Task
public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();  // ลบ Task ที่เลือก
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
}

    // การค้นหางานตามวันที่
    public function search(Request $request)
    {
        $tasks = Task::whereDate('start_time', $request->date)->get();
        return view('tasks.index', compact('tasks'));
    }

    // รายงานสรุปสถานะ
    public function report(Request $request)
    {
        $statusCounts = Task::whereMonth('start_time', $request->month)
                            ->groupBy('status')
                            ->selectRaw('status, count(*) as count')
                            ->get();

        return view('tasks.report', compact('statusCounts'));
    }
}
