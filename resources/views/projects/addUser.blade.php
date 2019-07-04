@extends('layouts.app')



@section('content')

    <h1>Add User</h1>
    {!! Form::open(['method'=>'POST','action'=>'ProjectController@store2','file'=>true]) !!}

    <div class = "form-group">
        {!! Form::label('user_id','UserId') !!}
        {!! Form::text('user_id',null,['class'=>'form-control']) !!}
    </div>


    <div class = "form-group">
        {!! Form::label('project_id','Project Id:') !!}
        {!! Form::select('project_id',array($id=>$id),['class'=>'form-control']) !!}

    </div>


    <div class = "form-group">
        {!! Form::label('role_id','Editing Rights:') !!}
        {!! Form::select('role_id',array(1=>'Read and Write',2=>'Read Only'),2,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {{--    @include('includes.form_error')--}}
@stop
