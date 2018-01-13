@extends('layouts.newLayout')


@section('style')
    <script src="{{   url('public/assets/js/jquery.min.js')}}"></script>
@endsection

@section('content')
    <div class="md-card-content">
        @if(Session::has('success'))
            <div style="text-align: center;color:green" class="alert bg-info" data-uk-alert="">
                {!! Session::get('success') !!}
            </div>
        @endif
        @if(Session::has('error'))
            <div style="text-align: center;color:red" class="alert bg-danger" data-uk-alert="">
                {!! Session::get('error') !!}
            </div>
        @endif

        @if (count($errors) > 0)

            <div class="uk-form-row">
                <div class="ui warning" style="background-color: red;color: white">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{  $error  }} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Matches</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Matches</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        @if(count($data)>0)
                            <table class="table table-info">
                                <thead>
                                <th>No</th>
                                <th>Transaction Code</th>
                                <th>Pledge Marker</th>
                                <th>Date of pledge</th>
                                <th>Amount Pledged</th>
                                <th>Payment Maturity</th>
                                <th>Expected Earnings</th>

                                <th>Status</th>


                                </thead>
                                <tbody>
                                <?php $n = 0;?>
                                @foreach($data as   $row)
                                    <?php $n++;?>
                                    <tr align="">
                                        <td><?php echo $n?></td>
                                        <td>{{ $row->transaction_code}}</td>
                                        <td>{{ucwords(@$row->pledgerDetails->firstname ." ".$row->pledgerDetails->middle_name)}}</td>

                                        <td>{{ ucwords( Carbon\Carbon::parse($row->created_at)->format("jS F, Y"))}}</td>
                                        <td>GHS{{ $row->pledged_amount}}</td>
                                        <td>{{ucwords( Carbon\Carbon::parse($row->maturity_date)->format("jS F, Y")) }}</td>

                                        <td>GHS{{ round((($row->pledged_amount*2)),2) }}</td>

                                        @if(($row->pledge_receiver_id==Auth::user()->id)&& $row->payment_confirm=="Unconfirmed")
                                            <td class="warning ui message green"> Confirm</td>

                                        @else
                                            <td <?php if($row->payment_confirm == "Unconfirmed"){?> class="warning" <?php }?>>
                                                <i class="attention icon"></i>{{ $row->payment_confirm}}</td>

                                        @endif
                                        {{--<td>--}}
                                        {{--{!!Form::open(['action' =>['PledgeController@destroy', 'id'=>$row->id], 'method' => 'DELETE','name'=>'c' ,'style' => 'display: inline;'])  !!}--}}

                                        {{--<button type="submit" onclick="return confirm('Are you sure you want to delete this record?')" class="uk-btn" ><i  class="sidebar-menu-icon material-icons md-18"></i>X</button>--}}

                                        {{--{!! Form::close() !!}</td>--}}
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="ui message warning">No transactions to display</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="{{   url('public/assets/js/jquery.min.js')}}"></script>
@endsection