@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('flash_message'))
            <div class="alert alert-info">{{ Session::get('flash_message') }}</div>
        @endif
        {{--@sortablelink('name')--}}

        <h1>Department <a href="{{ url('/department/create') }}" class="btn btn-primary btn-xs"
                          title="Add New Department"><span class="glyphicon glyphicon-plus"
                                                           aria-hidden="true"></span></a>
        </h1>

        <div class="table">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>S.No<a href="{{ url('/departmentSort/id') }}" class="btn btn-primary btn-xs"
                               title="Sort By ID"><span class="glyphicon glyphicon-sort"
                                                        aria-hidden="true"></span></a>
                    </th>
                    <th> Name<a href="{{ url('/departmentSort/name') }}" class="btn btn-primary btn-xs"
                                title="Sort By NAME"><span class="glyphicon glyphicon-sort"
                                                           aria-hidden="true"></span></a>
                    </th>
                    <th> Location<a href="{{ url('/departmentSort/location') }}" class="btn btn-primary btn-xs"
                                    title="Sort By LOCATION"><span class="glyphicon glyphicon-sort"
                                                                   aria-hidden="true"></span></a>
                    </th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($department as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->location }}</td>
                        <td>
                            <a href="{{ url('/department/' . $item->id) }}" class="btn btn-success btn-xs"
                               title="View Department"><span class="glyphicon glyphicon-eye-open"
                                                             aria-hidden="true"></span></a>
                            <a href="{{ url('/department/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"
                               title="Edit Department"><span class="glyphicon glyphicon-pencil"
                                                             aria-hidden="true"></span></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/department', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Department" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Department',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pagination-wrapper"> {!! $department->links()  !!} </div>
        </div>

    </div>

@endsection
