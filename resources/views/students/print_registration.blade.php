<style>
.uk-table td {
    border-bottom-color: none;
}
</style>
@extends('layouts.printlayout')

@section('content')
@inject('help', 'App\Http\Controllers\SystemController')
<div align="" style="margin-left: 12px">
<style>
    .profile td {
    border-bottom-color: white;
}
 
td{
        font-size: 13px
    }
    .biodata{
        border-collapse: collapse;
    border-spacing: 0;
    
    margin-bottom: 15px;
    }
    .biodata td{
        padding:4px;
    }
    
    .uk-table {
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 15px;
    width:826px;
}
        </style>
         <div   class="uk-grid" data-uk-grid-margin>

                <body>
                <div id="print">

                    
                             
            
                        <table border='0'>
                            <tr>
                                <td> <img  style="width:1000px;height: auto" src='{{url("public/assets/img/header.jpg")}}' style=""  class="image-responsive"/> 

                                 
                            </tr>

                        </table>
                      
                            <div  >

                                <table border='0' align="center"  width='900px'>
                                    <tr>
                                        <td width="" style="width:69%">
                                            <div class="table-responsive" style="margin-left:1PX">
                                                <table border='0' class="uk-table uk-table-nowrap uk-table-no-border profile" width=""  style="margin-left:-1%" >
                                                    <tbody><tr>
                                                            <td>NAME</td> <td style="padding-right: 36px;" class="uk-text-bold">{{$student->NAME}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td style="padding-right: px;">INDEX NO</td> <td style="padding-right: 93px;" class="uk-text-bold">{{$student->INDEXNO}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>LEVEL</td> <td style="padding-right: 203px;" class="uk-text-bold">{{$student->LEVEL}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>YEAR</td> <td style="padding-right: 203px;" class="uk-text-bold">{{$year}}    SEMESTER: {{$sem}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>PROGRAMME</td> <td style="padding-right: 177px;" class="uk-text-bold"> {{strtoupper($student->programme->PROGRAMME)}}</td>
                                                        </tr>
                                                         <tr>
                                                            <td>DEPARTMENT</td> <td style="padding-right: 177px;" class="uk-text-bold"> {{ strtoupper($help->getDepartmentName($help->getProgramDepartment($student->PROGRAMMECODE))) }}</td>
                                                        </tr>
                                                         <tr>
                                                            <td>FACULTY</td> <td style="padding-right: 177px;" class="uk-text-bold"> {{ strtoupper($help->getSchoolName($help->getSchoolCode($help->getProgramDepartment($student->PROGRAMMECODE)))) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>DATE</td> <td style="padding-right: 177px;" class="uk-text-bold"> <script> document.write(new Date().toLocaleDateString()); </script> </td>
                                                        </tr>

                                                    </tbody></table> </div>
                                        </td>
                                        <td width="15">&nbsp;						  </td>
                                        <td width="237" align="left" valign="top"><table width="237" border="0" bordercolor="#D3E5FA" style="">
                                                <tr>
                                                    <td width="202" ><div style=" ">

                                                            @if(substr(Auth::user()->level, 0, 3 ) === "100" || substr(Auth::user()->level, 0, 3 ) === "500"  )
                                                                <img   style="width:165px;height:auto;margin-left:-5px" <?php
                                                                $pic = $student->STNO;
                                                                echo $help->picture("{!! url(\"public/albums/applicants/$pic.jpg\") !!}", 210)
                                                                ?>  src="http://application.ttuportal.com/public/uploads/photos/{{$pic}}.jpg"alt="photo"     />




                                                            @else
                                                                <img style="width:165px;height:auto;margin-left:-5px"    {!! $help->picture('{{url("public/albums/students/$student->INDEXNO")}}',210) !!} src='{{url("public/albums/students/$student->INDEXNO".'.JPG')}}' alt=" Picture of Student Here" /></div>

                                                        @endif
                                                        <p align="center">&nbsp;</p></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    </tr>
                                </table> <!-- end basic infos -->


                                <table class="uk-table uk-table-nowrap uk-table-hover" id=""> 
                                    <thead>
                                        <tr>

                                            <th class="uk-text-bold">NO</th>

                                            <th class="uk-text-bold">COURSE</th>
                                            <th class="uk-text-bold" style="text-align:">CODE</th>

                                            <th class="uk-text-bold"style="text-align:center">CREDIT</th>





                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($course as $courseindex=> $rows) 


                                        <?php $total[] = $rows->credits ?>

                                        <tr align="">



                                            <td> {{ $course->perPage()*($course->currentPage()-1)+($courseindex+1) }} </td>
                                            <td> {{ strtoupper(@$rows->courseMount->course->COURSE_NAME) }}</td>
                                            <td> {{ strtoupper(@$rows->courseMount->course->COURSE_CODE)	 }}</td>

                                            <td class="uk-text-center"> {{ @$rows->credits }}</td>



                                        </tr>

                                        @endforeach


                                    </tbody>

                                </table>
                                 
                                <div style="margin-left:684px">
                                    <span class="uk-text-bold uk-text-success uk-text-large">Total {!! @array_sum($total)!!}</span>
                                </div>
                                <p>&nbsp;</p>
                                <div class="visible-print text-center" align='center'>
                                <table width="809" height="90" border="0" align="center">
                                    <tr>
                                        <td width="362"><p>.................................................................</p>
                                            <p align='centerm' style="margin-left:44px">Student's Signature</p></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                             <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td width="431"><p align="">.................................................................</p>
                                            <p align="centerm" style="margin-left:44px">Faculty Officer Signature</p></td>
                                    </tr>
                                </table>
                                 
                                 
                  
                                </div>
                               
                            </div>
                  <div class="footer">
                        <img  style="width:1000px;height: auto" src='{{url("public/assets/img/footer.jpg")}}' style=""  class="image-responsive"/> 
                    </div> 
                    <p>&nbsp</p>
                                   <center><p style="margin-left:-100px"><?php 
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($student->INDEXNO, "C39+") . '" alt="barcode"   />';
?>   </p></center>            
</div>
                            </tr>
                        </table></th>
                        </tr>
                        <tr></tr>
                    </table>

                    
                   
                </div>

        </div>


        @endsection

        @section('js')
        <script type="text/javascript">

         window.print();
 

        </script>

        @endsection