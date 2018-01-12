@extends('layouts.app')


@section('style')
    <script src="{{   url('public/assets/js/jquery.min.js')}}"></script>
@endsection

@section('content')
    <div class="md-card-content">
        @if(Session::has('success'))
            <div style="text-align: center;color:green" class="ui green positive" data-uk-alert="">
                {!! Session::get('success') !!}
            </div>
        @endif
        @if(Session::has('error'))
            <div style="text-align: center;color:red" class="ui red negative" data-uk-alert="">
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



        <div class="another example">
            <table class="ui sortable celled table">
                <thead>
                <th>No</th>
                <th>Pledge Marker</th>
                <th>Date</th>
                <th>Amount Pledged</th>
                <th>Expected Earnings</th>
                <th>Payment Maturity</th>
                <th>Payment Confirmed</th>
                <th>Transaction Code</th>
                 <th>Action</th>
                </thead>
                <tbody>
                <?php $n=0;?>
                @foreach($data as   $row)
                <?php $n++;?>
                    <tr align="">
                        <td><?php echo $n?></td>
                        <td>{{ucwords(@$row->pledgerDetails->firstname ." ".$row->pledgerDetails->middle_name)}}</td>
                        <td>{{ucwords(  Carbon\Carbon::parse($row->created_at)->format('jS F, Y')  )}}</td>
                        <td>{{ $row->pledged_amount}}</td>
                        <td>{{ round((($row->pledged_amount*2)-2/100),2) }}</td>

                        <td>{{ucwords( Carbon\Carbon::parse($row->maturity_date)->diffForHumans()) }}</td>

                        <td <?php if($row->payment_confirm=="No"){?> class="warning" <?php }?>><i class="attention icon"></i>{{ $row->payment_confirm}}</td>

                        <td>{{ $row->transaction_code}}</td>
                       <td>
                            {!!Form::open(['action' =>['PledgeController@destroy', 'id'=>$row->id], 'method' => 'DELETE','name'=>'c' ,'style' => 'display: inline;'])  !!}

                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')" class="uk-btn" ><i  class="sidebar-menu-icon material-icons md-18"></i>X</button>

                            {!! Form::close() !!}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>



    </div>
@endsection
@section('js')
    <script src="{{   url('public/assets/js/jquery.min.js')}}"></script>
@endsection