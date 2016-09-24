@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Main Page</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="employee" >
                            <input class="btn btn-primary form-control" type="submit" value="Employee">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection