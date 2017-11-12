@extends('dashboard.layout')
@section('title')
    Fundafarm.NG | Invest in a farm
@endsection

@section('content')
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row top_tiles">
            <div class="col-md-5 col-sm-5 col-xs-6 bbb">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($message)
                            <div class="">
                                {{$message}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
