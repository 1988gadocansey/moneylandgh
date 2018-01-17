@extends('layouts.newLayout')


@section('style')

@endsection
@inject('sys', 'App\Http\Controllers\SystemController')
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
        @if( count($data)>0 || count($payee)>0)

            @foreach($data as $row)
                @if($row->type=="receive" && $row->confirmed=="0" &&  $row->client==Auth::user()->id)
                    <p>Receive this payment</p>
                <div style=" " class="alert bg-info" role="alert">


                      <p>Mobile Money name:  {{$row->recieverDetails->mobile_money_name}}</p>
                     <p>Mobile Money Number:  {{$row->recieverDetails->mobile_money_phone}}</p>
                     <p>Amount to recieve:  GHS{{$row->amount}}</p>
                    @if($row->confirmed==0)
                    <p><a href='{{url("/match/confirm/$row->id/id")}}'onclick="return confirm('Yes or no')" class="ui button green">Click to confirm payment</a> </p>
                    @endif
                </div>
                <hr>


               @endif
                &nbsp;
            @endforeach

        @else


                <p class="ui message warning">No matches</p>

        @endif

            @if(  count($payee)>0)


                @foreach($payee as $rows)

                    @foreach($sys->getPledgerDetails($rows->pledge_maker_id) as $col)

                        <p>You are to pay this client</p>
                        <div style=" " class="alert bg-info" role="alert">


                            <p>Mobile Money name:  {{$col->firstname}}</p>
                            <p>Mobile Money Number:  {{$col->phone}}</p>
                            <p>Amount to pay:  GHS{{$rows->amount}}</p>

                        </div>
                        <hr>
                        @endforeach





                @endforeach
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