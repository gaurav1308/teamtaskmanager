@extends ("layouts.app")



@section('content')


    @foreach($project->tasks as $task)

        {{$task->name}}</br>

    @endforeach

@stop
