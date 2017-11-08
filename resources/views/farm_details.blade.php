@extends('layouts.app')
@foreach($items as $item)
@section('title')
Farm Details for {{ucfirst($item->produce)}}
@endsection
@endforeach

@section('content')
    <div class="container">
        <div class="row">
            @if(isset($items))
            @foreach($items as $item)
                <div class="col-sm-6">
                    <img src="{{asset('img/farms/'.$item->link)}}" width="400px" alt="..." class="team_img img-responsive" >
                </div>
                <div class="col-sm-6">
                    <table class="table table-bordered" >
                        <thead>
                        </thead>
                        <tbody>
                        <tr  class="table-primary">
                            <td><strong> <i class="fa fa-briefcase"></i> Produce</strong></td>
                            <td >{{ucfirst($item->produce)}}</td>
                        </tr>
                        <tr>
                            <td><strong> <i class="fa fa-calendar-times-o" aria-hidden="true"></i> Duration</strong></td>
                            <td>{{$item->duration}}</td>
                        </tr>
                        <tr>
                            <td><strong> <i class="fa fa-shopping-bag" aria-hidden="true"></i> Cost</strong></td>
                            <td>₦{{number_format($item->cost)}}</td>
                        </tr>
                        <tr>
                            <td><strong> <i class="fa fa-money" aria-hidden="true"></i> Returns</strong></td>
                            <td>₦{{number_format($item->cost)}} + {{$item->returns}}% of ₦{{number_format($item->cost)}} in {{$item->duration}}</td>
                        </tr>
                        <tr>
                            <td><strong> <i class="fa fa-map-marker" aria-hidden="true"></i> Farm Location</strong></td>
                            <td>Ilorin, Kwara State</td>
                        </tr>
                        <tr>
                            <td><strong> <i class="fa fa-handshake-o" aria-hidden="true"></i> What Your Investment Covers</strong></td>
                            <td>
                                <ol style="list-style: decimal;">
                                    <li>Leasing of farmland</li>
                                    <li>Farm operations - clearing, planting, and harvesting </li>
                                    <li>Manpower</li>
                                    <li>Insurance</li>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td><strong> <i class="fa fa-line-chart" aria-hidden="true"></i> What Your Investment Will do</strong></td>
                            <td>
                                <ol style="list-style: decimal;">
                                    <li>Bring more farmers to farming</li>
                                    <li>Increase agricultural production </li>
                                    <li>Improve food security</li>
                                    <li>Ensure citizens have access to food</li>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td><strong> <i class="fa fa-hand-o-right" aria-hidden="true"></i> What next?</strong></td>
                            <td>
                                <div style="display: block;">
                                    <a href="" class="btn btn-danger">Invest Now</a>
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Request More Details</a>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Get in touch</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered" >
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr  class="table-primary">
                                            <td><strong> <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+2348063321043" style="color:black;">Call Us</a> </strong></td>
                                            <td ><a href="tel:+2348063321043" style="color:black;">+234 80 6332 1043</a></td>
                                        </tr>
                                        <tr  class="table-primary">
                                            <td><strong> <i class="fa fa-envelope-o" aria-hidden="true"></i> Send a Mail</strong></td>
                                            <td >hello@fundafarm.ng</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
            @endforeach
                @endif
        </div>
        <!-- List other farms -->
        <div class="row">
            <section id="farms" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="ser-title">Other Farms</h2>
                            <hr class="botm-line">
                        </div>
                        @foreach($details as $detail)
                            <div class="col-md-3 col-sm-3 col-xs-6 bbb">
                                <div class="thumbnail image">
                                    <img src="{{asset('img/farms/'.$detail->link)}}" height="100px" alt="..." class="team_img" >
                                    <div class="caption">
                                        <h4 style="color: red;">{{ucfirst($detail->produce)}}</h4>
                                        <h5>₦{{number_format($detail->cost)}}</h5>
                                        <h5>Returns {{$detail->returns}}% in {{$detail->duration}}</h5>
                                        <div class="overlay">
                                            <div class="text">
                                                <a href="{{url('farms/details/'.$detail->produce_id)}}" class="btn btn-appoint">Invest Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection