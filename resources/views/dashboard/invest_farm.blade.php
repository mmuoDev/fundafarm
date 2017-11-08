@extends('dashboard.layout')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row top_tiles">
            <form action="{{url('farms/invest')}}" method="post">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Select Farm</label>
                        <select class="form-control" name="farm_id" required>
                            <option value="">--Please select--</option>
                            @if(isset($farms))
                                @foreach($farms as $farm)
                                    <option value="{{$farm->id}}">{{$farm->produce}} [{{'₦'.number_format($farm->cost)}}] </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="1">
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