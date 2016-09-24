@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <h1>Employee <a href="{{ url('/employee/create') }}" class="btn btn-primary btn-xs"
                        title="Add New Employee"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
        </h1>

        <div class="table">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>S.No<a href="{{ url('/employee/id') }}" class="btn btn-primary btn-xs"
                               title="Sort By ID"><span class="glyphicon glyphicon-sort"
                                                        aria-hidden="true"></span></a></th>
                    <th> Name<a href="{{ url('/employee/name') }}" class="btn btn-primary btn-xs"
                                title="Sort By Name"><span class="glyphicon glyphicon-sort"
                                                           aria-hidden="true"></span></a></th>
                    <th> Age<a href="{{ url('/employee/age') }}" class="btn btn-primary btn-xs"
                               title="Sort By Age"><span class="glyphicon glyphicon-sort"
                                                         aria-hidden="true"></span></a></th>
                    <th> StartDate<a href="{{ url('/employee/startDate') }}" class="btn btn-primary btn-xs"
                                     title="Sort By StartDate"><span class="glyphicon glyphicon-sort"
                                                                     aria-hidden="true"></span></a></th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employee as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item->startDate }}</td>
                        <td>
                            <a href="{{ url('/employee/' . $item->id) }}" class="btn btn-success btn-xs"
                               title="View Employee"><span class="glyphicon glyphicon-eye-open"
                                                           aria-hidden="true"></span></a>
                            <a href="{{ url('/employee/' . $item->id . '/edit') }}"
                               class="btn btn-primary btn-xs" title="Edit Employee"><span
                                        class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/employee', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Employee" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Employee',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper">
                <div class="pagination-wrapper"> {!! $employee->render() !!}</div>

            </div>
        </div>

    </div>
@endsection
