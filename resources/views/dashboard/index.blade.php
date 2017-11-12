@extends('dashboard.layout')
@section('title')
    Fundafarm.NG | Dashboard
@endsection
@section('content')
    <!-- page content -->
    <?php
    use App\FarmInvest;
    use App\Farm;
    use Illuminate\Support\Facades\Auth;
    $user_id = Auth::user()->id;
    $myfarms = FarmInvest::where('user_id', $user_id)->where('status', '3')->count();
    $totalfarms = Farm::all()->count();

    ?>
    <div class="right_col" role="main">
        <!-- top tiles -->
        <?php
            $confirmed = Auth::user()->confirmed;
           //dd($confirmed);
        ?>
        @if($confirmed == 0)
            <div class="row top_tiles">
                <div class="alert alert-danger col-md-6">
                    <h4><strong>Attention!</strong> Please confirm your email.
                        We sent you an email containing the confirmation link during registration.</h4>
                </div>
            </div>
        @endif
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>
                    <div class="count">{{$totalfarms}}</div>
                    <h3>Available Farms</h3>
                    <p>Farms currently avaialble for investmnet</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count">{{$myfarms}}</div>
                    <h3>My Farms</h3>
                    <p>Farms you have invested in</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection