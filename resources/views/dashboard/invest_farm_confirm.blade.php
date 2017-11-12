@extends('dashboard.layout')
@section('title')
    Fundafarm.NG | Confirm Farm Investment
@endsection
@section('script')
    <script>
        function paystackReadyHandler() {
            // keep Pay button disabled till Paystack is fully loaded
            $('#pay-button').prop('disabled', false);
        }
        $(document).ready(function() {
            // disable button once Paystack modal is activated
            $('#pay-button').click(function(){
                $(this).prop('disabled', true);
                $('.button-text').text('Please wait...').prop('disabled', true);
                $('.fa-spinner').show();
                return false;
            });
        });
    </script>
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row top_tiles">
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
                <div class="col-md-5 col-sm-5 col-xs-6 bbb">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="color: red;"><i class="fa fa-truck" aria-hidden="true"></i> {{ucfirst($farms->produce)}}</h4>
                            <h4><strong>Quantity:</strong> {{$details->quantity}}</h4>
                            <?php
                            $cost = $farms->cost * $details->quantity;
                            $amount = $cost * 100;
                            $email = Auth::user()->email;
                            $payRef = $details->payRef;
                            ?>
                            <h4><strong>Cost: </strong> ₦{{number_format($cost)}} </h4>
                            <form action="{{url('farms/payment')}}" method="post">
                                {{csrf_field()}}
                                {{--
                                <input type="text" name="email" value="{{Auth::user()->email}}">
                                <input type="text" name="amount" value="{{$amount}}">
                                --}}
                                <input type="hidden" name="payRef" value="{{$details->payRef}}">
                                <input type="hidden" name="amount" value="{{$cost}}">
                                <div class="row" style="display: block;">
                                    <input id="pay-button" type="submit" value="Confirm and Pay" class="btn btn-appoint">
                                    <a href="{{url('farms/invest')}}" class="btn btn-appoint3">Cancel</a>
                                </div>
                                <script
                                        src="https://js.paystack.co/v1/inline.js"
                                        data-key="<?php echo env('PAY_STACK_TEST_PUBLIC_KEY'); ?>"
                                        data-email="<?php echo $email; ?>"
                                        data-amount="<?php echo $amount; ?>"
                                        data-ref="<?php echo $payRef; ?>"
                                        data-custom-button="pay-button"
                                        async onload="paystackReadyHandler()">
                                </script>
                                </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
