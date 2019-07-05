@extends('layouts.app')



@section('content')

    <h1>Edit Project</h1>
    {!! Form::model($project,['method'=>'PUT','action'=>['ProjectController@update',$project->id],'file'=>true]) !!}

    <div class = "form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class = "form-group">
        {!! Form::label('status','Project Status:') !!}
        {!! Form::select('status',array('Yet to be started'=>'Yet to be started','Ongoing'=>'Ongoing','Completed'=>'Completed'),['class'=>'form-control']) !!}
    </div>
    <div class = "form-group">
        {!! Form::label('shared','Sharing Status:') !!}
        {!! Form::select('shared',array('Public'=>'Public','Private'=>'Private'),['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Project',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {{--    @include('includes.form_error')--}}
@stop
