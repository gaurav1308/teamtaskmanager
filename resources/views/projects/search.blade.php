

{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Id</th>--}}
{{--            <th>Name</th>--}}
{{--            <th>Status</th>--}}
{{--            <th>Sharing Status</th>--}}
{{--            <th>Created By</th>--}}
{{--            <th>Editing Permissons</th>--}}
{{--            <th>Created</th>--}}
{{--            <th>Updated</th>--}}
{{--            <th>Delete</th>--}}
{{--            <th></th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}


{{--        @if($projects)--}}


{{--            @foreach($projects as $project)--}}

{{--                --}}{{--                {{$role=$project->pivot->role_id}}--}}
{{--                <tr>--}}
{{--                    <td>{{$project->id}}</td>--}}
{{--                    <td><a href='/{{$project->id}}/project'>{{$project->name}}</a></br></td>--}}
{{--                    <td>{{$project->status}}</td>--}}
{{--                    <td>{{$project->shared}}</td>--}}
{{--                    <td>{{$project->created_by}}</td>--}}
{{--                    @if($project->pivot->role_id ==1)--}}
{{--                        <td>--}}
{{--                            <a href='/projects'>Edit</a>--}}
{{--                        </td>--}}
{{--                    @else--}}
{{--                        <td>--}}
{{--                            Don't have editing rights--}}
{{--                        </td>--}}

{{--                    @endif--}}
{{--                    --}}{{--                    <td>{{$project->pivot->role_id ==1  ? "Read and Write":"Read Only"}}</td>--}}
{{--                    <td>{{$project->created_at->diffForHumans()}}</td>--}}
{{--                    <td>{{$project->updated_at->diffForHumans()}}</td>--}}
{{--                    <td>--}}
{{--                        @if($project->pivot->role_id ==1 )--}}
{{--                            <button type="button" onclick="window.location.href='/project/delete/{{$project->id}}'" >Delete</button></td>--}}
{{--                    @endif--}}
{{--                    @if($project->pivot->role_id ==1 && $project->shared=="Public")--}}
{{--                        <td><button type="button" onclick="window.location.href='/project/people/{{$project->id}}'" >Add people</button></td>--}}
{{--                    @endif--}}
{{--                </tr>--}}



{{--            @endforeach--}}
{{--        @endif--}}
{{--        </tbody>--}}
{{--    </table>--}}








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
