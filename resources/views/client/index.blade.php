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
            <h1 class="page-header">Clients</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All clients as at {{date('jS F, Y')}}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        @if(count($data)>0)
                            <table class="table table-hover table-responsive ">
                                <thead>
                                <th>No</th>
                                <th>Name</th>

                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Referral</th>
                                <th>Mobile Money Account Name</th>
                                <th>Mobile Money Phone No.</th>
                                <th>Date Joined</th>

                                </thead>
                                <tbody>
                                <?php $n = 0;?>
                                @foreach($data as   $row)
                                    <?php $n++;?>
                                    <tr align="">
                                        <td><?php echo $n?></td>

                                        <td>{{ucwords(@$row->firstname ." ".$row->lastname)}}</td>
                                        <td>{{ucwords(@$row->gender)}}</td>
                                        <td>{{ @$row->phone }}</td>
                                        <td>{{ucwords(@$row->email)}}</td>
                                        <td>{{ucwords(@$row->address)}}</td>
                                        <td>{{ucwords(@$row->mobile_money_name)}}</td>
                                        <td>{{ucwords(@$row->mobile_money_phone)}}</td>
                                        <td>{{ucwords( Carbon\Carbon::parse($row->created_at)->format("jS F, Y"))}}</td>


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