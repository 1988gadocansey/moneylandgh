@extends('layouts.app')


@section('style')
<style>
    
    
</style>
 <script src="{!! url('assets/js/jquery.min.js') !!}"></script>
 
        <script src="{!! url('assets/js/jquery-ui.min.js') !!}"></script>
 @inject('obj', 'App\Http\Controllers\SystemController')
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
@if((Auth::user()->level=='200BTT' || Auth::user()->level=='200H'|| Auth::user()->level=='300H'|| Auth::user()->level=='200NT') )



@endif



        
    @if($register==0)
            
    <div class="md-card">
        <div class="md-card-content">

            <p class='uk-alert uk-alert-danger'> Please contact the Finance Office your registration right has been block !</p>
            <a href="{!! url('/dashboard') !!}">Go back</a>
        </div>
    </div> 
  @endif      
        
@if($studentStatus!='In School')
    
<div class="md-card">
    <div class="md-card-content">

        <p class='uk-alert uk-alert-danger'> Please visit your HOD to clearify your academic status !</p>
        <a href="{{ url('/dashboard') }}">Go back</a>
    </div>
</div>
@endif



<h5 class="md-card-toolbar-heading-text ">
                               <div class="">Mounted Courses for {{$year }} Academic year {{$sem}} semester </a></div>
                        
                            </h5>
<form  novalidate id="wizard_advanced_form" class="uk-form-stacked"   action="" method="post" accept-charset="utf-8"  name="updateForm"  v-form>
    <input type="hidden" value=" {{ @$data->GRADUATING_GROUP }}" name="yearGroup"/>
    <input type="hidden" value=" {{ @$data->YEAR }}" name="level"/>
                {!!  csrf_field() !!}
    <div class="md-card">
      <div class="md-card-content">
                    
         
       <div class="uk-overflow-container ">
                
                     
         <center><span class="uk-text-success uk-text-bold">{!! $course->total() + $courseElective->total()!!} Records</span></center>
                
        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
               <thead>
                 <tr>
                     <th>#</th>
                     <th class="" data-priority="6">NO</th>
                      
                      <th>COURSE</th>
                     <th  style="text-align:">CODE</th>
                     
                     <th style="text-align:">CREDIT</th>

                      
                     <th style="text-align:">TYPE</th>
                     
                                      
                </tr>
             </thead>
      <tbody>
                                        
                                         @foreach($course as $courseindex=> $rows) 
                                         
                                        
                                      <?php $total[]=$rows->COURSE_CREDIT ?>
                                         
                                        <tr align="">
                                            
      
                                            <td><input type="checkbox" readonly="" onclick="return alert('please this is a compulsory course select it')"   name="core[]" value="{{@$rows->ID}}"  checked="" data-md-icheck class="ts_checkbox"></td>

      <input type="hidden" name="credit[]" value="{{ @$rows->COURSE_CREDIT }}"/>
      <td> {{ $course->perPage()*($course->currentPage()-1)+($courseindex+1) }} </td>
      <td> {{ strtoupper(@$rows->course->COURSE_NAME) }}</td>
      <td> {{ strtoupper(@$rows->course->COURSE_CODE)	 }}</td>

      <td> {{ @$rows->COURSE_CREDIT }}</td>

      <td><span class="uk-badge uk-badge-success"> {{ @$rows->COURSE_TYPE }}</span></td>

                                               
                                        </tr>
                                       
                                         @endforeach
                                         
                                      @foreach($courseElective as $courseElect=> $row) 
                                         
                                        
                                      <?php $total1[]=$row->COURSE_CREDIT ?>
                                         
                                        <tr align="">
                                            
                                              
                                            <td><input type="radio" readonly=""   id="radio_demo_1" data-md-icheck name="elective" value="{{@$row->ID}}" data-md-icheck class="ts_checkbox"></td>
                                           
                                            
                                            <td> {{ $courseElective->perPage()*($courseElective->currentPage()-1)+($courseElect+1) }} </td>
                                             <td> {{ strtoupper(@$row->course->COURSE_NAME) }}</td>
                                            <td> {{ strtoupper(@$row->course->COURSE_CODE)	 }}</td>
                                            
                                            <td> {{ @$row->COURSE_CREDIT }}</td>
                                          
                                            <td><span class="uk-badge uk-badge-primary"> {{ @$row->COURSE_TYPE }}</span></td>
                                           
                                               
                                        </tr>
                                       
                                         @endforeach
                                         
<!--                                         @foreach($courseResit as $courseResitIndex=> $rowz) 
                                         
                                        
                                      <?php //$total2[]=$rowz->COURSE_CREDIT ?>
                                         
                                        <tr align="">
                                            
                                              
                                            <td><input type="checkbox"     name="resit[]" value="{{@$rowz->ID}}" data-md-icheck class="ts_checkbox"></td>
                                          
                                             
                                            <td> {{ $courseResit->perPage()*($courseResit->currentPage()-1)+($courseResitIndex+1) }} </td>
                                             <td> {{ strtoupper(@$rowz->course->COURSE_NAME) }}</td>
                                            <td> {{ strtoupper(@$rowz->course->COURSE_CODE)	 }}</td>
                                            
                                            <td> {{ @$rowz->COURSE_CREDIT }}</td>
                                          
                                            <td><span class="uk-badge uk-badge-danger"> {{ @$rowz->COURSE_TYPE }}</span></td>
                                           
                                               
                                        </tr>
                                       
                                         @endforeach-->
                                    </tbody>
                                    
                             </table>
           
                                     
     </div>
             
                                        <div style=" margin-left: 879px">
                                            <span class="uk-text-bold uk-text-success uk-text-large">Total {!!@array_sum($total) + @array_sum($total2) !!}</span>
                                        </div>
                                        
         <input type="hidden" name="hours" value="{!!@array_sum($total2) + @array_sum($total) !!}"/>
            
        
                
        </div>
    </div>
                <div class="uk-grid" align='center'>
            <div class="uk-width-1-1">
                <input type="submit"   value="Register" id='save'  class="md-btn   md-btn-success uk-margin-small-top">
            </div>
        </div>
</form>



@endsection

@section('js')
<script>
        $(document).ready(function(){
            $("#form").on("submit",function(event){
                event.preventDefault();
       UIkit.modal.alert('Creating Course...');
         $(event.target).unbind("submit").submit();
    
                        
            });
            
    
                    
    
    });
</script>
<script src="{!! url('assets/js/select2.full.min.js') !!}"></script>
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
@endsection    