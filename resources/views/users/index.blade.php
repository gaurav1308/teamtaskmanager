@extends ("layouts.app")



@section('content')


    @foreach($user->projects as $project)
        <a href='/{{$project->id}}/project'>{{$project->name}}</a></br>

    @endforeach

@stop