@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Edit Employee {{ $employee->id }}</h1>

        {!! Form::model($employee, [
            'method' => 'PATCH',
            'url' => ['/employee', $employee->id],
            'class' => 'form-horizontal',
            'files' => true
        ]) !!}
            {{csrf_field()}}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
            {!! Form::label('age', 'Age', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::number('age', null, ['class' => 'form-control']) !!}
                {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('startDate') ? 'has-error' : ''}}">
            {!! Form::label('startDate', 'Startdate', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::date('startDate', null, ['class' => 'form-control']) !!}
                {!! $errors->first('startDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('departmentId') ? 'has-error' : ''}}">
            {!! Form::label('departmentId', 'Departmentid', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::number('departmentId', null, ['class' => 'form-control']) !!}
                {!! $errors->first('departmentId', '<p class="help-block">:message</p>') !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </div>
@endsection