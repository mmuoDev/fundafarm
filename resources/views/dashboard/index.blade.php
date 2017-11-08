@extends('dashboard.layout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>
                    <div class="count">4</div>
                    <h3>Available Farms</h3>
                    <p>Farms currently avaialble for investmnet</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count">0</div>
                    <h3>My Farms</h3>
                    <p>Farms you have invested in</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection