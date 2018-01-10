@extends('layouts.printlayout')
@section('style')
    <style>
        @page {
            size: A4;
        }
        body{
            background-image:url("{{url('public/assets/img/background.jpgs') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        @media print {

        .uk-grid, to {display: inline !important} s
                                                  #page1	{page-break-before:always;}
        .condition	{page-break-before:always;}
        #page2	{page-break-before:always;}
        .school	{page-break-before:always;}
        .page9	{page-break-inside:avoid; page-break-after:auto}
        a,
        a:visited {
            text-decoration: underline;
        }


        a[href]:after {
            content: " (" attr(href) ")";
        }

        abbr[title]:after {
            content: " (" attr(title) ")";
        }


        a[href^="javascript:"]:after,
        a[href^="#"]:after {
            content: "";
        }
        .uk-grid, to {display: inline !important}

        }
    </style>
@endsection
@section('content')
    @inject('help', 'App\Http\Controllers\SystemController')
    <div align="" style="margin-left: 12px">

        <div>


            <div id="print">


                <table border='0' style="margin-top: -59px">
                    <tr>
                        <td><img style="width:1000px;height: auto" src='{{url("public/assets/img/attachment.jpg")}}'
                                 style="" class="image-responsive"/>


                    </tr>

                </table>


                    <div align="left" style="margin-left:0; font-size:14px; font-weight:bold;"><?php   echo $help->get_letter_code(substr($data->studentDetials->PROGRAMMECODE, 0, 1), $data->level);  ?></div>




                <div class="invoice-address">
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div style='pluck; text-align:right;'>

                                <?php
                                //variable declaraions
                                $programmename = $data->studentDetials->PROGRAMMECODE;
                                $level = substr($data->level,0,1);
                                $studentLevel =  $data->level ;

                                ?>

                            </div>
                            <br><div style='text-align:right; pluck;'><?php echo date('jS F, Y');  ?> </div>
                            <!-- <br> -->
                            <br>
                            <b><?php echo strtoupper($data->addressDetails->addresses); ?></b><br>
                            <b><?php echo strtoupper($data->company_name);?></b><br>

                            <b><?php echo strtoupper($data->company_location);?> </b><br>
                            <b></b>



                        </div>

                    </div>
                </div>
            </div>

                <div class="body">


                    <div id='letter'><br><div style='text-align:left; pluck;'>Dear Sir/Madam,</div>
                        <!-- begin main Letter -->
                        <!-- starr from here  -->

                        <?php

                        if($programmename == 'HDT' && $level=='2')
                        {   // begin fashion letter  **********************************************

                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR FASHION DESIGN AND TECHNOLOGY STUDENTS</h5></center>
                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the Higher National Diploma (HND) in Fashion Design and Technology, second year students of the University are expected to undergo practical training in industry for one whole semester. </p>

                        <p style='text-align:justify; pluck;'>It is believed that the attachment programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and aquaint themselves with current technology development.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her industrial attachment programme in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>

                            <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                            <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                            <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                            <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                            <p style='text-align:justify; '>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>

                        <p style='text-align:justify;  '>For your information, all students at the University are covered by Group Personal Accident Insurance policy.</p>

                        <p style='text-align:justify; '>We count on your usual co-operation.</p>

                        <?php

                        } //end  if of fahion letter **********************************************


                        else if($programmename == 'HCE'  && $level=='2')
                        {  // begin civil letter open **********************************************  //2016 letter mr Eshun

                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR COMPETENCY-BASED TRAINING(CBT) STUDENTS</h5></center>
                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the Higher National Diploma (HND) in Civil Engineering, second year HND Civil Engineering students of the university are expected to undergo practical training in industry for a whole semester. </p>

                        <p style='text-align:justify; pluck;'>It is believed that the attachment programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and aquaint themselves with current technology development in water, sanitation and construction industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her industrial attachment programme in your organization from <b>29th January -20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>

                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>

                        <p style='text-align:justify;  '>For your information, all students at the University are covered by Group Personal Accident Insurance policy.</p>

                        <p style='text-align:justify; '>We count on your usual co-operation.</p>

                        <?php
                        } // end of civil letter  **********************************************

                        else if($programmename == 'HID'  && $level=='2')
                        {  // begin Interior design **********************************************  //2016 letter mr Eshun

                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR HND INTERIOR DESIGN AND TECHNOLOGY STUDENTS</h5></center>
                        <div style='text-align:justify; font-size:20px;'>As part of the requirement for the award of the Higher National Diploma (HND) in Interior Design and Technology students of the university are expected to undergo practical training in industry for a whole semester. </div>

                        <p style='text-align:justify; font-size:20px;'>It is believed that the attachment programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in interior design industry.</p>

                        <p style='text-align:justify; font-size:20px;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her industrial attachment programme in your organization from <b>29th January - 20 April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>

                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; font-size:20px;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>

                        <p style='text-align:justify; font-size:20px;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>

                        <p style='text-align:justify;  '>We count on your usual co-operation.</p>

                        <?php
                        } // end of interior design  **********************************************



                        else if(($programmename == 'HCE' || $programmename == 'HCEE') && $level=='2')
                        {  // begin CIVIL letter open **********************************************  //2016 interior

                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR COMPETENCY-BASED TRAINING(CBT) STUDENTS</h5></center>
                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the Higher National Diploma (HND) in Civil Engineering and Technology, second year HND Civil Engineering students of the university are expected to undergo practical training in industry for a whole semester. </p>

                        <p style='text-align:justify; pluck;'>It is believed that the attachment programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and aquaint themselves with current technology development in interior design industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her industrial attachment programme in your organization from <b>29th January - 20 April,2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>

                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance policy.</p>

                        <p style='text-align:justify; pluck;'>We count on your usual co-operation.</p>

                        <?php
                        } // end of interior **********************************************


                        else if(($programmename == 'HCBE' || $programmename == 'HCBT') && $level=='2')
                        {  // begin construction engineering and management eveing********************************************** dEC 2016

                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR CONSTRUCTION ENGINEERING AND MANAGEMENT STUDENTS</h5></center>
                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the Higher National Diploma (HND) in Construction Engineering and Management, second year students of the university are expected to undergo practical training in industry for one whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the attachment programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and aquaint themselves with current technology development.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her industrial attachment programme in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p style='pluck;'>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'><p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>

                        <p style='text-align:justify; pluck;'>It would be  appreciated if you could draw up a training programme that would afford him/her the opportunity to familiarize him/herself with all the related  sections. </p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php
                        } // end of CONSTRUCTION engineering ana management  **********************************************


                        else if(($programmename == 'BTBE' || $programmename == 'BTBE') && $level=='1')
                        {  //BEGIN BTECG BUILDING **********************************************

                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN BUILDING TECHNOLOGY  </h5></center>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B. Tech.) degree in Building Technology  at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the building industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; pluck;'>The student's particulars are as follows: </p>
                        <p style='pluck;'>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'><p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php
                        } // end of BTECH building   **********************************************

                        //****************************************************neww cilvil   ***************************************WOW
                        else if(($programmename == 'BTCE' || $programmename == 'BTCE') && $level=='2')
                        {  //BEGIN BTECG CIVIL **********************************************

                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN CIVIL ENGINEERING  </h5></center>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B. Tech.) degree in Civil Engineering at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the Civil Engineering industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; pluck;'>The student's particulars are as follows: </p>
                        <p style='pluck;'>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'><p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php
                        } // end of BTECH civil _engineering   **********************************************

                        //**************************

                        else if($programmename == 'BTP')
                        { // begin btech procurement letter  **********************************************
                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN PROCUREMENT MANAGEMENT</h5></center>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B.Tech.) degree in Procurement Management programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in commerce.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p style='pluck;'>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>


                        <?php
                        } // end btech procurement letter  **********************************************

                        else if($programmename == 'BTT')
                        { // begin btech  Tourism  **********************************************
                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN TOURISM MANAGEMENT </h5></center>

                        <p style='text-align:justify; font-size:20px;'>As part of the requirement for the award of the  Bachelor of Technology (B.Tech.) degree in Tourism Management programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; font-size:20px;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the Tourism industry.</p>

                        <p style='text-align:justify; font-size:20px;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her  internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; font-size:20px;'><p style='text-align:justify; font-size:20px;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; font-size:20px;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; font-size:20px;'>We count on your usual cooperation.</p>


                        <?php
                        }  // end of tourism maagement /****************************************************************************/


                        else if($programmename == 'BTH')
                        { // begin btech  hospitality /****************************************************************************/
                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN HOSPITALITY MANAGEMENT </h5></center>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B. Tech.) degree in Hospitality Management programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the hospitality industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20 April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p style='font-size:20px;'>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'><p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the managerial or supervisory related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php
                        }  // end of BTECH HCIM/****************************************************************************/


                        else if($programmename == 'BTSMGTS')
                        { // begin btech  SECRETARYSHIP /****************************************************************************/
                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN SECRETARYSHIP AND MANAGEMENT STUDIES  </h5></center>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B.Tech.) degree in Secretaryship and Management Studies programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in Secretaryship.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>


                        <p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php
                        }  // end of BTECH SECRETARYSHIP/****************************************************************************/


                        else if($programmename == 'BTIAG-ANIM')
                        { // begin btech  grapics -animaion option/****************************************************************************/
                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN INDUSTRIAL ARTS (GRAPHICS - ANIMATION OPTION)  </h5></center>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B. Tech.) degree in Industrial Arts programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the graphics industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p style='font-size:20px;'>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'><p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php
                        }  // end of btech- animation option /****************************************************************************/


                        else if($programmename == 'BTIAG-MULT')
                        { // begin btech  (GRAPHICS - MULTIMEDIA OPTION)  /****************************************************************************/
                        ?>

                        <center> <p style=";" class="heading_b"><h5 >  PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN INDUSTRIAL ARTS (GRAPHICS - MULTIMEDIA OPTION)  </h5></center>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B. Tech.) degree in Industrial Art programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the graphics industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p style='font-size:20px;'>

                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'><p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php
                        }  // end of t(GRAPHICS - MULTIMEDIA OPTION)  /****************************************************************************/


                        else if($programmename == 'BTIAG-PRINT')
                        { // begin btech  GRAPHICS - PRINT PRESS OPTION/****************************************************************************/
                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN INDUSTRIAL ARTS (GRAPHICS - PRINT PRESS OPTION) </h5></center>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B. Tech.) degree in Industrial Art programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the graphics industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p style='font-size:20px;'>

                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'><p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php
                        }  // end of GRAPHICS - PRINT PRESS OPTION /****************************************************************************/


                        else if($programmename == 'BTIAG-ADVT')
                        { // begin btech  GRAPHICS - ADVERTISING OPTION /****************************************************************************/
                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN INDUSTRIAL ARTS (GRAPHICS - ADVERTISING OPTION) </h5></center></p>

                        <p style='text-align:justify; pluck;'>As part of the requirement for the award of the  Bachelor of Technology (B. Tech.) degree in Industrial Art programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; pluck;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the graphics industry.</p>

                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p style='font-size:20px;'>

                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; pluck;'><p style='text-align:justify; pluck;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; pluck;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>

                        <?php

                        } // eend of BTECH graphics -advertising /****************************************************************************/


                        else if($programmename == 'BTX')
                        { // begin btech  hospitality /****************************************************************************/

                        ?>

                        <center> <p style=";" class="heading_b"><h5 >PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN INDUSTRIAL ART (TEXTILES)</h5></p></center>

                        <p style='text-align:justify; font-size:20px;'>As part of the requirement for the award of the  Bachelor of Technology (B.Tech.) degree in Textiles programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; font-size:20px;'>It is believed that the internship programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in the textiles industry.</p>

                        <p style='text-align:justify; font-size:20px;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20th April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>

                            <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                            <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                            <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                            <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                            <p style='text-align:justify; font-size:20px;'><p style='text-align:justify; font-size:20px;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; font-size:20px;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; font-size:20px;'>We count on your usual cooperation.</p>


                        <?php

                        } // end of BTECH industiral Art Textile option  /****************************************************************************/

                        else if($programmename == 'BTG')
                        { // begin btech  industiral Art printing option/****************************************************************************/

                        ?>

                        <center> <p style=";" class="heading_b"><h5>PRACTICAL INDUSTRIAL TRAINING  PROGRAMME FOR STUDENTS PURSUING BACHELOR OF TECHNOLOGY IN GRAPHIC DESIGN</h5></p></center>

                        <p style='text-align:justify; font-size:20px;'>As part of the requirement for the award of the  Bachelor of Technology (B.Tech.) degree in Graphic Design programme at Takoradi Technical University, students of the university are expected to undergo practical training in industry for a whole semester.</p>

                        <p style='text-align:justify; font-size:20px;'>It is believed that the attachment programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and acquaint themselves with current technological development in graphic design industry.</p>

                        <p style='text-align:justify; font-size:20px;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her internship in your organization from <b>29th January - 20 April, 2018</b>.</p>

                        <p style='text-align:justify; font-size:20px;'>The student's particulars are as follows: </p>
                        <p style='font-size:20px;'>
                        <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                        <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                        <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                        <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>

                        <p style='text-align:justify; font-size:20px;'><p style='text-align:justify; font-size:20px;'>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.</p>
                        <p style='text-align:justify; font-size:20px;'>For your information, all students at the University are covered by Group Personal Accident Insurance Policy.</p>
                        <p style='text-align:justify; font-size:20px;'>We count on your usual cooperation.</p>


                        <?php
                        }// end btech  industrial Art printing option/****************************************************************************/

                        else


                        {  // the rest begins
                        ?>


                    <!--  BEGIN THE REST HERE  -->

                        <center> <p style=";" class=" "><h5 >PRACTICAL INDUSTRIAL TRAINING PROGRAMME FOR STUDENTS</h5> </center>
                        <p style='text-align:justify; pluck;'>Students of Takoradi Technical University pursuing Higher National Diploma (HND)<?php //echo $help->getProgram($person[PROGRAMME]);?> are expected to undergo practical industrial training in industry as part of the requirements for the award of their certificate.</p>

                        <p style='text-align:justify; pluck;'>
                            It is believed that the attachment programme would bring positive industrial exposure to students. This exercise would enable students to put theory into practice and aquaint themselves with current technological development in industry and commerce.</p>
                        <p style='text-align:justify; pluck;'>The University would, therefore, be grateful if you could consider the under-mentioned student to undertake his/her industrial attachment programme in your organization from <b>28th May - 4th August, 2018</b>.</p>
                        <p style='text-align:justify; pluck;'> The student's particulars are as follows: </p>


                            <p><b>REGISTRATION NUMBER:</b>  <?php echo $data->studentDetials->INDEXNO;?></p>
                                    <p><b> NAME:</b>  <?php echo strtoupper($data->studentDetials->NAME);?></p>
                                    <p><b>PROGRAMME: </b> <?php echo strtoupper($data->studentDetials->programme->PROGRAMME). "  ". $studentLevel;?></p>
                                    <p> <b>CONTACT NUMBER:</b>  <?php echo $data->studentDetials->TELEPHONENO;?></p>



                        <p style='text-align:justify;  '>We request that the student should be made to familiarize him/herself with all the related sections available in your organization.
                         For your information, all students at the University are covered by Group Personal Accident Insurance policy.</p>
                        <p style='text-align:justify; pluck;'>We count on your usual cooperation.</p>


                        <?php
                        } //end the rest here
                        ?>

                        <div style='float:left;font-weight: normal;'>
                            <p style='font-size:20px;'>Yours faithfully,
                            </p>
                            <!-- <br />-->

                            <p style='font-size:16px; font-weight:bold;'>Joseph Eshun<br />
                                Head, Industrial Liaison Office </p>




                        </div>

                    </div>

                    <div class="footer">
                        <img style="width:1000px;height: auto" src='{{url("public/assets/img/footer.jpg")}}' style=""
                             class="image-responsive"/>


                    </div>



                </div>


        </div>

    </div>


@endsection

@section('js')
    <script type="text/javascript">

     window.print();


    </script>

@endsection