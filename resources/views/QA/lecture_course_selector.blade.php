@extends('layouts.app')


@section('style')
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
@endsection
@section('content')
    <div class="md-card-content">
        @if(Session::has('success'))
            <div style="text-align: center" class="uk-alert uk-alert-success" data-uk-alert="">
                {!! Session::get('success') !!}
            </div>
        @endif
        @if(Session::has('error'))
            <div style="text-align: center" class="uk-alert uk-alert-danger" data-uk-alert="">
                {!! Session::get('error') !!}
            </div>
        @endif

        @if (count($errors) > 0)

            <div class="uk-form-row">
                <div class="uk-alert uk-alert-danger" style="background-color: red;color: white">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{  $error  }} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
    @inject('sys', 'App\Http\Controllers\SystemController')
    <h5 class="heading_c">Lecturer and Course</h5>
    <p></p>
    <div class="uk-width-xLarge-1-1">
        <div class="md-card">
            <div class="md-card-content">
                <form  action="{{url('/lecturer_assessment')}}"  method="post" accept-charset="utf-8" name="applicationForm"  v-form >
                    {!!  csrf_field()  !!}
                    <div class="uk-grid" data-uk-grid-margin="">

                        <div class=" parsley-row">
                            <div class="uk-input-group">

                                <label for="wizard_email">Level<span class="req uk-text-danger">*</span></label>
                                <p></p>
                                <select  name="level" id="level" required=""  v-model="level" v-form-ctrl="" v-select="level">
                                    <option value=""  >--Select level--</option>
                                    @foreach($level as $item)
                                        <option value="{{$item->name}}">{{$item->slug}}</option>
                                    @endforeach

                                </select>
                                <p class="uk-text-danger uk-text-small"  v-if="applicationForm.level.$error.required" >Level is required</p>

                            </div>
                        </div>
                       {{-- <div class=" parsley-row">
                            <div class="uk-input-group">

                                <label for="wizard_email">Academic year<span class="req uk-text-danger">*</span></label>
                                <p></p>
                                {!!   Form::select('year',$years ,array("required"=>"required","class"=>"md-input","id"=>"year","v-model"=>"year","v-form-ctrl"=>"","v-select"=>"year")   )  !!}

                                <p class="uk-text-danger uk-text-small"  v-if="applicationForm.level.$error.required" >Level is required</p>

                            </div>
                        </div>--}}
                       {{-- <div class=" parsley-row">
                            <div class="uk-input-group">

                                <label for="wizard_email">Semester<span class="req uk-text-danger">*</span></label>
                                <p></p>
                                <select  name="semester" id="semester"   v-model="semester" required="" v-form-ctrl="" v-select="semester">
                                    <option value=""  >--Select sem --</option>
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>

                                </select>
                                <p class="uk-text-danger uk-text-small"  v-if="applicationForm.semester.$error.required" >Semester is required</p>

                            </div>
                        </div>--}}

                        <div class=" parsley-row">
                            <div class="uk-input-group">
                                <label for="wizard_email">Lecturer<span class="req uk-text-danger">*</span></label>
                                <p></p>

                                <select id="lecturer"  required="" name="lecturer" v-model="lecturer" v-form-ctrl="" v-select="lecturer">
                                    @foreach($lecturer as $item)
                                        <option value="{{$item->staffID}}">{{$item->fullName}}</option>
                                    @endforeach
                                </select>
                                <p class="uk-text-danger uk-text-small"  v-if="applicationForm.lecturer.$error.required" >Lecturer is required</p>

                            </div>
                        </div>


                        <div class=" parsley-row">
                            <div class="uk-input-group">
                                <label for="wizard_email">Course<span class="req uk-text-danger">*</span></label>
                                <p></p>
                                <select name="course" style="width:200px"  class="form-control" v-select="course"  required="" v-model="course" id="course" v-form-ctrl="">
                                </select>
                                <p class="uk-text-danger uk-text-small"  v-if="applicationForm.course.$error.required" >Course is required</p>


                            </div>
                        </div>

                        <div class="  " style="margin-top: 24px">
                            <div class=" ">
                                <button  v-show="applicationForm.$valid"  class="md-btn   md-btn-small md-btn-success uk-margin-small-top action" type="submit" >Go</button>

                            </div>
                        </div>







                    </div>


                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')

    <script src="{!! url('public/assets/js/select2.full.min.js') !!}"></script>
    <script>
        $(document).ready(function(){
            $('select').select2({ width: "resolve" });


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


                options: [    ]

            },

        })

    </script>
    <script src="{!! url('public/assets/js/ajax.js') !!}"></script>



    <script type="text/javascript">
        $('#lecturer').change(function(){
            var lecturerID = $(this).val();
            var level = $("#level").val();



            if(lecturerID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/lecturer_course')}}?lecturer_id="+lecturerID+"&&level="+level ,
                    success:function(res){
                        if(res){
                            $("#course").empty();
                            $("#course").append('<option>Select Course</option>');
                            $.each(res,function(key,value){
                                $("#course").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#course").empty();
                        }
                    }
                });
            }else{
                $("#course").empty();

            }
        });

    </script>
@endsection