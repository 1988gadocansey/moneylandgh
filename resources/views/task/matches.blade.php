@extends('layouts.newLayout')


@section('style')
    <script src="{{   url('public/assets/js/jquery.min.js')}}"></script>
@endsection

@section('content')



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Matches </h1>
        </div>
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
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All matches as at {{date('jS F, Y')}} <p style="float:right"> </div>
                <div class="panel-body">
                     <div id="toolbar">
                        <div class="pull-left form-inline" role="toolbar">
                            <a   class="btn btn-sm btn-primary" href="{{url('/client/match/new')}}"><em class="fa fa-connectdevelop">&nbsp;</em>Create Matches</a>
                            <a onclick="return confirm('This will send sms to all matches. Do you want to continue??')"  class="btn btn-sm btn-success" href="{{url('/match_sms')}}"><em class="fa fa-phone">&nbsp;</em>Send Match sms</a>

                        </div>
                    </div>
                        @if(count($data)>0)
                            <table class="table table-hover table-striped table-responsive">
                                <thead>
                                <th>No</th>
                                <th>Pledger</th>
                                <th>Receiver Name</th>
                                <th>Receiver Account Number</th>
                                <th>Amount matched</th>
                                <th>Match Type</th>
                                <th>Status</th>
                                <th>Date Matched</th>

                                <th>Actions</th>

                                </thead>
                                <tbody>
                                <?php $n = 0;?>
                                @foreach($data as   $row)
                                    <?php $n++;?>
                                    <tr align="">
                                        <td><?php echo $n?></td>
                                        <td>{{ucwords(@$row->pledgerMarker->pledgerDetails->firstname ." ".$row->pledgerMarker->pledgerDetails->lastname)}}</td>

                                        <td>{{ucwords(@$row->recieverDetails->firstname ." ". $row->recieverDetails->lastname)}}</td>
                                        <td>{{ @$row->recieverDetails->phone}}</td>
                                        <td>GHS{{ $row->amount}}</td>
                                        <td> {{ucwords($row->type)}}</td>


                                        @if($row->confirm==1)
                                            <td class="bg-success"> Confirm</td>

                                        @else

                                            <td  class="bg-warning" >
                                                <i class="attention icon"></i>UnConfirmed</td>

                                        @endif
                                        <td>{{ ucwords( Carbon\Carbon::parse($row->created_at)->format("jS F, Y"))}}</td>

                                        <td>

                                            <div class="pull-left action-buttons">
                                            {!!Form::open(['action' =>['MatchController@destroy', 'id'=>$row->id], 'method' => 'DELETE','name'=>'c' ,'style' => 'display: inline;'])  !!}

                                       <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-sm btn-danger" ><em class="fa fa-trash"></em></button>

                                        {!! Form::close() !!}
                                            </div>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            <ul class="page-link">
                                <li>{{$data->render()}}</li>
                            </ul>
                        @else
                            <p class="ui message warning">No transactions to display</p>
                        @endif

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="{{   url('public/assets/js/jquery.min.js')}}"></script>
@endsection