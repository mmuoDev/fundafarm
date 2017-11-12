<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home </a></li>
            <li><a href="{{url('/farms/available')}}"><i class="fa fa-edit"></i> Available Farms </a></li>
            <?php
                use App\FarmInvest;
                use Illuminate\Support\Facades\Auth;
                $user_id = Auth::user()->id;
                $count = FarmInvest::where('user_id', $user_id)->where('status', '3')->count();
            ?>
            <li><a class="info-number" href="{{url('my-farms')}}"><i class="fa fa-desktop"></i> My Farms <span class="badge bg-green">{{$count}}</span></a></li>
            <li><a href="{{url('/farms/invest')}}"><i class="fa fa-table"></i> Invest in Farms </a>
            </li>

        </ul>
    </div>


</div>
<!-- /sidebar menu -->