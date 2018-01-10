@extends('layouts.app')


@section('style')
    <style>
.questions td{
padding:12px;
}
    </style>
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


    </div>
    <div class="md-card-content">
        <div style="text-align: center;display: none" class="uk-alert uk-alert-success" data-uk-alert="">

        </div>



        <div style="text-align: center;display: none" class="uk-alert uk-alert-danger" data-uk-alert="">

        </div>


    </div>

    <h6 class="heading_c uk-margin-bottom">Lecturer Assessment Form</h6>
    <div style='font-size: 14px;text-transform:capitalize; font-weight: bold'>(1-Extremely Poor), (2-Very Poor), (3-Poor), (4-Satisfactory), (5-Good), (6-Very Good), (7-Excellent)	</div>
    <br>
   <div style=" "> <a href="{{url('lecturer/assessment')}}" class="md-btn md-btn-success">Back to Lecturer list</a></div>

    <div class="uk-width-xLarge-1-10">
        <div class="md-card">
            <div class="md-card-content" style="">


                <form  novalidate id="wizard_advanced_form" class="uk-form-stacked"      method="post" accept-charset="utf-8"  name="updateForm"  v-form>
                    <input type="hidden" name="id" value="{{@$data->id}}">
                    {!!  csrf_field() !!}
                    <div data-uk-observe="" id="wizard_advanced" role="application" class="wizard clearfix">
                        <div class="steps clearfix">
                            <ul role="tablist">

                                <li role="tab" class="fill_form_header first current" aria-disabled="false" aria-selected="true" v-bind:class="{ 'error' : !in_payment_section}">
                                    <a aria-controls="wizard_advanced-p-0" href="#wizard_advanced-h-0" id="wizard_advanced-t-0">
                                        <span class="current-info audible">current step: </span><span class="number">1</span> <span class="title">First Page</span>
                                    </a>
                                </li>
                                <li role="tab" class="payment_header disabled" aria-disabled="true"   v-bind:class="{ 'error' : in_payment_section}" >
                                    <a aria-controls="wizard_advanced-p-1" href="#wizard_advanced-h-1" id="wizard_advanced-t-1">
                                        <span class="number">2</span> <span class="title">Second Page</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class=" clearfix " style="box-sizing: border-box;display: block;padding:15px!important;position: relative;">

                            <!-- first section -->
                            {{-- <h3 id="wizard_advanced-h-0" tabindex="-1" class="title current">Fill Form</h3> --}}
                            <section id="fill_form_section" role="tabpanel" aria-labelledby="fill form section" class="body step-0 current" data-step="0" aria-hidden="false"   v-bind:class="{'uk-hidden': in_payment_section} ">
                                <p> <b>COURSE CHARACTERISTICS</b></p>
                                <hr>

                                <table style="" class="uk-table questions" border="1">
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req"> 1)	The lecturer provided a comprehensive outline of the course at the beginning of the semester.</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="comprehensive_outline"  value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" required="" name="comprehensive_outline" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="comprehensive_outline" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="comprehensive_outline" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="comprehensive_outline" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="comprehensive_outline" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="comprehensive_outline" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">2)	A list of recommended textbooks was provided in the course outline.</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="outline_recommended_books" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="outline_recommended_books" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="outline_recommended_books" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="outline_recommended_books" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="outline_recommended_books" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="outline_recommended_books" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="outline_recommended_books" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req"> 3)	Lecturer provided his/her email, phone number, office hours and professional background.</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="lecturer_person_details" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="lecturer_person_details" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="lecturer_person_details" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="lecturer_person_details" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="lecturer_person_details" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="lecturer_person_details" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="lecturer_person_details" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req"> 4)	The course objectives and learning outcomes are clearly spelt out in the course outline.</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_spelt" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_spelt" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_spelt" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_spelt" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_spelt" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_spelt" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_spelt" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req"> 5)	Lecturer provided a list of course materials needed for the course.</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_material_list" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_material_list" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_material_list" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_material_list" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_material_list" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_material_list" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_material_list" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <tr>
                                        <!--row begin-->
                                        <td><b>ATTENDANCE</b>
                        </div>
                        </td>
                        <td><label class="radio-inline"></label></td>
                        </tr>
                        <!--Row End-->
                        <tr>
                            <!--row begin-->
                            <td><div  class="form-group">
                                    <label for="label" class="req"> 6)	Lecturer started classes in the week it was supposed to begin.</label>
                                </div></td>
                            <td><div  class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="class_start_week" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                        1 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_start_week" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                        2 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_start_week" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                        3 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_start_week" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                        4 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_start_week" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                        5 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_start_week" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                        6 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_start_week" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                        7 </label>
                                </div></td>
                        </tr>
                        <!--Row End-->
                        <tr>
                            <!--row begin-->
                            <td><div  class="form-group">
                                    <label for="label" class="req"> 7)	Lecturer met class regularly.</label>
                                </div></td>
                            <td><div  class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="class_met_regularly" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                        1 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_met_regularly" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                        2 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_met_regularly" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                        3 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_met_regularly" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                        4 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_met_regularly" value="5" data-parsley-required="true" data-parsley-trigger="change" required="" />
                                        5 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_met_regularly" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                        6 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="class_met_regularly" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                        7 </label>
                                </div></td>
                        </tr>
                        <!--Row End-->
                        <tr>
                            <!--row begin-->
                            <td><div  class="form-group">
                                    <label for="label" class="req">8)	Lecturer was punctual to class.</label>
                                    <div>
                            </td>
                            <td><div  class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_punctual" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                        1 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_punctual" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                        2 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_punctual" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                        3 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_punctual" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                        4 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_punctual" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                        5 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_punctual" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                        6 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_punctual" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                        7 </label>
                                </div></td>
                        </tr>
                        <!--Row End-->
                        <tr>
                            <!--row begin-->
                            <td><div  class="form-group">
                                    <label for="label" class="req"> 9)	When lecturer misses class for a good reason, he/she reschedules it.</label>
                                </div></td>
                            <td><div  class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_missed_reason" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                        1 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_missed_reason" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                        2 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_missed_reason" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                        3 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_missed_reason" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                        4 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_missed_reason" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                        5 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_missed_reason" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                        6 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_missed_reason" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                        7 </label>
                                </div></td>
                        </tr>
                        <!--Row End-->
                        <tr>
                            <!--row begin-->
                            <td><div  class="form-group">
                                    <label for="label" class="req"> 10)	The lecturer usually stays throughout the entire period.</label>
                                </div></td>
                            <td><div  class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_stays_period" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                        1 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_stays_period" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                        2 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_stays_period" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                        3 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_stays_period" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                        4 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_stays_period" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                        5 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_stays_period" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                        6 </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lecturer_stays_period" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                        7 </label>
                                </div></td>
                        </tr>



                                </table>
                                <p></p>

                                <p> <b>MODE OF DELIVERY</b></p>
                                <hr>
                                <table class="uk-table questions" border="1">
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">11)	The Lecturer demonstrated knowledge of the subject matter</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="demonstrate_knowledge" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="demonstrate_knowledge" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="demonstrate_knowledge" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="demonstrate_knowledge" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="demonstrate_knowledge" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="demonstrate_knowledge" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="demonstrate_knowledge" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">12)	The Lecturer&rsquo;s delivery was well organized and systematic</label>
                                                <div>
                                        </td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="well_organised_delivery" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="well_organised_delivery" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="well_organised_delivery" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="well_organised_delivery" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="well_organised_delivery" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="well_organised_delivery" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="well_organised_delivery" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">13)	The Lecturer effectively communicated  what he/she was teaching. </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="communicate_effectively" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="communicate_effectively" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="communicate_effectively" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="communicate_effectively" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="communicate_effectively" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="communicate_effectively" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="communicate_effectively" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">14)	The Lecturer used class time to fully promote learning. </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="class_time_prom_learn" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="class_time_prom_learn" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="class_time_prom_learn" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="class_time_prom_learn" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="class_time_prom_learn" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="class_time_prom_learn" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="class_time_prom_learn" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">15)	The Lecturer used varying teaching methodology (Lecturers, demonstrations, presentations etc) </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="varying_teaching_meth" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="varying_teaching_meth" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="varying_teaching_meth" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="varying_teaching_meth" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="varying_teaching_meth" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="varying_teaching_meth" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="varying_teaching_meth" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">16)	The Lecturer encouraged students participation. </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_stud_participation" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_stud_participation" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_stud_participation" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_stud_participation" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_stud_participation" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_stud_participation" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_stud_participation" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">17)	The Lecture encouraged problem solving. </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_problem_solving" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_problem_solving" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_problem_solving" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_problem_solving" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_problem_solving" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_problem_solving" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="encourage_problem_solving" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">18)	The Lecturer was responsive to student&rsquo;s questions and concerns.</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="respond_to_stud_concerns" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="respond_to_stud_concerns" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="respond_to_stud_concerns" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="respond_to_stud_concerns" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="respond_to_stud_concerns" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="respond_to_stud_concerns" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="respond_to_stud_concerns" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">19)	Lecturer used  any other media to deliver lectures(e.g. flipchart, teaching/learning aids e.t.c.). </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="other_media_delivery" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="other_media_delivery" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="other_media_delivery" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="other_media_delivery" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="other_media_delivery" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="other_media_delivery" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="other_media_delivery" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">20)	The Lecturer made room for questions and expression opinions. </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="room_for_question" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="room_for_question" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="room_for_question" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="room_for_question" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="room_for_question" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="room_for_question" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="room_for_question" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                </table>



                            </section>

                            <!-- second section -->
                            {{-- <h3 id="payment-heading-1" tabindex="-1" class="title">Payment</h3> --}}
                            <section id="payment_section" role="tabpanel" aria-labelledby="payment section" class="body step-1 "  v-bind:class="{'uk-hidden': !in_payment_section} "  data-step="1"  aria-hidden="true">

                                <table style="" class="uk-table questions" border="1">
                                    <tr>
                                        <!--row begin-->
                                        <td width="619"><b>ASSESSMENT</b> </td>
                                        <td width="433"><label class="radio-inline" >(1-Extremely Poor), (2-Very Poor), (3-Poor), (4-Satisfactory), (5-Good), (6-Very Good), (7-Excellent)</label>
                                            <label class="radio-inline"></label>
                                        </td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req"> 21)	The Lecturer gave adequate assignments/quizzes(minimum of 2). </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="adequate_assignment" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="adequate_assignment" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="adequate_assignment" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="adequate_assignment" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="adequate_assignment" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="adequate_assignment" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="adequate_assignment" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">22)	Expected time for student to receive feedback on assignments or
                                                    discussions is stated. </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="state_feedback_time" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="state_feedback_time" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="state_feedback_time" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="state_feedback_time" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="state_feedback_time" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="state_feedback_time" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="state_feedback_time" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">23)	Marked assignment/quizzes were returned on time. </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="mark_assignment" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="mark_assignment" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="mark_assignment" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="mark_assignment" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="mark_assignment" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="mark_assignment" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="mark_assignment" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">24)	Assignments or Quizzes were subsequently discussed in class or at tutorials </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="discuss_in_class" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="discuss_in_class" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="discuss_in_class" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="discuss_in_class" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="discuss_in_class" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="discuss_in_class" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="discuss_in_class" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">25)	The Lecturer was genuinely concerned with students&rsquo; progress. </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_progress_concern" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_progress_concern" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_progress_concern" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_progress_concern" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_progress_concern" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_progress_concern" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_progress_concern" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">26)	Expectations of student&rsquo; responsibilities are stated eg. Attending classes regularly, early etc</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_responsibility" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_responsibility" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_responsibility" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_responsibility" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_responsibility" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_responsibility" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="stud_responsibility" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">27)	Deadlines for assignments, projects, quizzes, exams etc are specified </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="deadline_assignment" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="deadline_assignment" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="deadline_assignment" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="deadline_assignment" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="deadline_assignment" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="deadline_assignment" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="deadline_assignment" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">28)	The marks for each assignment and final course grading scale is disclosed</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="disclose_marks" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="disclose_marks" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="disclose_marks" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="disclose_marks" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="disclose_marks" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="disclose_marks" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="disclose_marks" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">29)	Lecturer's policies on late submission of assignments are explained
                                                    In class </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="late_submission_policy" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="late_submission_policy" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="late_submission_policy" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="late_submission_policy" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="late_submission_policy" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="late_submission_policy" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="late_submission_policy" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">30)	A variety of assessment methods are used in class (Class test, quiz, practicals, group assignments, presentation etc.)</label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="variety_assignment_used" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="variety_assignment_used" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="variety_assignment_used" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="variety_assignment_used" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="variety_assignment_used" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="variety_assignment_used" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="variety_assignment_used" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">31)	Assessment methods and learning activities help to achieve course
                                                    Objectives and learning outcomes </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_achieved" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_achieved" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_achieved" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_achieved" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_achieved" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_achieved" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="course_objective_achieved" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">32)	What is expected of students regarding assignments, quizzes,
                                                    Presentations and projects are clearly communicated to them </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="expectations_communicated" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="expectations_communicated" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="expectations_communicated" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="expectations_communicated" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="expectations_communicated" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="expectations_communicated" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="expectations_communicated" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><b>HANDOUT/COURSE MATERIALS
                                                </label>
                                            </b> </td>
                                        <td><b>
                                                <label class="radio-inline"> Yes </label>
                                                <label class="radio-inline">No </label>
                                            </b> </td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">33)	The Lecturer sold hand-outs to students(not authored books).</label>
                                            </div></td>
                                        <td>
                                            <div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="sold_handout"  value="Yes" data-parsley-required="true" data-parsley-trigger="change" />
                                                    Yes </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sold_handout"  value="No" data-parsley-required="true" data-parsley-trigger="change" />
                                                    No </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><b>GENERAL ATMOSPHERE IN CLASS </b> </td>
                                        <td><div style='float:left;font-weight: bold; color: #951111'>

                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                    <tr>
                                        <!--row begin-->
                                        <td><div  class="form-group">
                                                <label for="label" class="req">34)	The Lecturer created friendly atmosphere whenever he/she came to
                                                    class </label>
                                            </div></td>
                                        <td><div  class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="created_friendly_atmosphere" value="1" data-parsley-required="true" data-parsley-trigger="change" />
                                                    1 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="created_friendly_atmosphere" value="2" data-parsley-required="true" data-parsley-trigger="change" />
                                                    2 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="created_friendly_atmosphere" value="3" data-parsley-required="true" data-parsley-trigger="change" />
                                                    3 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="created_friendly_atmosphere" value="4" data-parsley-required="true" data-parsley-trigger="change" />
                                                    4 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="created_friendly_atmosphere" value="5" data-parsley-required="true" data-parsley-trigger="change" />
                                                    5 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="created_friendly_atmosphere" value="6" data-parsley-required="true" data-parsley-trigger="change" />
                                                    6 </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="created_friendly_atmosphere" value="7" data-parsley-required="true" data-parsley-trigger="change" />
                                                    7 </label>
                                            </div></td>
                                    </tr>
                                    <!--Row End-->
                                </table>

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
                        modal = UIkit.modal.blockUI("<div class='uk-text-center'>Ok  Sending data to Academic Quality Assurance Office <br/><img class='uk-thumbnail uk-margin-top' src='{!! url('public/assets/img/spinners/spinner.gif')  !!}' /></div>");
                        //setTimeout(function(){ modal.hide() }, 500) })()
                        $.ajax({

                            type: "POST",
                            url:"{{ url('/lecturer_assessment_wizard')}}",
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
                                window.location.href="{{url('/lecturer/assessment/print')}}";
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