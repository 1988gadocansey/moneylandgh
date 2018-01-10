<!--
Designed by Gad Ocansey <gadocansey@gmail.com> +233243348522
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Client Portal | MoneylendGh </title>

    <link rel="stylesheet" href="{{ url('public/assets/css/style.css') }}">


    <link rel="icon" type="image/x-icon" href="{{ url('public/assets/img/logo.png') }}" />
    <style type="text/css">
        img{
            max-width:180px;
        }
        input[type=file]{
            padding:10px;
            background:#2d2d2d;}
        .error{
            color:red;
        }

    </style>
    @yield('style')
</head>

<body id="{% block body_id %}{% endblock %}" class="pushable">
<div class="pusher">
    <div id="menu" class="ui large sticky inverted stackable menu">







        <div class="ui right stackable inverted menu">

            <a class="item" href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>


            <p style="" class="item">Welcome {{ @Auth::user()->name }}</p>

        </div>



    </div>
    <div class="ui container">
        <header>
            <div class="ui basic segment">
                <div class="ui three column stackable grid">
                    <div class="column">
                        <a href="#">
                            <img style="width: 111px;margin-left: -24px" src="{{ asset('public/assets/images/logo.png') }}" alt="TTU logo"
                                 class="ui small image"/>

                        </a>
                    </div>

                </div>
            </div>


            <div class="ui large stackable menu">

                <a href="{{ url('/home') }}" class="item">Home</a>


                <a href="#" class="item">Transactions</a>
                <a href="{{url('/profile/form')}}" class="item">Profile Update</a>
                <a href="#" class="item">Last access {{ Auth::user()->last_sign_in }}</a>



            </div>

        </header>

        @yield('head')

        <div class="ui hidden divider"></div>




        <div class="ui padded segment">
            @yield('content')
        </div>


    </div>





    <footer id="footer" class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui inverted divided equal height stackable grid">


                <div class="eight wide column">

                    <p>&copy; {{  date('Y') }} MoneyLendGh
                          | <a href="#" target="_blank" style="color: #1abb9c;"> Powered by Gadeksystem</a></p>
                </div>


            </div>
        </div>
    </footer>


</div>

<script src="{{ asset('public/assets/js/app.js')}}"></script>

<script>
    $('.ui.modal')
        .modal('show');
    $('.ui.dropdown').dropdown();
    $('#applicant_step_one_dob_year').dropdown();
    $('#applicant_step_one_dob_month').dropdown();
    $('#applicant_step_one_dob_day').dropdown();


    $('.save').on('click', function () {
        $('.ui.basic.modal').modal('show');
    })



</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{   url('public/assets/js/vue.min.js') }}"> </script>
<script src="{{   url('public/assets/js/vue-form.min.js')}}"> </script>
<script>

    $(document).ready(function () {
        var brand = document.getElementById('logo-id');
        brand.className = 'attachment_upload';
        brand.onchange = function () {
            document.getElementById('fakeUploadLogo').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#logo-id").change(function () {
            readURL(this);
        });
    });


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


            options: [    ]

        },

    })

</script>

@yield('js')


</body>
</html>
