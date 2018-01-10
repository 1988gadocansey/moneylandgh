@extends('layouts.app')


@section('style')


@endsection
@section('content')
    <div class="md-card-content">
        <div style="text-align: center;display: none" class="uk-alert uk-alert-success" data-uk-alert="">

        </div>



        <div style="text-align: center;display: none" class="uk-alert uk-alert-danger" data-uk-alert="">

        </div>


    </div>

    <h6 class="heading_c uk-margin-bottom">Industrial Liaison Assumption of duty form</h6>
    <div class="uk-width-xLarge-1-10">
        <div class="md-card">
            <div class="md-card-content" style="">


                <form  novalidate id="wizard_advanced_form" class="uk-form-stacked"       method="post" accept-charset="utf-8"  name="updateForm"  v-form>
                    <input type="hidden" name="id" value="{{@$data->id}}">
                    {!!  csrf_field() !!}
                    <div data-uk-observe="" id="wizard_advanced" role="application" class="wizard clearfix">
                        <div class="steps clearfix">
                            <ul role="tablist">

                                <li role="tab" class="fill_form_header first current" aria-disabled="false" aria-selected="true" v-bind:class="{ 'error' : !in_payment_section}">
                                    <a aria-controls="wizard_advanced-p-0" href="#wizard_advanced-h-0" id="wizard_advanced-t-0">
                                        <span class="current-info audible">current step: </span><span class="number">1</span> <span class="title">Company Information</span>
                                    </a>
                                </li>
                                <li role="tab" class="payment_header disabled" aria-disabled="true"   v-bind:class="{ 'error' : in_payment_section}" >
                                    <a aria-controls="wizard_advanced-p-1" href="#wizard_advanced-h-1" id="wizard_advanced-t-1">
                                        <span class="number">2</span> <span class="title">Terms of Aggreement</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class=" clearfix " style="box-sizing: border-box;display: block;padding:15px!important;position: relative;">

                            <!-- first section -->
                            {{-- <h3 id="wizard_advanced-h-0" tabindex="-1" class="title current">Fill Form</h3> --}}
                            <section id="fill_form_section" role="tabpanel" aria-labelledby="fill form section" class="body step-0 current" data-step="0" aria-hidden="false"   v-bind:class="{'uk-hidden': in_payment_section} ">

                                <div data-uk-grid-margin="" class="uk-grid uk-grid-width-medium-1-4 uk-grid-width-large-1-4">


                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <div class="md-input-wrapper md-input-filled"><label for="wizard_referer">Company Name :</label><input type="text" id="cname"    name="cname" class="md-input  "   required="required"     v-model="cname"  v-form-ctrl><span class="md-input-bar"></span></div>
                                            <p  class=" uk-text-danger uk-text-small  "   v-if="updateForm.cname.$error.required">Please provide company name</p>
                                        </div>
                                    </div>

                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <div class="md-input-wrapper md-input-filled"><label for="wizard_referer">Company Phone N<u>o</u> :</label><input type="text" id="cphone" name="cphone" class="md-input" data-parsley-type="digits" minlength="10"  required="required"   maxlength="10"   pattern='^[0-9]{10}$'  v-model="cphone"  v-form-ctrl><span class="md-input-bar"></span></div>
                                            <p  class=" uk-text-danger uk-text-small  "   v-if="updateForm.cphone.$invalid">Please enter a valid phone number of 10 digits</p>
                                        </div>
                                    </div>

                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <div class="md-input-wrapper md-input-filled"><label for="wizard_email">Company Email Address :</label><input type="email" id="cemail" name="cemail" class="md-input"   v-model="cemail"v-form-ctrl  ><span class="md-input-bar"></span></div>
                                            <p class="uk-text-danger uk-text-small "  v-if="updateForm.cemail.$invalid"  >Please enter a valid email address</p>

                                        </div>
                                    </div>
                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <label for="">Company Zone :</label>
                                            <div class="md-input-wrapper md-input-filled">
                                                {!!   Form::select('czone',$zone,array("required"=>"required","class"=>"md-input","id"=>"czone","v-model"=>"czone","v-form-ctrl"=>"","style"=>"width: 226px;","v-select"=>"czone")   )  !!}

                                                <span class="md-input-bar"></span>
                                            </div>
                                            <p class="uk-text-danger uk-text-small"  v-if="updateForm.czone.$error.required">Zone is required</p>
                                        </div>
                                    </div>

                                </div>

                                <div data-uk-grid-margin="" class="uk-grid uk-grid-width-medium-1-4 uk-grid-width-large-1-4">


                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <div class="md-input-wrapper md-input-filled"><label for="wizard_skype">Company Exact Location :</label><input type="text" id="clocation" name="clocation"  required=""v-form-ctrl  class="md-input"    v-model="clocation"      /><span class="md-input-bar"></span></div>
                                            <p class="uk-text-danger uk-text-small " v-if="updateForm.clocation.$error.required" >Location   is required</p>

                                        </div>
                                    </div>
                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <div class="md-input-wrapper md-input-filled"><label for="wizard_skype">Company Address :</label><input type="text" id="caddress" name="caddress"  required=""v-form-ctrl  class="md-input"    v-model="caddress"      /><span class="md-input-bar"></span></div>
                                            <p class="uk-text-danger uk-text-small " v-if="updateForm.caddress.$error.required" >Home Address is required</p>

                                        </div>
                                    </div>
                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <div class="md-input-wrapper md-input-filled"><label for="wizard_skype">Company Supervisor :</label><input type="text" id="csuper" name="csuper"  required=""v-form-ctrl  class="md-input"    v-model="csuper"      /><span class="md-input-bar"></span></div>
                                            <p class="uk-text-danger uk-text-small " v-if="updateForm.csuper.$error.required" >Company supervisor is required</p>

                                        </div>
                                    </div>

                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <label for="">Letter Addressed To :</label>
                                            <div class="md-input-wrapper md-input-filled">
                                                {!!   Form::select('cto',$address,array("required"=>"required","class"=>"md-input","id"=>"cto","v-model"=>"cto","v-form-ctrl"=>"","style"=>"width: 226px;","v-select"=>"czone")   )  !!}

                                                <span class="md-input-bar"></span>
                                            </div>
                                            <p class="uk-text-danger uk-text-small"  v-if="updateForm.cto.$error.required">Receipient Address is required</p>
                                        </div>
                                    </div>

                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <div class="md-input-wrapper md-input-filled"><label for="wizard_skype">Company town/city :</label><input type="text" id="ctown" name="ctown"  required=""v-form-ctrl  class="md-input"    v-model="ctown"      /><span class="md-input-bar"></span></div>
                                            <p class="uk-text-danger uk-text-small " v-if="updateForm.ctown.$error.required" >Company city is required</p>

                                        </div>
                                    </div>
                                    <div class="parsley-row">
                                        <div class="uk-input-group">

                                            <div class="md-input-wrapper md-input-filled"><label for="wizard_twitter">Date of duty :</label><input type="text" name="cdate" id="cdate" class="md-input cdate" data-uk-datepicker="{format:'DD/MM/YYYY'}" required="required"  v-model="cdate"  v-form-ctrl   ><span class="md-input-bar"></span></div>
                                            <p class="uk-text-danger uk-text-small " v-if="updateForm.cdate.$error.required" >Date duty is required</p>
                                        </div>
                                    </div>

                                </div>




                            </section>

                            <!-- second section -->
                            {{-- <h3 id="payment-heading-1" tabindex="-1" class="title">Payment</h3> --}}
                            <section id="payment_section" role="tabpanel" aria-labelledby="payment section" class="body step-1 "  v-bind:class="{'uk-hidden': !in_payment_section} "  data-step="1"  aria-hidden="true">
                                <h2 class="heading_a">


                                    <div data-uk-grid-margin="" class="uk-grid uk-grid-width-medium-1-4 uk-grid-width-large-1-4">

                                        <div class="parsley-row">
                                            <div class="uk-input-group">

                                                <div class="md-input-wrapper md-input-filled"><label for="wizard_referer">Supervisor phoneNo:</label><input type="text" id="csphone" name="csphone" class="md-input" data-parsley-type="digits" minlength="10"    maxlength="10"   pattern='^[0-9]{10}$'  v-model="csphone"  v-form-ctrl><span class="md-input-bar"></span></div>
                                                <p  class=" uk-text-danger uk-text-small  "   v-if="updateForm.csphone.$invalid">Please enter a valid phone number of 10 digits</p>
                                            </div>
                                        </div>
                                        <div class="parsley-row">
                                            <div class="uk-input-group">

                                                <h5>Terms & Conditions</h5>
                                                <p>I agree that information provided on this form are genuine and valid.</p>

                                                <label>
                                                    <input type="checkbox" value="1" v-model="term" name="term" id="term"    class="data-md-icheck"  v-form-ctrl data-md-icheck>
                                                    Accept Terms & Conditions
                                                </label>


                                            </div>
                                        </div>







                                    </div>

                            </section>

                        </div>
                        <div class="actions clearfix "  >
                            <ul aria-label="Pagination" role="menu">
                                <li class="button_previous " aria-disabled="true"  v-on:click="go_to_fill_form_section()"  v-show="in_payment_section==true"  >
                                    <a role="menuitem" href="#previous" >
                                        <i class="material-icons"></i> Previous
                                    </a>
                                </li>
                                <li class="button_next button"   v-on:click="go_to_payment_section()"  aria-hidden="false" aria-disabled="false"  v-show="updateForm.$valid && in_payment_section==false"  >
                                    <a role="menuitem" href="#next"  >Next
                                        <i class="material-icons">
                                        </i>
                                    </a>
                                </li>
                                <li class="button_finish "    aria-hidden="true"  v-show="updateForm.$valid && in_payment_section==true"  >
                                    <input class="md-btn md-btn-primary uk-margin-small-top final" type="button" name="submit_order"  value="Submit"   v-on:click="submit_form"  />
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>

                <div class="uk-modal" id="confirm_modal"   >
                    <div class="uk-modal-dialog"  v-el:confirm_modal>
                        <div class="uk-modal-header uk-text-large uk-text-success uk-text-center" >Confirm Data</div>
                        Are you certain of all the info
                        {{-- <div class="uk-modal-footer ">
            <center>
              <button class="md-btn md-btn-primary uk-margin-small-top" type="submit" name="submit_order" > Cancel</button>
              <button class="md-btn md-btn-primary uk-margin-small-top" type="submit" name="submit_order" > Ok</button>
              </center>
            </div> --}}
                    </div>
                </div>
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
                cname : "{{  @$data->company_name  }}",
                caddress : "{{ @$data->company_address }}",
                clocation : "{{ @$data->company_exact_location }}",
                csuper : "{{ @$data->company_supervisor }}",
                cphone: "{{  @$data->company_phone }}",
                cemail: "{{  @$data->company_email }}",
                cdate: "{{  @$data->date_duty }}",
                czone : "{{@$data->company_subzone }}",
                cto : "{{@$data->company_address_to }}",
                terms : "{{  @$data->term }}",
                csphone : "{{  @$data->company_supervisor_phone }}",
                ctown : "{{  @$data->company_town }}",



                options: [
                ],
                in_payment_section : false,
            },
            methods : {
                go_to_payment_section : function (event){
                    UIkit.modal.confirm(vm.$els.confirm_modal.innerHTML, function(){

                        vm.$data.in_payment_section=true
                    })

                },
                submit_form : function(){
                    return (function(modal){ modal = UIkit.modal.blockUI("<div class='uk-text-center'>Saving Data<br/><img class='uk-thumbnail uk-margin-top' src='{!! url('assets/img/spinners/spinner_success.gif')  !!}' /></div>"); setTimeout(function(){ modal.hide() }, 50000) })();
                },

                go_to_fill_form_section : function (event){
                    vm.$data.in_payment_section=false
                }
            }
        })

    </script>
    <script>
        $(document).ready(function(){
            $('.final').on('click', function(e){

                //alert($("#wizard_advanced_form").serialize());



                UIkit.modal.confirm("Are you sure certain with every information on this page   "
                    , function(){
                        modal = UIkit.modal.blockUI("<div class='uk-text-center'>Ok  Sending data to Industrial Liaison Office <br/><img class='uk-thumbnail uk-margin-top' src='{!! url('public/assets/img/spinners/spinner.gif')  !!}' /></div>");
                        //setTimeout(function(){ modal.hide() }, 500) })()
                        $.ajax({

                            type: "POST",
                            url:"{{ url('/liaison_assumption')}}",
                            data: $("#wizard_advanced_form").serialize(), //your form data to post goes
                            dataType: "json",
                        }). done(function(data){
                            //  var objData = jQuery.parseJSON(data);
                            modal.hide();
                            //
                            //                                     UIkit.modal.alert("Action completed successfully");

                            //alert(data.status + data.data);
                            if (data.status == 'success'){
                                $(".uk-alert-success").show();
                                $(".uk-alert-success").text(data.status + " " + data.message);
                                $(".uk-alert-success").fadeOut(8500);
                                window.location.href="{{url('/liaison/form/assumption/print')}}";
                            }
                            else{
                                $(".uk-alert-danger").show();
                                $(".uk-alert-danger").text(data.status + " " + data.message);
                                $(".uk-alert-danger").fadeOut(8000);
                            }


                        });
                    }
                );
            });


        });</script>
@endsection