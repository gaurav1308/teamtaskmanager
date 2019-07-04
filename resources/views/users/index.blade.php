@extends ("layouts.app")



@section('content')

    <h1>{{$user->name}} , Your projects are:</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Status</th>
            <th>Sharing Status</th>
            <th>Created By</th>
            <th>Editing Permissons</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Delete</th>
            <th></th>
        </tr>
        </thead>
        <tbody>


        @if($user->projects)


            @foreach($user->projects as $project)

{{--                {{$role=$project->pivot->role_id}}--}}
                <tr>
                    <td>{{$project->id}}</td>
                    <td><a href='/{{$project->id}}/project'>{{$project->name}}</a></br></td>
                    <td>{{$project->status}}</td>
                    <td>{{$project->shared}}</td>
                    <td>{{$project->created_by}}</td>
                    @if($project->pivot->role_id ==1)
                        <td>
                            <a href='/projects'>Edit</a>
                        </td>
                    @else
                        <td>
                            Don't have editing rights
                        </td>

                    @endif
{{--                    <td>{{$project->pivot->role_id ==1  ? "Read and Write":"Read Only"}}</td>--}}
                    <td>{{$project->created_at->diffForHumans()}}</td>
                    <td>{{$project->updated_at->diffForHumans()}}</td>
                    <td>
                        @if($project->pivot->role_id ==1 )
{{--                            <i class="btn btn-danger"> Delete Delete</i>--}}
                        <button type="button" onclick="window.location.href='/project/delete/{{$project->id}}'" >Delete</button></td>
                        @endif
                @if($project->pivot->role_id ==1 && $project->shared=="Public")
                    <td><button type="button" onclick="window.location.href='/project/people/{{$project->id}}'" >Add people</button></td>
                    @endif
                    </tr>



            @endforeach
        @endif
        </tbody>
    </table>

    <button type="button" onclick="window.location.href='/create_project'" >Create new project</button>

@stop