@extends('layouts.app')



@section('content')

    <h1>Create Project</h1>
    {!! Form::open(['method'=>'POST','action'=>'ProjectController@store','file'=>true]) !!}

    <div class = "form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>


    {!! FOrm::close() !!}


    @include('includes.form_error')
@stop
