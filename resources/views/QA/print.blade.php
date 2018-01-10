@extends('layouts.printlayout')
@section('style')
    <style>
        body{
            font-size:16px;
        }
    </style>
    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML =
                "<html><head><title></title></head><body>" +
                divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;


        }
    </script>
@endsection
@section('content')
    @inject('help', 'App\Http\Controllers\SystemController')
    <div align="" style=" margin-left: 12px">
        @if(!empty($data))
            <a  style="float:right"onclick="javascript:printDiv('print')" class="md-btn   md-btn-success">Click to print form</a>

        <div id="print">

            <table>
                <tr>
                    <td><img style="width:1000px;height: auto" src='{{url("public/assets/img/qualityassurance.jpg")}}'
                             style="" class="image-responsive"/>
                    </td>
                </tr>
            </table>

            <div id='letters'>
                <p><h4>PARTICULARS OF STUDENT</h4></p>
                <div style='text-align:justify;  '>Registration number: &nbsp; &nbsp; <b>  <?php echo $studentDetials->INDEXNO;?></b></div>
                <div style="text-align:justify;  ">Name: &nbsp; &nbsp; <b><?php echo strtoupper($studentDetials->NAME);?> </b></div>
                <div style='text-align:justify;  '>Programme:&nbsp; &nbsp; <b> <?php echo strtoupper( $studentDetials->programme->PROGRAMME); ?></b> </div>
                <div style='text-align:justify;  '>Assessment for the year:&nbsp; &nbsp; <b><?php echo  $year;?> , <?php echo  $sem;?></b></div>

                <div>
                    <p><center><b><h5><center>LECTURERS ASSESSED</center></h5></b></center></p>


                    <p style='text-align:justify'>
                        <div>





                            <table  class="uk-table"  border="1">
                                <tr>
                                    <th width="20">No</th>
                                    <th width="100">Lecturer</th>
                                    <th width="150">Course Name</th>
                                    <th width="78">Course Code</th>
                                    <th width="71">Delete</th>
                                </tr>
                                <tbody>
                                <?php $n=0;?>
                                @foreach($data as   $row)
                                    <?php $n++;?>



                                    <tr align="">
                                        <td><?php echo $n;?></td>
                                        <td>{{strtoupper($row->lecturerDetails->fullName)}}</td>
                                        <td>{{strtoupper($row->courseDetails->course->COURSE_NAME)}}</td>
                                        <td>{{strtoupper($row->coursecode)}}</td>
                                        <td>
                                            {!!Form::open(['action' =>['QualityAssuranceController@destroy', 'id'=>$row->lecturer], 'method' => 'DELETE','name'=>'c' ,'style' => 'display: inline;'])  !!}

                                            <button type="submit" onclick="return confirm('Are you sure you want to delete   {{$row->lecturerDetails->fullName}} -  {{ @$row->programme->PROGRAMME	 }}?')" class="uk-btn" ><i  class="sidebar-menu-icon material-icons md-18"></i>X</button>

                                            {!! Form::close() !!}</td>
                                    </tr>

                                @endforeach
                            </table>





                    <p></p>
                    <br>
                    ...................................
                    <p>DR. EMMANUEL MENSAH BAAH<br>
                        Dean, Quality Assurance Office
                        <br>
                        <br>
                        <?php   echo "Your assessment code is :". strtoupper(substr (md5($studentDetials->INDEXNO), 0, 5)); ?>
                        <br>
                    </p>
                    <p><b>NB: Assessment form must be signed  and stamped by the Dean or his representative at the Academic Quality Assurance Office. </b></p>




                </div>

                <div class="footer">
                    <img style="width:1000px;height: auto" src='{{url("public/assets/img/footer.jpg")}}' style=""
                         class="image-responsive"/>


                </div>

                <p>&nbsp</p>
                <div>
                    <center>
                        <p style="margin-left:-100px"><?php
                            echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($studentDetials->INDEXNO, "C39+") . '" alt="barcode"   />';
                            ?>
                        </p>
                    </center>
                </div>
            </div>

        @endif
        </div>


        @endsection

        @section('js')
            <script type="text/javascript">

               // window.print();


            </script>

@endsection