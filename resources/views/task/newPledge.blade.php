@extends('layouts.newLayout')


@section('style')
    <style>
        .info p{
            color:white;
        }
    </style>
@endsection

@section('content')

    <div class="newsitem_text">

        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Pending</li>
            </ol>
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Pledges</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            @if(count($data)>0)

                                    @foreach(@$data as $row)
                                        <div  style="color:white" class="alert " role="alert">

                                            <p id="demo"></p>
                                            <p class="">
                                                 Name: {{ucwords(@$row->pledgerDetails->firstname ." ".@$row->pledgerDetails->lastname)}}</p>


                                            <p>You have pledged GH{{@$row->pledged_amount}}</p>
                                            {{--<p>You will receive  GH{{$row->pledged_amount*2}}</p>--}}
                                            <p>Your order has been received. Wait patiently to be matched.</p>

                                            {{--<p>Your payment is due on {{ucwords( Carbon\Carbon::parse($row->maturity_date)->format("jS F, Y")) }}</p>--}}

                                            <p <?php if(@$row->payment_confirm == "Unconfirmed"){?> style="color:red"
                                               class="warning  ui message" <?php }?> ><i class="attention icon "></i>Status:
                                                  {{ @$row->payment_confirm}}</p>

                                            <p>Transaction Code: {{ @$row->transaction_code}}</p>

                                            <td>
                                                {!!Form::open(['action' =>['PledgeController@destroy', 'id'=>@$row->id], 'method' => 'DELETE','name'=>'c' ,'style' => 'display: inline;'])  !!}

                                                <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this pledge?')"
                                                        class="btn btn-sm btn-success">Cancel Pledge
                                                </button>

                                                {!! Form::close() !!}
                                            </td>
                                        </div>
                                        <hr>
                                        &nbsp;
                                    @endforeach
                                @else
                                <p>No pending transactions</p>
                                @endif
                        </div>
                    </div>
                </div><!-- /.panel-->
            </div>
        </div>




    </div>
@endsection
@section('js')
    <script>
        // Set the date we’re counting down to
        var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

// Get todays date and time
            var now = new Date().getTime();

// Find the distance between now an the count down date
            var distance = countDownDate – now();

// Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Output the result in an element with id=”demo”
            document.getElementById("demo").innerHTML = days + "d " + hours + "h"
+ minutes + "m" + seconds + "s";

// If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection
