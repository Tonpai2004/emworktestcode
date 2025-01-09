@foreach ($worklogs as $worklog)
    <div>{{ $worklog->task_name }} - {{ $worklog->status }}</div>
@endforeach
