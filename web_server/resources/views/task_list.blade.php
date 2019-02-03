@extends('base')

@section('title')
    Tasks
@endsection

@section('content')
    @foreach ($tasks as $task)
        <div class="card border-primary mt-3">
            <h5 class="card-header text-center">{{ $task->task_name }}</h5>
            <div class="card-body p-0">
                <table class="table table-hover m-0">
                    <tbody>
                        @foreach ($task->completed as $completed_task)
                            <tr>
                                <th scope="row">{{ $completed_task->user->name }}</th>
                                <td>Tuesday 29 January</td>
                                <td>11:47</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endsection
