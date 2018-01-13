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
    <div style="text-align: center;display: none" class="alert bg-info" data-uk-alert="">

    </div>



    <div style="text-align: center;display: none" class="alert bg-danger" data-uk-alert="">

    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Client Profile update</h1>
        </div>
    </div><!--/.row-->
    <div class="panel panel-default">
        <div class="panel-heading">Update your profile data</div>
        <div class="panel-body">
            <div class="col-md-6">
    <form enctype='multipart/form-data' id="client" name="client" role="form" method="post"
            class="ui loadable form ui form" novalidate accept-charset="utf-8"     v-form>
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">


        <div class="form-group">
                <label>First name</label>
                <input type="text" name="fname" class="form-control" id="fname"  required="" value="{{@$data->firstname}}"
                       placeholder="First Name"  v-model="fname" v-form-ctrl="">
                <p class="ui error " v-if="client.fname.$error.required" >Firstname is required</p>

            </div>
        <div class="form-group">
                <label>Middle name</label>
                <input type="text" name="othername"
                       placeholder="Middle Name" class="form-control" v-model="othername" id="othername" value="{{@$data->middle_name}}" v-form-ctrl="">
            </div>
        <div class="form-group">
                <label>Last name</label>
                <input type="text" name="surname" class="form-control"  required=""
                       placeholder="Last Name" v-model="surname" v-form-ctrl id="surname" value="{{@$data->lastname}}">
                <p class="ui error " v-if="client.surname.$error.required" >Lastname is required</p>

            </div>


        <div class="form-group">

                <label for="sylius_customer_registration_firstName"  >Month joined </label>


                <select class="ui form-control"  id="month"   name="month" >
                    <option value="">Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

            </div>


        <div class="form-group">
                    <label>Day joined</label>
                    <select class="ui fluid search form-control dropdown" name="day"  >
                        <option value=""> Day</option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }

                        ?>
                    </select>

                </div>
        <div class="form-group">
                    <label>Year joined</label>
                    <div class="two fields">
                        <div class="field">
                            <select class="ui form-control fluid search dropdown" required="" name="year">
                                <option value=""> Year</option>
                                <?php
                                for ($i = 1970; $i <= 2070; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }

                                ?>
                            </select>
                        </div>

                    </div>
        </div>





        <div class="form-group"><label for="sylius_customer_registration_firstName" class="required">Gender </label>
                <select class="ui search dropdown form-control" name="gender" required="">
                    <option value="">Select Gender</option>
                    <option value="Male">Male
                    </option>
                    <option value="Female" >Female
                    </option>

                </select>

            </div>

           {{-- <div class="required field"><label for="sylius_customer_registration_lastName" class="required">Phone
                    Number</label>
                <input type="text" id="phone" name="phone" class="md-input"   minlength="10"  required="required"   maxlength="10" value="{{@$data->phone}}"     v-model="phone"  v-form-ctrl>
                <p class="ui error " v-if="client.phone.$error.required" >phone no. is required</p>

            </div>--}}




            <div class="form-group"><label for="sylius_customer_" class="required">Contact
                    Address</label><input class="form-control" type="text"   name="address"
                                          required="required" v-model="address" v-form-ctrl="" value="{{@$data->address}}"/>
                <p class="ui error " v-if="client.address.$error.required" >Address is required</p>

            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                       placeholder="email" v-model="email" class="form-control" v-form-ctrl id="email"  value="{{@$data->email}}">
                <p class="ui error "  v-if="client.email.$invalid " >Email is invalid  </p>

            </div>









         <button  v-show="client.$valid" id="save"class="btn btn-success  " type="button">Save</button>

    </form>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">

        $('#save').click(function(e){
            event.preventDefault();
            $('.ui.basic.modal').modal('show');
          //  alert($("#client").serialize());

            $.ajax({
                url: "{{ url('profile_send') }}",
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
                     window.location.reload();
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
                    .select2({
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

                fname : "{{@$data->firstname}}",
                address : "{{@$data->address}}",
                othernames : "{{@$data->othername}}",
                surname : "{{@$data->lastname}}",
                phone: "{{@$data->phone}}",
                email: "{{@$data->email}}",
                gender: "{{@$data->gender}}",

                options: [    ]

            },

        })

    </script>
@endsection