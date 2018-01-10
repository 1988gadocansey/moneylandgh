@extends('layouts.printlayout')
@section('style')
     <style>
         body{
             font-size:16px;
         }
     </style>
@endsection
@section('content')
    @inject('help', 'App\Http\Controllers\SystemController')
    <div align="" style=" margin-left: 12px">

        <div>

            <table>
                <tr>
                    <td><img style="width:1000px;height: auto" src='{{url("public/assets/img/assumption.jpg")}}'
                             style="" class="image-responsive"/>
                    </td>
                </tr>
            </table>

            <div id='letters'>
                <p><h4>PARTICULARS OF STUDENT</h4></p>
                <div style='text-align:justify;  '>Registration number: &nbsp; &nbsp; <b>  <?php echo $data->studentDetials->INDEXNO;?></b></div>
                <div style="text-align:justify;  ">Name: &nbsp; &nbsp; <b><?php echo strtoupper($data->studentDetials->NAME);?> </b></div>
                <div style='text-align:justify;  '>Programme:&nbsp; &nbsp; <b> <?php echo strtoupper( $data->studentDetials->programme->PROGRAMME); ?></b> </div>
                <div style='text-align:justify;  '>Year of study:&nbsp; &nbsp; <b><?php echo strtoupper($data->level);?> </b></div>


                <div style='text-align:justify;  '>Telephone number (mobile):&nbsp; &nbsp; <b><?php echo strtoupper($data->studentDetials->TELEPHONENO);?></b></div>

                <div style='text-align:justify;  '>Contact address: <b> &nbsp; &nbsp;<?php echo strtoupper($data->studentDetials->CONTACT_ADDRESS);?></b></div>


                <div style='text-align:justify;  '> Email: <b> <?php echo strtoupper($data->studentDetials->EMAIL);?></b> </div>



                <div style='text-align:justify; '>Date of commencement of training: &nbsp; &nbsp;<?php
                    //$dob= $newDate = date("jS F\, Y", strtotime($_POST['date']));
                    echo  strtoupper( date("jS F\, Y", strtotime($data->date_duty)));?></div>
                <p><hr /></p><p></p>
                <p><h3>PARTICULARS OF COMPANY/ORGANISATION</h3></p>

                <div style='text-align:justify;  '>Company's/Organisation's name:  &nbsp; &nbsp;<b> <?php echo strtoupper($data->company_name);?></b></div>
                <div style='text-align:justify;  '>Company's address: &nbsp; &nbsp;<b> <?php echo strtoupper($data->company_address);?> </b></div>
                <div style='text-align:justify;  '> Company's contact number(s): <b> <?php echo  $data->company_phone;?> </b></div>
                <div style='text-align:justify;  '>Company's email: &nbsp; &nbsp; <b><?php echo  $data->company_email;?></b></div>
                <div style='text-align:justify;  '>Exact location of company (using landmarks): &nbsp; &nbsp; <b><?php echo strtoupper($data->company_exact_location);?> </b></div>
                <div style='text-align:justify;  '>Name of Industry-Based Supervisor: &nbsp; &nbsp; <b> <?php echo strtoupper($data->company_supervisor);?></b>
                    <div style='text-align:justify; '> Phone number of Industry-Based Supervisor: <b> <?php echo strtoupper($data->company_supervisor_phone);?></b></div>

                    <div style='text-align:justify;  '>Subzone: &nbsp; &nbsp;<b><?php echo $data->zoneDetails->sub_zone;?></b></div>


                    <p>
                    <div align="left">  <table>
                            <tr>
                                <td> Company's Stamp and date  </td> &nbsp; &nbsp;&nbsp;
                                <td>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</td><td><img src="{{url("public/assets/img/stamp.jpg")}}" width="330" height="90"></td>
                            </tr>
                        </table>
                    </div>
                    </p>

                    <p></p>   <p></p> <p>&nbsp;</p>

                    <div style='text-align:justify; font-weight: bold;  '>--------------------------------------------  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; --------------------------------------------</div>
                    <div style="text-align:justify;  " >Signature of Industry-based supervisor and date &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Signature of student and date</div>

                    <p>
                    <hr />

                    <div align="left" style='text-align:left;  '> <b>FOR OFFICE USE</b></div>
                    <div style='text-align:justify;  '>Date form received:&nbsp; &nbsp; &nbsp; ------------------------------------------------------------------------------------------</div>
                    <p></p>
                    <div style='text-align:justify;  '>Action taken by (name & signature of officer):&nbsp; &nbsp;  -------------------------------------------------------------</div>
                    <p></p>
                    <div style='text-align:justify;  '><b>NB</b> This form must be completed and forwarded to the <b>Industrial Liaison Officer, Takoradi Technical University, Box 256, Takoradi</b>, by student concerned <b>within seven days</b> of assumption of duty.</div>
                    <p></p>
                    <div style="  font-weight:bold; text-align:justify">OFFICE DIRECT LINE 03120-22643    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;   EMAIL: iliaison.tpoly@yahoo.com</div>

                    </p>



                </div>

            <div class="footer">
                <img style="width:1000px;height: auto" src='{{url("public/assets/img/footer.jpg")}}' style=""
                     class="image-responsive"/>


            </div>

            <p>&nbsp</p>
            <div>
                <center>
                    <p style="margin-left:-100px"><?php
                        echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($data->indexno, "C39+") . '" alt="barcode"   />';
                        ?>
                    </p>
                </center>
            </div>
        </div>


    </div>


@endsection

@section('js')
    <script type="text/javascript">

        window.print();


    </script>

@endsection