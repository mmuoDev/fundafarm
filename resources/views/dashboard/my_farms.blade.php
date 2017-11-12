@extends('dashboard.layout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row top_tiles">
            @if(count($farms) > 0)
            @foreach($farms as $farm)
                <?php $date = date('d-m-Y', strtotime($farm->start_date)); ?>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <h3><img src="{{asset('img/farms/'.$farm->link)}}" height="50px" alt="..." class="team_img" ></h3>
                        <h3><strong>{{ucfirst($farm->produce)}}[{{$farm->quantity}}]</strong></h3>
                        <p>Started: {{$date}}</p>
                    </div>
                </div>
            @endforeach
                @else
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"></div>
                        <div class="count">0</div>
                        <h3>Farms started</h3>
                        <p>You have not invested in any farm.</p>
                    </div>
                </div>
                @endif
        </div>
    </div>
    <!-- /page content -->
@endsection