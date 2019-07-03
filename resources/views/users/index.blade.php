@extends ("layouts.app")



@section('content')

    <h1>{{$user->name}} , Your on going projects are:</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Status</th>
            <th>Sharing Status</th>
            <th>Created By</th>
            <th>Permissons</th>
            {{--            <th>Created</th>--}}
            {{--            <th>Updated</th>--}}
        </tr>
        </thead>
        <tbody>


        @if($user->projects)


            @foreach($user->projects as $project)

{{--                $role={{$project->pivot->role_id}}--}}
                <tr>
                    <td>{{$project->id}}</td>
                    <td><a href='/{{$project->id}}/project'>{{$project->name}}</a></br></td>
                    <td>{{$project->status}}</td>
                    <td>{{$project->shared}}</td>
                    <td>{{$project->created_by}}</td>
                    <td>{{$project->pivot->role_id}}</td>
                    {{--                    <td>{{$task->created_at->diffForHumans()}}</td>--}}
                    {{--                    <td>{{$task->updated_at->diffForHumans()}}</td>--}}

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <button type="button" onclick="window.location.href='/create_project'" >Create new project</button>

@stop