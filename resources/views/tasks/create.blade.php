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
        {!! Form::select('project_id',array($id => $id),['class'=>'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('task_status','Task Status:') !!}
        {!! Form::select('task_status',array('Yet to be started'=>'Yet to be started','Ongoing'=>'Ongoing','Completed'=>'Completed'),['class'=>'form-control']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Create Task',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {{--    @include('includes.form_error')--}}
@stop
