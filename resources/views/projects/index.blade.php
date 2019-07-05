@extends ('layouts.app')



@section('content')

    <h1>Tasks in {{$project->name}}</h1>




    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created By</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>


        @if($project->tasks)


            @foreach($project->tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->created_by}}</td>
                    <td>{{$task->task_status}}</td>
                    <td>{{$task->created_at->diffForHumans()}}</td>
                    <td>{{$task->updated_at->diffForHumans()}}</td>
{{--                    @if({{\Illuminate\Support\Facades\Auth::user()->}})--}}
                    @if($role_id==1)
                            <td><button type="button" onclick="window.location.href='/task/delete/{{$task->id}}'" >Delete</button></td>
                            <td><button type="button" onclick="window.location.href='/task/edit/{{$task->id}}'" >Edit</button></td>

                    @endif
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @if($role_id==1)
        {!! Form::open(['method'=>'post','action'=>['TaskController@create1',$project->id],'file'=>true]) !!}
        <div class="form-group">
        {!! Form::submit('Create Task',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    @endif
@stop
