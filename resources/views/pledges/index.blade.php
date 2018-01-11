@extends('layouts.app')


@section('style')

@endsection
@section('content')




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

                @foreach($data as   $row)

                    <tr align="">
                        <td><?php echo $data->count();?></td>
                        <td>{{ucwords(@$row->pledgerDetails->firstname)}}</td>
                        <td>{{ucwords(  Carbon\Carbon::parse($row->created_at)->diffForHumans()  )}}</td>
                        <td>{{ $row->pledged_amount}}</td>
                        <td>{{ round((($row->pledged_amount*2)-2/100),2) }}</td>

                        <td>{{ucwords( Carbon\Carbon::parse($row->maturity_date)->diffForHumans()) }}</td>

                        <td @if($row->payment_confirm=="no") class="error"@endif><i class="attention icon"></i>{{ $row->payment_confirm}}</td>

                        <td>{{ $row->transaction_code}}</td>
                        <td>
                            {!!Form::open(['action' =>['PledgeController@destroy', 'id'=>$row->id], 'method' => 'DELETE','name'=>'c' ,'style' => 'display: inline;'])  !!}

                            <button type="submit" onclick="return confirm('Are you sure you want to delete   {{$row->pledge_receiver_id}}?')" class="uk-btn" ><i  class="sidebar-menu-icon material-icons md-18"></i>X</button>

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