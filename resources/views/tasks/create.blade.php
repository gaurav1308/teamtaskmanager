@extends('layouts.app')



@section('content')

    <h1>Create Task</h1>
    {!! Form::open(['method'=>'POST','action'=>'TaskController@store2','file'=>true]) !!}

    <div class = "form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>


    <div class = "form-group">
        {!! Form::label('project_id','Project Id:') !!}
        {!! Form::text('project_id',null,['class'=>'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('task_status','Task Status:') !!}
        {!! Form::select('task_status',array(0=>'Yet to be started',1=>'Ongoing',2=>'Completed'),['class'=>'form-control']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Create Task',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {{--    @include('includes.form_error')--}}
@stop
