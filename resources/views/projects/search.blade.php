






@extends ('layouts.app')



@section('content')

{{--    <h1>Tasks in {{$project->name}}</h1>--}}


<div class="container">

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created By</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>


        @if($tasks)


            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->created_by}}</td>
                    <td>{{$task->task_status}}</td>
                    <td>{{$task->created_at->diffForHumans()}}</td>
                    <td>{{$task->updated_at->diffForHumans()}}</td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>


</div>

@stop
