@extends('base')

@section('title')
    Tasks
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">

    @foreach ($tasks as $task)
        <div class="card border-primary mt-3">
            <h5 class="card-header text-center">{{ $task->task_name }}</h5>
            <div class="card-body p-0">
                <table class="table table-hover m-0">
                    <tbody>
                        @foreach ($task->completed as $completed_task)
                            <tr>
                                <th scope="row">{{ $completed_task->user->name }}</th>
                                <td>
                                    {{ $completed_task->created_at->diffforhumans() }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $completed_task->created_at)->format('F j, Y') }} at {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $completed_task->created_at)->format('H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    </div>
</div>
@endsection
