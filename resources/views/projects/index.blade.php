@extends ('layouts.app')



@section('content')

    <h1>Tasks in {{$project->name}}</h1>





    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created By</th>
{{--            <th>Created</th>--}}
{{--            <th>Updated</th>--}}
        </tr>
        </thead>
        <tbody>


        @if($project->tasks)


            @foreach($project->tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->created_by}}</td>
{{--                    <td>{{$task->created_at->diffForHumans()}}</td>--}}
{{--                    <td>{{$task->updated_at->diffForHumans()}}</td>--}}

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
{{--    @foreach($project->tasks as $task)--}}

{{--        {{$task->name}}--}}
{{--    </br>--}}
{{--        <pre class="tab"></pre>--}}
{{--        <button type="button" onclick="window.location.href='/edit'" >edit</button></br>--}}
{{--        </br>--}}

{{--    @endforeach--}}
    <button type="button" onclick="window.location.href='/create_project'" >Add a new task</button>
@stop
