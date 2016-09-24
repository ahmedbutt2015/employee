@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Department {{ $department->id }}
            <a href="{{ url('department/' . $department->id . '/edit') }}" class="btn btn-primary btn-xs"
               title="Edit Department"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['department', $department->id],
                'style' => 'display:inline'
            ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Department',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
            {!! Form::close() !!}
        </h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $department->id }}</td>
                </tr>
                <tr>
                    <th> Name</th>
                    <td> {{ $department->name }} </td>
                </tr>
                <tr>
                    <th> Location</th>
                    <td> {{ $department->location }} </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                <tr>
                    <th>Employee List of this Department</th>

                </tr>
                <tr>
                    <th> Name</th>
                    <th> Age</th>
                    <th> StartDate</th>

                </tr>
                @foreach($department->employee as $employee)

                    <tr>
                        <td> {{ $employee->name }} </td>
                        <td> {{ $employee->age }} </td>
                        <td> {{ $employee->startDate }} </td>

                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
