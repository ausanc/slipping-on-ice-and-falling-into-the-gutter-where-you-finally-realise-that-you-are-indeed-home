@extends('base')

@section('title')
    Home
@endsection

@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="card border-secondary mb-3">
                        <div class="card-header">
                            <h3>{{ $user->name }}</h3></div>
                        <div class="card-body">
                            <p class="card-text"> Your house <b>{{ $house->house_name }}</b> has <a href="{{ route('my_house') }}">{{ count($house->tasks) }} tasks</a>.</p>
                        </div>
                    </div>

                    <div class="card border-success mb-3">
                        <div class="card-header">
                            <h4>Add a New Task</h4>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('new_task') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="task_name" class="col-md-4 col-form-label text-md-right">Task Name</label>

                                    <div class="col-md-6">
                                        <input id="task_name" type="text" class="form-control" name="task_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Task Description</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-warning mb-3">
                        <div class="card-header">
                            <h3>Upcoming Tasks</h3>
                        </div>

                        <div class="card-body">
                            <p class="card-text">
                                <ol>
                                    @foreach($house->tasks as $task)
                                        <li><h5><a href="{{ url('/tasks/'.$task->id) }}">{{ $task->task_name }}</a></h5>
                                            <p>{{ $task->task_description }}</p></li>
                                    @endforeach
                                </ol>
                            </p>
                        </div>
                    </div>

                     <div class="card border-secondary mb-3">
                        <div class="card-header"><h3>Members of your House</h3></div>
                            <div class="card-body">
                                <p class="card-text">
                                    <ul>
                                        @foreach($house->users as $user)
                                            <li>
                                                <p>{{ $user->name }}</p>
                                            </li>
                                        @endforeach
                                    </p>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
