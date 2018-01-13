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
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->

        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                            <div class="large">{{$totalMatches}}</div>
                            <div class="text-muted">Total Matches</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                            <div class="large">{{$pledgeTotal}}</div>
                            <div class="text-muted text-sm-center">Total Pledges</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-user-circle color-teal"></em>
                            <div class="large"> Status</div>
                            <div class="text-text-muted text-sm-center">Activated</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-magic color-teal"></em>
                            <div class="large">Last visit</div>
                            <div class="text-muted text-sm-center-muted"> {{   Carbon\Carbon::parse(Auth::user()->last_sign_in)->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Pledges</div>
                    <div class="panel-body">
                        <div class="col-md-12">

                            @if( @$info==1)
                                @if( count(@$rows)>0)
                                    @foreach(@$rows as $row)
                                        <div  style="color:white" class="alert " role="alert">


                                            <p class="">
                                                Hi,{{ucwords(@$row->pledgerDetails->firstname ." ".@$row->pledgerDetails->lastname)}}</p>


                                            <p>You have pledged GH{{@$row->pledged_amount}}</p>
                                            {{--<p>You will receive  GH{{$row->pledged_amount*2}}</p>--}}
                                            <p>Your order has been received. Wait patiently to be matched.</p>

                                            {{--<p>Your payment is due on {{ucwords( Carbon\Carbon::parse($row->maturity_date)->format("jS F, Y")) }}</p>--}}

                                            <p <?php if(@$row->payment_confirm == "Unconfirmed"){?> style="color:red"
                                               class="warning  ui message" <?php }?> ><i class="attention icon "></i>Your
                                                pledge status is {{ @$row->payment_confirm}}</p>

                                            <p>Your transaction code is {{ @$row->transaction_code}}</p>

                                            <td>
                                                {!!Form::open(['action' =>['PledgeController@destroy', 'id'=>@$row->id], 'method' => 'DELETE','name'=>'c' ,'style' => 'display: inline;'])  !!}

                                                <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this pledge?')"
                                                        class="btn btn-sm btn-success">delete
                                                </button>

                                                {!! Form::close() !!}
                                            </td>
                                        </div>
                                        <hr>
                                        &nbsp;
                                    @endforeach

                                @else
                                    <p style=" " class="ui message red">No pledges yet</p>
                                @endif

                            @else
                                <p style=" " class="ui message red">No pledges yet</p>

                            @endif
                        </div>
                    </div>
                </div><!-- /.panel-->
            </div>
        </div>


    </div>
@endsection
@section('js')
@endsection