@extends('layouts.newLayout')


@section('style')
    <style>
        p{
            color:red;
        }
    </style>
@endsection
@section('content')
    <div class="ui two column stackable grid">
        <div class="column">
            <h1 class="ui header">
                <i class="circular user circle icon"></i>
                <div class="content" style='font-size:16px'>

                    <small style='color:red'> fields marked in red asteriks(*) are required</small>


                </div>
            </h1>
        </div>



    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Matches</h1>
        </div>
    </div><!--/.row-->
    <div class="panel panel-default">
        <div class="panel-heading">Match clients here</div>
        <div class="panel-body">
            <div style="text-align: center;display: none" class="alert bg-info success" data-uk-alert="">

    </div>



    <div style="text-align: center;display: none" class="alert bg-danger error" data-uk-alert="">

    </div>
            <div class="col-md-6">
                <form enctype='multipart/form-data'   id="client" name="client" role="form" method="post"
                         accept-charset="utf-8"      >
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">


                    <div class="form-group">
                        <label>Pledgers</label>
                          <select  name="maker" class='form-control' id="maker" required=""  v-model="maker" v-form-ctrl="" v-select="maker">
                            <option value=""  >--Select Pledge Marker--</option>
                            @foreach($pledge as $row)
                                <option value="{{@$row->id}}">{{@$row->pledgerDetails->firstname.' '.@$row->pledgerDetails->lastname.' - '.@$row->pledgerDetails->phone.' - GHS'.@$row->pledged_amount.' - Date pledged '.Carbon\Carbon::parse(@$row->created_at)->format("jS F, Y") }}</option>
                            @endforeach

                        </select>

                    </div>

                     

                      <div class="form-group">
                        <label>Select client to match to</label>
                          <select  name="receiver" class='form-control' id="receiver" required=""  v-model="maker" v-form-ctrl="" v-select="maker">
                            <option value=""  >--Select client--</option>
                            @foreach($client as $rows)
                                <option value="{{$rows->id}}">{{$rows->firstname.' '.$rows->lastname.' - '.$rows->phone  }}</option>
                            @endforeach

                        </select>
                        
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount"  required=""
                               placeholder="Amount"  v-model="fname" v-form-ctrl="">

                    </div>
 


                    <button  v-show="client.$valid" id="save"class="btn btn-success  " type="button">Create Match</button>

                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">

        $('#save').click(function(e){
            alert();
            event.preventDefault();
            //$('.ui.basic.modal').modal('show');
            //  alert($("#client").serialize());

            $.ajax({
                url: "{{ url('match_create') }}",
                data: $("#client").serialize(),
                type: "POST",


                processData: false,
                cache: false,
                dataType: "JSON", // Change this according to your response from the server.
                error: function (err) {
                    console.error(err);

                },
                success: function (data) {
                    console.log(data);

                },
                complete: function () {
                    console.log("Request finished.");

                }
            }). done(function(data){

                if (data.status == 'success'){
                    $(".success").show();
                    $(".success").text(data.status + " " + data.message);
                    $(".success").fadeOut(5000);
                     window.location.href = " {{url('/client/match')}}";
                }
                else{
                    $(".error").show();
                    $(".error").text(data.status + " " + data.message);
                    $(".error").fadeOut(5000);
                }


            });;
        });


    </script>

     
@endsection