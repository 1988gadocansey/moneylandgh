@extends('layouts.newLayout')


@section('style')

@endsection
@section('content')
    <div class="md-card-content">
        @if(Session::has('success'))
            <div style="text-align: center" class="ui green message" data-uk-alert="">
                {!! Session::get('success') !!}
            </div>
        @endif

        @if(Session::has('error'))
            <div style="text-align: center" class="ui red message" data-uk-alert="">
                {!! Session::get('error') !!}
            </div>
        @endif


    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Matches</div>
                <div class="panel-body">
                    <div class="col-md-6">
        @if( count($data)>0)
            @foreach($data as $row)
                @if($row->type=="receive" && $row->confirmed=="0")
                    <p>Receive this payment</p>
                <div style=" " class="alert bg-info" role="alert">


                     <p>Bank Name:  {{$row->mobile_account_type}}</p>
                     <p>Mobile Money name:  {{$row->receiver_name}}</p>
                     <p>Mobile Money Number:  {{$row->mobile_money_no}}</p>
                     <p>Amount to recieve:  GHS{{$row->amount}}</p>
                    @if($row->confirmed==0)
                    <p><a href='{{url("/match/confirm/$row->id/id")}}'onclick="return confirm('Yes or no')" class="ui button green">Click to confirm payment</a> </p>
                    @endif
                </div>
                <hr>
                @endif

                 {{--@else
                    <p>Payment details</p>
                    <div style=" " class="ui red  message">


                        <p>Bank Name:  {{$row->mobile_account_type}}</p>
                        <p>Mobile Money name:  {{$row->receiver_name}}</p>
                        <p>Mobile Money Number:  {{$row->mobile_money_no}}</p>
                        <p>Amount to pay:  GHS{{$row->amount}}</p>
                        <p>Deadline is 12:12:1</p>
                    </div>


               @endif--}}
                &nbsp;
            @endforeach

        @else


                <p class="ui message warning">No matches</p>

        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
@endsection