@extends('base')

@section('title')
    Tasks
@endsection

@section('content')
<div class="row">
    <marquee behavior="alternate" direction=""><div class="col-md-6">

    @foreach ($tasks as $task)
        <div class="card border-primary mt-3">
            <marquee behavior="alternate" direction=""><h5 class="card-header text-center">{{ $task->task_name }}</h5></marquee>
            <div class="card-body p-0">
                <table class="table table-hover m-0">
                    <marquee behavior="alternate" direction="">{{ $task->task_description }}</marquee>
                    <tbody>
                        @foreach ($task->completed as $completed_task)
                            <tr>
                                <th scope="row"><marquee behavior="alternate" direction=""><marquee behavior="" direction="up" height=20>{{ $completed_task->user->name }}</marquee></marquee></th>
                                <td>
                                    <marquee behavior="alternate" direction=""><marquee behavior="" direction="down" height=20>{{ $completed_task->created_at->diffforhumans() }}</marquee></marquee>
                                </td>
                                <td>
                                    <marquee behavior="alternate" direction=""><marquee behavior="alternate" direction="up" height=20>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $completed_task->created_at)->format('F j, Y') }} at {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $completed_task->created_at)->format('H:i') }}</marquee></marquee>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    </div></marquee>
</div>
@endsection
