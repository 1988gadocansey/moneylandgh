@extends('layouts.newLayout')


@section('style')
<script src="{{   url('public/assets/js/jquery.min.js')}}"></script>
@endsection

@section('content')



<div class="row">

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
            <div class="panel-heading">Incoming Funds  <p style="float:right"> </div>
            <div class="panel-body">

                @if(count($data)>0)

                    <?php $n = 0;?>
                    @foreach($data as   $row)
                    <?php $n++;?>

                         <div class="alert alert-success">

                        <p>{{ucwords(@$row->pledgerDetails->firstname ." ". @$row->pledgerDetails->lastname)}}</p>

                        <p>Amount: GHS {{ @$row->amount}}</p>
                        <p>Expected Earnings: GHS {{ @$row->amount *2}}</p>

                        <p>Maturity Date: {{ ucwords( Carbon\Carbon::parse(@$row->maturity_date)->format("jS F, Y"))}}</p>



                         </div>


                    @endforeach

                @else
                <p class="ui message warning">No incoming funds</p>
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