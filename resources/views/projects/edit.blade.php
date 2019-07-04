@extends('layouts.app')



@section('content')

    <h1>Edit Project</h1>
    {!! Form::open(['method'=>'PATCH','action'=>['ProjectController@update'$project->id],'file'=>true]) !!}

    <div class = "form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class = "form-group">
        {!! Form::label('status','Project Status:') !!}
        {!! Form::select('status',array(0=>'Yet to be started',1=>'Ongoing',2=>'Completed'),['class'=>'form-control']) !!}
    </div>
    <div class = "form-group">
        {!! Form::label('shared','Sharing Status:') !!}
        {!! Form::select('shared',array(0=>'Public',1=>'Private'),0,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Project',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {{--    @include('includes.form_error')--}}
@stop
