@extends('base')

@section('title')
    Home
@endsection

@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

    <div class="container">
  <div class="row">
    <!-- <div class="col-1">
    </div> -->
    <div class="col-7">
    <div class="card border-secondary mb-3">
  <div class="card-header"><h3>{{ $user->name }}</h2></div>
  <div class="card-body">
    <p class="card-text"> Your house <b>{{ $user->house->house_name }}</b> has {{ count($user->house->tasks) }} tasks.</p>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card border-warning mb-3">
  <div class="card-header"><h3></h4><h5>Upcoming Tasks</h5></div>
  <div class="card-body">
    <p class="card-text">
        <ol>
            @foreach($user->house->tasks as $task)
                <li class="pt-2"><h5>{{ $task->task_name }}</h5>
                    <p>{{ $task->task_description }}</p></li>
            @endforeach
        </ol>
  </div>
</div>
    </div>
  </div>

    </div>
    </div>

    

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    Your house <b>{{ $user->house->house_name }}</b> has {{ count($user->house->tasks) }} task.
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
