@extends('layouts.app')
@section('contents')
    <p>Confirm Account Details</p>
@endsection
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Confirm Account details</div>
            <div class="panel-body">
                @if(isset($errors))
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endForeach
                            </ul>

                        </div>
                    @endIf
                @endIf
            </div>
        </div>

    </div>

@endsection