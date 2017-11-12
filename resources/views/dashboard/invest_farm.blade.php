@extends('dashboard.layout')
@section('title')
    Fundafarm.NG | Invest in a Farm
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row top_tiles">
            @if(isset($errors))
                @if(count($errors) > 0)
                    <div class="alert alert-danger col-md-6">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endForeach
                        </ul>

                    </div>
                @endIf
            @endIf
        </div>
        <div class="row top_tiles">
            <form action="{{url('farms/invest')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="">Select Farm</label>
                                <select class="form-control" name="farm_id" required>
                                    <option value="">--Please select--</option>
                                    @if(isset($farms))
                                        @foreach($farms as $farm)
                                            <option value="{{$farm->id}}">{{ucfirst($farm->produce)}} [{{'₦'.number_format($farm->cost)}}] </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="">Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="1" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-appoint">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /page content -->
@endsection