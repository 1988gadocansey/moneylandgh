@extends('layouts.app')

 
@section('style')
 
@endsection
 @section('content')
   <div class="md-card-content">
@if(Session::has('success'))
            <div style="text-align: center" class="uk-alert uk-alert-success" data-uk-alert="">
                {!! Session::get('success') !!}
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
 <div style="">
     <div class="uk-margin-bottom" style="margin-left:1021px" >

         <a href="#" class="md-btn md-btn-small md-btn-success uk-margin-right" id="printTable">Print Table</a>
         <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
             <button class="md-btn md-btn-small md-btn-success"> columns <i class="uk-icon-caret-down"></i></button>
             <div class="uk-dropdown">
                 <ul class="uk-nav uk-nav-dropdown" id="columnSelector"></ul>
             </div>
         </div>
     </div>
 </div>
 <h5 class="card-header">Statement of Account since 1st year</h5>
 <div class="uk-width-xLarge-1-1">
    <div class="md-card">
        <div class="md-card-content">
     <div class="md-card-fsullscreen-content">
                                <div class="uk-overflow-container" id='print'>
         <center><span class="uk-text-success uk-text-bold">{!! $transaction->count()!!} Records</span></center>
                <table class="uk-table uk-table-hover uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter"> 
                                  <thead>
                                        <tr>
                                     <th class="filter-false remove sorter-false" data-priority="6">NO</th>
                                     
                                     
                                     <th>INDEXNO</th>
                                      <th data-priority="critical">NAME</th>
                                      <th>PROGRAMME</th>
                                      <th>LEVEL</th> 
                                      <th>SEMESTER</th>
                                      <th>YEAR</th>
                                      <th>BANK</th>
                                      <th>PAYMENT DETAILS</th>
                                      <th>FEE TYPE</th>
                                      <th>RECEIPT N<u>O</u></th>
                                      <th>AMOUNT</th>
                                      <th>BANK DATE</th>
                                     
                                    </thead>
                                    <tbody>
                                        
                                          @foreach($transaction as $index=> $row) 
                                         
                                        <?php $total[]=$row->AMOUNT  ?>
                                        
                                         
                                        <tr align="">
                                            <td> {{ $transaction->perPage()*($transaction->currentPage()-1)+($index+1) }} </td>
                                              <td> {{ @$row->INDEXNO }}</td>
                                            <td> {{ @$row->student->NAME }}</td>
                                            <td>{!! @$row->student->programme->PROGRAMME!!}</td>
                                            <td> {{ @$row->LEVEL }}</td>
                                            <td> {{ @$row->SEMESTER }}</td>
                                             <td> {{ @$row->YEAR }}</td>
                                            <td> {{ @$row->bank->NAME }}</td>
                                            <td> {{ @$row->PAYMENTTYPE }}</td>
                                             <td> {{ @$row->FEE_TYPE }}</td>
                                            <td> {{ @$row->RECEIPTNO }}</td>
                                            <td> {{ @$row->AMOUNT }}</td>
                                            <td> {{ @$row->TRANSDATE }}</td>
                                            
                                              
                                        </tr>
                                         @endforeach
                                    </tbody>
                                    
                             </table>
            @inject('sys', 'App\Http\Controllers\SystemController')
           
          <div style="margin-left: 1190px" class="uk-text-bold uk-text-danger"><td colspan=" ">Total Paid GHC  {{ @$sys->formatMoney(@array_sum($total)) }}</td></div>
          <hr>

       

    

        
     </div>
 
 </div>
    </div>
 </div>
 </div>
@endsection
@section('js')
 
 
 
@endsection