<?php
  session_start();
    include_once 'connect.php';
    global $emptyfield;
    global $compno;
    global $compid;


    if(isset($_POST['submit']))
      {

        if(empty($_POST['firstname'])||empty($_POST['middlename'])||empty($_POST['lastname'])||empty($_POST['gender'])||empty($_POST['age'])||empty($_POST['address'])||empty($_POST['pin'])||empty($_POST['email'])||empty($_POST['phno'])||empty($_POST['identity'])||empty($_POST['id'])||empty($_POST['district'])||empty($_POST['PoStationName'])||empty($_POST['place'])||empty($_POST['subject'])||empty($_POST['compdetail'])||empty($_POST['dates']))
        {

          $emptyfield="<h6><center><font color='red'>The required Fields Are empty.Please Fill all the Fields</font></center></h6>";
        }else
        {

      $fname=mysqli_real_escape_string($conn,$_POST['firstname']);
      $mname=mysqli_real_escape_string($conn,$_POST['middlename']);
      $lname=mysqli_real_escape_string($conn,$_POST['lastname']);
      $gend=mysqli_real_escape_string($conn,$_POST['gender']);
      $age=mysqli_real_escape_string($conn,$_POST['age']);
      $add=mysqli_real_escape_string($conn,$_POST['address']);
      $pin=mysqli_real_escape_string($conn,$_POST['pin']);
      $mail=mysqli_real_escape_string($conn,$_POST['email']);
      $contact=mysqli_real_escape_string($conn,$_POST['phno']);
      $idproof=mysqli_real_escape_string($conn,$_POST['identity']);
      $iddetail=mysqli_real_escape_string($conn,$_POST['id']);
      $district=mysqli_real_escape_string($conn,$_POST['district']);
      $policestat=mysqli_real_escape_string($conn,$_POST['PoStationName']);
      $place=mysqli_real_escape_string($conn,$_POST['place']);
      $subject=mysqli_real_escape_string($conn,$_POST['subject']);
      $compdetail=mysqli_real_escape_string($conn,$_POST['compdetail']);
      $pend="pending";
      $date= date("Y-m-d",strtotime($_POST['dates']));
      // $val=mysqli_real_escape_string($conn,$_POST['user']);


      $sql="INSERT INTO lodgecomplaint(fname,midname,lastname,gender,age,address,pincode,email,contact,idproof,iddetail,dist,policestation,place,subject,complaintdetail,status,dates) VALUES('$fname','$mname','$lname','$gend','$age','$add','$pin','$mail','$contact','$idproof','$iddetail','$district','$policestat','$place','$subject','$compdetail','$pend','$date')";

        mysqli_query($conn,$sql);

        $stat="SELECT * FROM lodgecomplaint WHERE iddetail='$iddetail'";
        $result=mysqli_query($conn,$stat);
        $resultcheck=mysqli_num_rows($result);
        if($resultcheck>0)
        {
          if($row=mysqli_fetch_assoc($result))
          {
            $compid=$row['complaint_id'];
            $compno='<h3 style="blue"><center>Please note the complaint id is '.$compid .'</center></h3>';
              header( "refresh:3; url=index.php" );
            //header("location:index.php?lodgedSuccessful");

          }
        }
      }
    }

    ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>Gujarat Police</title>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap.js"></script>

<!-- ************** Jquery active link styling *******************  -->

    <style media="screen">


      .active{

        border-bottom: 1.5px solid white;
        border-radius: 5%;
      }

      button{
        margin-right: 3.5% !important;
        color: #f7f8f3 !important;
      background-color: #281859 !important;
      }

    </style>


    <script type="application/javascript">
    $(document).ready(function(){
      $('a').click(function(){
        $('a').removeClass("active");
        $(this).addClass("active");
      });

    });

    </script>

<!-- ****************** file linking *************************************-->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="lodgestyle.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>

  <body>

    <!-- ****************** complete header *************************************-->

<div class="sticky-top">
  <!-- ****************** top header section *************************************-->

<section id="topheader">
      <div class="container">
        <div class="row">
        <header>
          <div class="col-xs-6 col-sm-3 col-md-2 col-lg-1" >
            <img src="img/gujaratpolice.png" alt="" class="" width="110px" height="110px">
              </div>
              <div class="col-xs-6 col-sm-9 col-md-10 col-lg-11">
              <h1 class="text-center heading text-responsive">citizen portal, gujarat police</h1>
              </div>
              </header>


            </div>

        </div>

</section>

<!-- ****************** navbar section *************************************-->

<section id="nav-bar">

<div class="container-fluid" >
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand " href="#"></a>
  <button class="navbar-toggler mr-auto navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav"  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class=""><i class="fas fa-bars fa-1x" style="color:#f7f8f3;"></i></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav ml-auto mr-auto">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <span class="nav-item nav-link" href="" data-target="#modal_login" data-toggle="modal">Login</span>
      <a class="nav-item nav-link active" href="lodge.php">Lodge Complaint</a>
      <a class="nav-item nav-link" href="view.php">View Complaint</a>
      <a class="nav-item nav-link" href="status.php">Complaint Status</a>
    </div>
  </div>
</nav>

</div>
</section>

</div>

<!-- ****************** header completed *************************************-->


<!-- ****************** modal login  *************************************-->

<div class="modal fade" id="modal_login">

<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">

    <div class="modal-header">
      <span style="font-size:0.975em !important;"><b>Note: </b>Strictly for Departmental Use <font color="red">*</font></span>
      <button type="button" class="close float-right" name="button" data-dismiss="modal">&times;</button>
  </div>
      <div class="modal-body">
        <div class="text-center">
        <img src="img/user.png" class="img-circle" style="width:100px; height:100px;" alt="">
        <p>Please identify yourself</p>
      </div>

        <form class="" action="login.php" method="POST">
          <div class=""  style="padding:3% 7% !important;">

          <div class="form-group row mr-auto ml-auto">
            <label for="username" class="col-sm-1 col-form-label col-form-label"> <i class="fa fa-user fa-2x" style="margin-left: 3% !important;color:#281859 !important;"></i></label>
            <div class="col-sm-11">

             <input type="text" id="username" maxlength="20" placeholder="Username" name="uid" value="" style="color:#281859 !important; background-color: #D4EAFC !important; border: 1.5px solid #c1c1c1 !important; margin-left:3%; width:95% !important;" class="form-control" >
           </div>

          </div>

          <div class="form-group row mr-auto ml-auto">
            <label for="password" class="col-sm-1 col-form-label col-form-label"> <i class="fa fa-lock fa-2x" style="margin-left: 3% !important;color:#281859 !important;"></i></label>
            <div class="col-sm-11">


            <input type="password" id="password" maxlength="35" placeholder="Password" name="pass" value="" class="form-control" style="color:#281859 !important; background-color: #D4EAFC !important; border: 1.5px solid #c1c1c1 !important; margin-left:3%; width:95% !important;">

            </div>
          </div>

          <div id="hovr" class="form-group col-xs-12" style="text-align:right; margin-right:1.5%;">
          <button type="submit" class="btn" name="loginbutton" class="float-right">Login</button>
            </div>


          <div class="" style=" padding:0 7% 0 15%; justify-content:none !important;">

              <div class="row">
                <div class="col-xs-12 mr-auto" style="justify-content:flex-start !important; float:left !important;">
                    <a href="registerid.php" class="" style="font-size: 1.25em; color:#281859 !important;">Register</a>
                </div>

              <div class="col-xs-12" style="justify-content:flex-end !important; float:right !important;">
                <a href="#" class="" style="font-size: 1.25em; color:#281859 !important;">Forgot Password</a>
              </div>

              </div>

          </div>
          </div>

        </form>

      </div>



  </div>

</div>

</div>

<!-- ****************** modal completed *************************************-->

<div class="container border">

<div class="">
<form class="" action="lodge.php" method="POST" enctype="multipart/form-data">

  <table class="table">

    <colgroup>
    		<col class="one"/>
    		<col class="two"/>
    		<col class="three"/>
    		<col class="four"/>
    	</colgroup>

    <thead>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <tr align="left" class="titles h5" height="30">
          <th colspan="4" style="color: #281859;">Register your Complain</th>
        </tr>
        </div>
    </div>
        <!--  ********************************* row 1 validation ********************************************-->

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <tr>

         <td colspan="4" align="left" style="color: #281859;padding:2% 1.3%;font-size: 1.25em;font-weight: normal;">
        <font style="margin-bottom:2%;" color="red">Please fill in the form below to register a new complain</font><br>
        <b>Note:</b> Parameters marked with a <font color="red">*</font> are mandatory
        <?php echo $emptyfield; ?>
        <?php echo $compno; ?>

       </td>
        </tr>
      </div>
      </div>


    </thead>

    <tbody>

      <!--  ********************************* row 1 District name********************************************-->
    <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="firstname">First Name of Complainant
          <font color="RED">*</font>

        </label>
      </td>
    </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1"><input placeholder="  Name" style=""  type="text" name="firstname" id="firstname" style="padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>
    </div>
    </tr>
  </div>


    <!--  ********************************* row 2 ********************************************-->
    <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="MiddleComplainantName">Middle Name of Complainant
          <font color="RED">*</font>

        </label>
        </td>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <td colspan="1"><input placeholder="  Middle name"style="" type="text" name="middlename" id="MiddleComplainantName" style="padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>
      </div>
      </tr>
    </div>
    <!--  ********************************* row 3  ********************************************-->

    <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="LastComplainantName">Last Name of Complainant
          <font color="RED">*</font>

        </label>
        </td>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <td colspan="1"><input placeholder="  Surname"style="" type="text" name="lastname" id="LastComplainantName" style="padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>

      </div>
      </tr>
    </div>

    <!--  ********************************* new row 4  col 1 gender name********************************************-->


<div class="row">
<tr>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="gender">Gender
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 4 col 2 input gender********************************************-->

      <td colspan="1" style="">
<fieldset>

    <label for=""><input style="width:auto !important;  padding:0 !important;" type="radio" name="gender" checked="checked" value="male"/> Male</label>  <br>
    <label  for=""><input style="width:auto !important; padding:0 !important;" type="radio" name="gender" value="female"/> Female </label> <br>
  </fieldset>

    </td>

    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="age">Age
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 4 col 4 input gender********************************************-->

      <td colspan="1">
<input type="number" placeholder=" Age" min="18" Max="99" id="age" name="age" style="width: 50% !important;" value="">
    </td>

    </div>

  </tr>

</div>



    <!--  ********************************* new row 5  col1 address label********************************************-->


<div class="row">
<tr>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <address class="">

    <td colspan="1">
      <label for="address">Contact Address
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 5 col 2 input gender********************************************-->

      <td colspan="1">

        <textarea name="address" id="address" rows="4" cols="" placeholder="Residential Address" style=""></textarea>
      </td>
  </address>

    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="pin">Pin Code
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 5 col 4 input pin********************************************-->

      <td colspan="1">
<input type="text" style="" maxlength="6" id="pin" pattern="[0-9]*" title="pin code must be Exactly 6 Digits Numeric Value" name="pin" value="" placeholder="City Pin Code">
    </td>

    </div>

  </tr>

</div>


<div class="row">
<tr>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="email">Email ID
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 6 col 4 input pin********************************************-->

      <td colspan="1">
<input type="email" style="" id="email" name="email" value="" placeholder="Email Address">
    </td>

    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="phone">Contact Number
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 6 col 2 input gender********************************************-->

      <td colspan="1">

        <input type="text" pattern="[0-9]*" title="Contact Number Contain Exactly 10 Digits Numeric Value" name="phno" id="phone" value="" maxlength="10" style="" placeholder="Phone Number">
      </td>

    </div>


  </tr>

</div>




<div class="row">
<tr>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="identity">Identity Proof
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 7 col 2 input gender********************************************-->

      <td colspan="1">
        <select  style="" size="1" id="identity" name="identity" type="select-one">

        <option value="-1">- Select -</option>
        <!-- <option value="Passport">Passport</option>
        <option value="Pan-Card">Pan Card</option>
        <option value="Driving License">Driving License</option>
        <option value="Voter ID">Voter ID</option>-->
        <option value="Aadhar Card">Aadhar Card</option>


      </select>

      </td>

    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="id_detail">Identity Detail
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 7 col 4 input pin********************************************-->

      <td colspan="1">
<input type="text" pattern="[0-9]*" title="Aadhar Number Contain Exactly 12 Digits Numeric Value" style="" id="id_detail" name="id" maxlength="12" value="" placeholder="Identity Number">
    </td>

    </div>

  </tr>

</div>



<div class="row">
<tr>
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

  <td colspan="1">
    <label for="proof">Identity Proof Attachment
      <font color="RED">*</font>
<small><br>Files must be less than 3 MB.<br>
Allowed file types: .pdf, .jpg.
</small>
    </label>
  </td>
</div>
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <!-- <form action="lodge.php" method="POST" enctype="multipart/form-data"> -->
  <td colspan="1">
    <input type="file" name="up" id="proof" style="" value="" class="" onchange="" onblur=""></td>
   <!--  <td><button style="height:50px !important;" name="proofattach">OK </button></td> -->
  <!-- </form> -->
      <?php
      if(isset($_POST['submit']))
      {
      $filename=$_FILES['up']['name'];
      $filetmpname=$_FILES['up']['tmp_name'];
      $filesize=$_FILES['up']['size'];
      $fileerror=$_FILES['up']['error'];
      $filetype=$_FILES['up']['type'];

      $fileext=explode('.',$filename);
      $fileactualext= strtolower(end($fileext));

      $fileallowed=array('jpg','jpeg','pdf','png');

      if(in_array($fileactualext,$fileallowed ))
      {
        if($fileerror==0)
        {
          if($filesize<3000000)
          {
            $filenamenew= $compid.$date.'.'.$fileactualext;
            $filedestination= 'proofattach/'.$filenamenew;
            move_uploaded_file($filetmpname, $filedestination);
            // header("Location:index.php?lodgedSuccssful");

          }else
          {
            echo "The file is too large";
          }

        }else{
          echo "there is an error";
        }

      }else{
        echo 'file type not allowed';
      }
    }
      ?>
      <!-- ************************END OF PHP CODE************************** -->
</div>
</tr>
</div>



<div id="" class="row">

      <tr >

        <!--  ********************************* row 8 col 1  District name********************************************-->
<div id="" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">


       <td colspan="1">
          <label for="cityDistrictcode">District/City
            <font color="RED">*</font>
          </label>

        </td>


          <!--  ********************************* row 8 col 2 input ********************************************-->

          <td colspan="1">

            <!-- <script type="text/javascript">
              $(document).ready(function () {
                $("#dist_id").change(function () {
                    var val = $(this).val();
                    if (val == "ahmdc") {
                        $("#stn_id").html("<option value='-1'>- Select -</option><option value='27'>Aslali</option><option value='31'>Bagodara</option><option value='31'>Bavla</option><option value='104'>Bopal</option><option value='1005'>Changodar</option><option value='42'>Detroj</option><option value='34'>Dhandhuka</option><option value='35'>Dholera</option><option value='30'>Dholka</option><option value='1058'>Dholka Rural</option><option value='26'>Kanbha</option><option value='32'>Koth</option><option value='11'>Mahila Police Station, Ahmedabad Rural</option><option value='41'>Mandal</option><option value='29'>Sanand</option><option value='1056'>Sanand GIDC</option><option value='2028'>Viramgam Railway</option><option value='39'>Viramgam Rural</option><option value='38'>Viramgam Town</option><option value='40'>Vitthalapur</option><option value='1054'>Vivekanand</option>");
                    } else if (val == "ahmdr") {
                        $("#stn_id").html("<option value='-1'>- Select -</option><option value='27'>Aslali</option><option value='31'>Bagodara</option><option value='31'>Bavla</option><option value='104'>Bopal</option><option value='1005'>Changodar</option><option value='42'>Detroj</option><option value='34'>Dhandhuka</option><option value='35'>Dholera</option><option value='30'>Dholka</option><option value='1058'>Dholka Rural</option><option value='26'>Kanbha</option><option value='32'>Koth</option><option value='11'>Mahila Police Station, Ahmedabad Rural</option><option value='41'>Mandal</option><option value='29'>Sanand</option><option value='1056'>Sanand GIDC</option><option value='2028'>Viramgam Railway</option><option value='39'>Viramgam Rural</option><option value='38'>Viramgam Town</option><option value='40'>Vitthalapur</option><option value='1054'>Vivekanand</option>");
                    } else if (val == "val") {
                        $("#stn_id").html("<option value='-1'>- Select -</option><option value='1880'>Bhilad</option><option value='1880'>DharamPur</option><option value='1880'>Dungara</option><option value='1880'>Dungri</option><option value='1880'>Kaprada</option><option value='1880'>Mahila Police Station, Valsad</option><option value='1880'>Nanapondha</option><option value='1880'>Pardi</option><option value='1880'>Umargam</option><option value='1880'>Umargam Marin</option><option value='1880'>Valsad ACB Police Station</option><option value='1880'>Valsad Railway</option><option value='1880'>Valsad Rural</option><option value='1880'>Valsad Town</option><option value='1880'>Vapi GIDC</option><option value='1880'>Vapi Town</option>");
                    } else if (val == "anand") {
                        $("#stn_id").html(" <option value='-1'>- Select -</option><option value='1'>Anand ACB Police Station</option><option value='1'>Anand Railway</option><option value='1'>Anand Rural</option><option value='1'>Anand Town</option><option value='1'>Anklav</option><option value='1'>Bhadran</option><option value='1'>Bhalej</option><option value='1'>Borsad City</option><option value='1'>Borsad Rural</option><option value='1'>Khambhat City</option><option value='1'>Khambhat Rural</option><option value='1'>Khambholaj</option><option value='1'>Mahelav</option><option value='1'>Mahila Police Station, Anand</option><option value='1'>Petlad Rural</option><option value='1'>Petlad Town</option><option value='1'>Sojitra</option><option value='1'>Tarapur</option><option value='1'>Umreth</option><option value='1'>Vasad</option><option value='1'>Vidyanagar</option><option value='1'>Virsad</option>");
                    } else if (val == "-1") {
                        $("#stn_id").html("<option value=''>--select one--</option>");
                    }
                });
            });
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 -->
          <select  id="cityDistrictcode" name="district" style="" type="select-one">

          <option  value="ahmdc">Ahmedabad City</option>
        <option value="Ahmedabad Rural">Ahmedabad Rural</option>
        <option value="Amreli">Amreli</option>
        <option value="anand">Anand</option>
        <option value="Arvalli">Arvalli</option>
        <option value="Banaskantha">Banaskantha</option>
        <option value="Bharuch">Bharuch</option>
        <option value="Bhavnagar">Bhavnagar</option>
        <option value="Botad">Botad</option>
        <option value="Chhotaudepur">Chhotaudepur</option>
        <option value="Dahod">Dahod</option>
        <option value="Dang">Dang</option>
        <option value="Devbhumi Dwarka">Devbhumi Dwarka</option>
        <option value="Gandhinagar">Gandhinagar</option>
        <option value="Gir Somnath">Gir Somnath</option>
        <option value="Jamnagar">Jamnagar</option>
        <option value="Junagadh">Junagadh</option>
        <option value="Kheda">Kheda</option>
        <option value="Kutch East- Gandhidham">Kutch East- Gandhidham</option>
        <option value="Kutch West- Bhuj">Kutch West- Bhuj</option>
        <option value="Mahisagar">Mahisagar</option>
        <option value="Mehsana">Mehsana</option>
        <option value="Morbi">Morbi</option>
        <option value="Narmada">Narmada</option>
        <option value="Navsari">Navsari</option>
        <option value="Panchmahal">Panchmahal</option>
        <option value="Patan">Patan</option>
        <option value="Porbandar">Porbandar</option>
        <option value="Rajkot City">Rajkot City</option>
        <option value="Rajkot Rural">Rajkot Rural</option>
        <option value="Sabarkantha">Sabarkantha</option>
        <option value="Surat City">Surat City</option>
        <option value="urat Rural">Surat Rural</option>
        <option value="Surendranagar">Surendranagar</option>
        <option value="Tapi">Tapi</option>
        <option value="Vadodara City">Vadodara City</option>
        <option value="Vadodara Rural">Vadodara Rural</option>
        <option value="Valsad">Valsad</option>
        </select>
     </td>
</div>
<!--  ********************************* row 8 col 3 police station name********************************************-->

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<td colspan="1">
  <label for="PoStationName">Police Station
    <font color="RED">*</font>
    </label>
</td>



  <!--  ********************************* row 8 col 4 input police station name********************************************-->

  <td colspan="1">
      <select id="PoStationName" style="" size="1" name="PoStationName" type="select-one">

        <option value="-1">- Select -</option>
        <option  value="ahmdc">Ahmedabad City</option>
        <option value="Ahmedabad Rural">Ahmedabad Rural</option>
        <option value="Amreli">Amreli</option>
        <option value="anand">Anand</option>
        <option value="Arvalli">Arvalli</option>
        <option value="Banaskantha">Banaskantha</option>
        <option value="Bharuch">Bharuch</option>
        <option value="Bhavnagar">Bhavnagar</option>
        <option value="Botad">Botad</option>
        <option value="Chhotaudepur">Chhotaudepur</option>
        <option value="Dahod">Dahod</option>
        <option value="Dang">Dang</option>
        <option value="Devbhumi Dwarka">Devbhumi Dwarka</option>
        <option value="Gandhinagar">Gandhinagar</option>
        <option value="Gir Somnath">Gir Somnath</option>
        <option value="Jamnagar">Jamnagar</option>
        <option value="Junagadh">Junagadh</option>
        <option value="Kheda">Kheda</option>
        <option value="Kutch East- Gandhidham">Kutch East- Gandhidham</option>
        <option value="Kutch West- Bhuj">Kutch West- Bhuj</option>
        <option value="Mahisagar">Mahisagar</option>
        <option value="Mehsana">Mehsana</option>
        <option value="Morbi">Morbi</option>
        <option value="Narmada">Narmada</option>
        <option value="Navsari">Navsari</option>
        <option value="Panchmahal">Panchmahal</option>
        <option value="Patan">Patan</option>
        <option value="Porbandar">Porbandar</option>
        <option value="Rajkot City">Rajkot City</option>
        <option value="Rajkot Rural">Rajkot Rural</option>
        <option value="Sabarkantha">Sabarkantha</option>
        <option value="Surat City">Surat City</option>
        <option value="urat Rural">Surat Rural</option>
        <option value="Surendranagar">Surendranagar</option>
        <option value="Tapi">Tapi</option>
        <option value="Vadodara City">Vadodara City</option>
        <option value="Vadodara Rural">Vadodara Rural</option>
        <option value="Valsad">Valsad</option>

      </select>
  </td>

</div>
    </tr>




  </div>
<tr>

    <!--  ********************************* row 9 col 1 ********************************************-->
    <td colspan="1" class=""><label for="place">Place of Occurence

      </label>
      </td>
      <!--  ********************************* row 9 col 2 ********************************************-->


    <td colspan="1"><input type="text" name="place"  id="place" style="" maxlength="20" value="" class="" onchange="" onblur="" placeholder="Area of Incidence"></td>

    <td class="">
    <label for="d">Date Of Occuerence
      <font color="RED">*</font>
      </label>
  </td>

  <td class="">
  <input type="date" name="dates" id="d" class="calendar hasDatepick" attrtitle="FIRDatefrom" value="02/02/2019" onchange=";" onblur="validateDate(this,errorMsg);" onkeydown="return move();" onfocus="callCalender(this)" style="width: 90% !important; padding:6px;  border:1px solid #281859;" height="20"><font class="Label3">&nbsp;</font>
  </td>

    </tr>



    <tr>

        <!--  ********************************* row 10 col 1 ********************************************-->
        <td colspan="1" class=""><label for="subject">Subject of Complaint
          <font color="RED">*</font>

          </label>
          </td>
          <!--  ********************************* row 10 col 2 ********************************************-->


        <td colspan="1">
          <input type="text" name="subject" id="subject" style="" maxlength="150" value="" class="" onchange="" onblur="" placeholder="Enter the type/matter of Complaint"></td>

        </tr>


      <tr>

          <!--  ********************************* row 11 col 1 ********************************************-->
          <td colspan="1" class=""><label for="compdetail">Complaint Detail
            <font color="RED">*</font>

            </label>
            </td>
            <!--  ********************************* row 11 col 2 ********************************************-->


          <td colspan="1">
            <textarea class="form-control" rows="6" id="compdetail" name="compdetail" cols="" style="width:175%; padding:6px;border:1px solid #281859;" placeholder="Enter the Details of Complaint."></textarea>

    </tr>

    <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="proofcase">Proof/Attachment <br> regarding the case
    <small><br>Files must be less than 3 MB.<br>
    Allowed file types: .pdf, .jpg.
    </small>
        </label>
      </td>
    </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- <form action="lodge.php" method="POST" enctype="multipart/form-data"> -->

      <td colspan="1">
        <input type="file" name="up1" id="proofcase" style="" value="" class="" onchange="" onblur=""></td>
        <!-- <td><button style="height:50px !important;" name="proofattach">OK </button></td> -->
<!--       </form> -->
      <?php
      global $success;

      if(isset($_POST['submit']))
      {
      $filename=$_FILES['up1']['name'];
      $filetmpname=$_FILES['up1']['tmp_name'];
      $filesize=$_FILES['up1']['size'];
      $fileerror=$_FILES['up1']['error'];
      $filetype=$_FILES['up1']['type'];

      $fileext=explode('.',$filename);
      $fileactualext= strtolower(end($fileext));

      $fileallowed=array('jpg','jpeg','pdf','png');

      if(in_array($fileactualext,$fileallowed ))
      {
        if($fileerror==0)
        {
          if($filesize<3000000)
          {
            $filenamenew= $compid.$date.'.'.$fileactualext;
            $filedestination= 'proofcase/'.$filenamenew;
            move_uploaded_file($filetmpname, $filedestination);
            // header("Location:index.php?lodgedSuccssful")
            $success="<h6><center>The complaint is been lodged successfully</center></h6>";

          }else
          {
            echo "The file is too large";
          }

        }else{
          echo "there is an error";
        }

      }else{
        echo 'file type not allowed';
      }
    }


    ?>
    </div>
    </tr>
    </div>


    <tr>
    <td colspan="4" align="center">
      <label for="otp">OTP
        <font color="RED">*</font>
        </label>
      <input style="width: 25% !important;" type="text" name="otp" value="" placeholder="Unique Code">
      <button  style="height:50px !important;"type="submit" value="submit" name="button">Verify OTP</button>
    </td>
    </tr>


<!--  ********************************* row 7 ********************************************-->



<tr>
<td colspan="4" align="center">
  <button type="submit" name="submit">Submit Report</button>
  <button type="reset" value="Reset" name="button">Reset</button></td>
  <?php echo $success; ?>

</tr>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<tr>

  <td colspan="4" align="left" style="color: #281859;padding:2% 1.3%;font-size: 0.8em;font-weight: normal;">
 <b> Disclaimer: </b><font color="red">Gujarat Police The Online facility of filing complaints on FIR system is for the convenience of citizens completely.<br> All efforts will be made to take quick action on the lodged complaints. Gujarat Police will not be liable in any way for any legal and other action on the basis of this facility.<br> The use of this system is prohibited as an RTI.<br> <b> Warning: </b> On giving false and misleading information to Gujarat police action can be taken under Section 182 and 211.</font>
</td>
</tr>
</div>
</div>



        </tbody>

  </table>
</form>
</div>

</div>











<footer>
  <div class="container-fluid">


<section id="foot">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<p class="text-center"> <br> &copyCopyright 2019 gujaratpolice.org / All rights reserved
Disclaimer &nbsp <br>Concept , Content and Maintenance: Gujarat Police <br></p>
</div>

</div>
</section>

</div>
</footer>
  </body>
</html>