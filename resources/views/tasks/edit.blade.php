@extends('layouts.app')



@section('content')

    <h1>Edit Task</h1>
    {!! Form::model($task,['method'=>'PUT','action'=>['TaskController@update',$task->id],'file'=>true]) !!}

    <div class = "form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>


    <div class = "form-group">
        {!! Form::label('task_status','Task Status:') !!}
        {!! Form::select('task_status',array('Yet to be started'=>'Yet to be started','Ongoing'=>'Ongoing','Completed'=>'Completed'),['class'=>'form-control']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Edit Task',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {{--    @include('includes.form_error')--}}
@stop

