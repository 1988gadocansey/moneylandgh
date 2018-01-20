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
                        @if( count($data)>0 )

                            @foreach($data as $row)

                                @if($row->type=="receive" && $row->confirmed=="0" &&  $row->client==Auth::user()->id)
                                    <p>Receive payment from </p>
                                    <div style=" " class="alert bg-info" role="alert">


                                        <p>Mobile Money
                                            name: {{$row->pledgerMarker->pledgerDetails->mobile_money_name}}</p>
                                        <p>Mobile Money
                                            Number: {{ $row->pledgerMarker->pledgerDetails->mobile_money_phone}}</p>
                                        <p>Amount to recieve: GHS{{$row->pledgerMarker->pledged_amount}}</p>
                                        @if($row->confirmed==0)
                                            <p><a href='{{url("/match/confirm/$row->id/id")}}'
                                                  onclick="return confirm('Yes or no')" class="ui button green">Click to
                                                    confirm payment</a></p>
                                        @endif
                                    </div>
                                    <hr>

                                @endif


                            @endforeach

                        @else


                            <p class="ui message warning">No payment to receive</p>

                        @endif

                         @if(count($payee)>0)
                                @foreach($payee as $col)

                                        <p>You are to pay this client </p>
                                        <div style=" " class="alert bg-success" role="alert">


                                            <p>Mobile Money name: {{$col->receiver_name}}</p>
                                            <p>Mobile Money Number: {{$col->mobile_money_no}}</p>
                                            <p>Amount to pay: GHS{{$col->amount}}</p>


                                        </div>


                                @endforeach


                            @else
                                <p>No client to pay </p>
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