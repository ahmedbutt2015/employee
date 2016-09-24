@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Employee {{ $employee->id }}
            <a href="{{ url('employee/' . $employee->id . '/edit') }}" class="btn btn-primary btn-xs"
               title="Edit Employee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['employee', $employee->id],
                'style' => 'display:inline'
            ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Employee',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
            {!! Form::close() !!}
        </h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $employee->id }}</td>
                </tr>
                <tr>
                    <th> Name</th>
                    <td> {{ $employee->name }} </td>
                </tr>
                <tr>
                    <th> Age</th>
                    <td> {{ $employee->age }} </td>
                </tr>
                <tr>
                    <th> StartDate</th>
                    <td> {{ $employee->startDate }} </td>
                </tr>
                <tr>
                    <th> Department Name</th>
                    <td> {{ $department->name}} </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
