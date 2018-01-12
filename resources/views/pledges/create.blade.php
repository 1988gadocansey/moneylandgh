@extends('layouts.app')


@section('style')

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
    <div style="text-align: center;display: none" class="ui green success message" data-uk-alert="">

    </div>



    <div style="text-align: center;display: none" class="ui red error message" data-uk-alert="">

    </div>
    <form enctype='multipart/form-data' id="client" name="client" method="post"
          class="ui loadable form ui form" novalidate accept-charset="utf-8"     v-form>
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <h4 class="ui dividing header">Pledge Information</h4>
        <div class="equal width fields ">
            <div class="field required  ">
                <label>Pledge Amount</label>
                <input type="text" name="amount" id="amount"  required=""
                       placeholder="Amount Name"  v-model="amount" v-form-ctrl="">
                <p class="ui error " v-if="client.amount.$error.required" >Pledge amount is required</p>

            </div>

            <div class="field required ">
                <label>Receiver</label>
                <select id="lecturer" class="ui search dropdown"  required="" name="receiver"  >
                    @foreach($data  as $item)
                        <option value="{{$item->id}}">{{$item->firstname." $item->lastname " . "-"." $item->phone "}}</option>
                    @endforeach
                </select>
                 <p class="ui error " v-if="client.receiver.$error.required" >Pledge receiver is required</p>

            </div>
        </div>










        <button  v-show="client.$valid" id="save"class="ui large primary button  " type="button">Create</button>

    </form>
@endsection
@section('js')
    <script type="text/javascript">

        $('#save').click(function(e){
            event.preventDefault();
            $('.ui.basic.modal').modal('show');
            //  alert($("#client").serialize());

            $.ajax({
                url: "{{ url('pledge_new') }}",
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
                    window.location.href=" {{url('/client/pledges')}}";
                }
                else{
                    $(".error").show();
                    $(".error").text(data.status + " " + data.message);
                    $(".error").fadeOut(5000);
                }


            });;
        });


    </script>
    <script>


        //code for ensuring vuejs can work with select2 select boxes
        Vue.directive('select', {
            twoWay: true,
            priority: 1000,
            params: [ 'options'],
            bind: function () {
                var self = this
                $(this.el)
                    .dropdown({
                        data: this.params.options,
                        width: "resolve"
                    })
                    .on('change', function () {
                        self.vm.$set(this.name,this.value)
                        Vue.set(self.vm.$data,this.name,this.value)
                    })
            },
            update: function (newValue,oldValue) {
                $(this.el).val(newValue).trigger('change')
            },
            unbind: function () {
                $(this.el).off().select2('destroy')
            }
        })


        var vm = new Vue({
            el: "body",
            ready : function() {
            },
            data : {


                options: [    ]

            },

        })

    </script>

@endsection