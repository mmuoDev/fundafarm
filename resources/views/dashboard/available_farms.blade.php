@extends('dashboard.layout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row top_tiles">
                        @foreach($items as $item)
                            <div class="col-md-3 col-sm-3 col-xs-6 bbb">
                                <div class="thumbnail">
                                    <img src="{{asset('img/farms/'.$item->link)}}" height="100px" alt="..." class="team_img" >
                                    <div class="caption">
                                        <h4 style="color: red;">{{ucfirst($item->produce)}}</h4>
                                        <h5>₦{{number_format($item->cost)}}</h5>
                                        <h5>Returns {{$item->returns}}% in {{$item->duration}}</h5>
                                        <div class="overlay">
                                            <div class="text">
                                                <a href="{{url('farms/invest')}}" class="btn btn-appoint">Invest Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
    </div>
    </div>
    <!-- /page content -->
@endsection