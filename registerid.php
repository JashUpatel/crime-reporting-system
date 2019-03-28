<?php
  session_start();
  include_once 'connect.php';
  global $error;
  global $error1;
  global $empty;
  global $suc;

  if(isset($_POST['submit'])){


    if(empty($_POST['firstname'])||empty($_POST['middlename'])||empty($_POST['lastname'])||empty($_POST['gender'])||empty($_POST['age'])||empty($_POST['address'])||empty($_POST['pin'])||empty($_POST['email'])||empty($_POST['phno'])||empty($_POST['postname'])||empty($_POST['policestation'])||empty($_POST['uid'])||empty($_POST['bno'])||empty($_POST['pwd'])||empty($_POST['confirmpwd']))
    {

      $empty="<h6><center><font color='red'>The required Fields Are empty.Please Fill all the Fields</font></center></h6>";


    }else{

    $fname=mysqli_real_escape_string($conn,$_POST['firstname']);
    $mname=mysqli_real_escape_string($conn,$_POST['middlename']);
    $lname=mysqli_real_escape_string($conn,$_POST['lastname']);
    $gend=mysqli_real_escape_string($conn,$_POST['gender']);
    $age=mysqli_real_escape_string($conn,$_POST['age']);
    $add=mysqli_real_escape_string($conn,$_POST['address']);
    $pin=mysqli_real_escape_string($conn,$_POST['pin']);
    $mail=mysqli_real_escape_string($conn,$_POST['email']);
    $contact=mysqli_real_escape_string($conn,$_POST['phno']);
    $desig=mysqli_real_escape_string($conn,$_POST['postname']);
    $psta=mysqli_real_escape_string($conn,$_POST['policestation']);
    $userid=mysqli_real_escape_string($conn,$_POST['uid']);
    $bno=mysqli_real_escape_string($conn,$_POST['bno']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
    $conf=mysqli_real_escape_string($conn,$_POST['confirmpwd']);

    if($pwd != $conf){
      $error = "<h4><center>Sorry Password does not match</center></h4>";
    }else{
        $sql="SELECT * FROM users WHERE userid='$userid'";
        $result=mysqli_query($conn,$sql);
        $resultcheck=mysqli_num_rows($result);
        if($resultcheck>0)
        {
          $error1= "<h4><center>The user already exist</center></h4>";
        }
        else{
      $stat= "INSERT INTO users VALUES('$fname','$mname','$lname','$gend','$age','$add','$pin','$mail','$contact','$desig','$psta','$userid','$bno','$pwd','$conf')";
      if(mysqli_query($conn,$stat)){
        header("location:index.php?Registration_Successful");
      }
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
      <a class="nav-item nav-link" href="lodge.php">Lodge Complaint</a>
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
      <span style="font-size:0.975em !important;"><b>Note: </b> Strictly for Departmental Use <font color="red">*</font></span>
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

             <input type="text" maxlength="20" placeholder="Username" name="" value="" style="color:#281859 !important; background-color: #D4EAFC !important; border: 1.5px solid #c1c1c1 !important; margin-left:3%; width:95% !important;" class="form-control" >
           </div>

          </div>

          <div class="form-group row mr-auto ml-auto">
            <label for="password" class="col-sm-1 col-form-label col-form-label"> <i class="fa fa-lock fa-2x" style="margin-left: 3% !important;color:#281859 !important;"></i></label>
            <div class="col-sm-11">


            <input type="password" maxlength="10" placeholder="Password" name="" value="" class="form-control" style="color:#281859 !important; background-color: #D4EAFC !important; border: 1.5px solid #c1c1c1 !important; margin-left:3%; width:95% !important;">

            </div>
          </div>

          <div id="hovr" class="form-group col-xs-12" style="text-align:right; margin-right:1.5%;">
          <button type="submit" class="btn" name="button" class="float-right">Login</button>
            </div>


          <div class="" style=" padding:0 7% 0 15%; justify-content:none !important;">

              <div class="row">
                <div class="col-xs-12 mr-auto" style="justify-content:flex-start !important; float:left !important;">
                    <a href="#" class="" style="font-size: 1.25em; color:#281859 !important;">Register</a>
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
<form class="" action="registerid.php" method="POST">

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
          <th colspan="4" style="color: #281859;">Register The User</th>
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
        <?php echo $empty; ?>
        <?php echo $suc; ?>
        <?php echo $error1; ?>
        <?php echo $error; ?>

       </td>


        </td>
        </tr>
      </div>
      </div>


    </thead>

    <tbody>

      <!--  ********************************* row 1 Fist Name********************************************-->
    <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="Firstname">Firstname
          <font color="RED">*</font>

        </label>
      </td>
    </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1"><input placeholder="  Firstname" style=""  type="text" name="firstname" id="Firstname" style="padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>
    </div>
    </tr>
  </div>


    <!--  ********************************* row 2 ********************************************-->
    <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="Middlename">Middle Name
          <font color="RED">*</font>

        </label>
        </td>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <td colspan="1"><input placeholder="  Middle Name"style="" type="text" name="middlename" id="Middlename" style="padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>
      </div>
      </tr>
    </div>
    <!--  ********************************* row 3  ********************************************-->

    <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="LastName">Last Name
          <font color="RED">*</font>

        </label>
        </td>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <td colspan="1"><input placeholder="  LastName"style="" type="text" name="lastname" id="LastName" style="padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>

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
<input type="number" placeholder=" Age" min="18" Max="99" name="age" style="width: 50% !important;" value="">
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
      <label for="address">Address
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 5 col 2 input gender********************************************-->

      <td colspan="1">

        <textarea name="address" rows="4" cols="" placeholder="Residential Address" style="" maxlength="250"></textarea>
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
<input type="text" style="" name="pin" value="" maxlength="6" placeholder="City Pin Code">
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
<input type="email" style="" name="email" value="" placeholder="Email Address">
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

        <input type="text" name="phno" value="" maxlength="10" style="" placeholder="Phone Number">
      </td>

    </div>


  </tr>

</div>




<div class="row">
<tr>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="identity">Designation
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 7 col 2 input gender********************************************-->

      <td colspan="1">
        <select  style="" size="1" name="postname" type="select-one" id="identity">

        <option value="-1">- Select -</option>
        <option value="SP">SP</option>
        <option value="DSP">DSP</option>
        <option value="PSI">PSI</option>
        <option value="PI">PI</option>
        <option value="CONSTABLE">CONSTABLE</option>


      </select>

      </td>

    </div>


    <!-- *************************************************Select police station****************************************** -->

    <div class="row">
<tr>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan="1">
      <label for="policestation">District
        <font color="RED">*</font>
        </label>
    </td>

      <!--  ********************************* row 7 col 2 input gender********************************************-->

      <td colspan="1">
        <select  style="" size="1" name="policestation" id="policestation" type="select-one">

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




      <!-- **********************************USER ID************************************ -->
      <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="Userid">User ID
          <font color="RED">*</font>

        </label>
        </td>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <td colspan="1"><input placeholder="  User ID"style="" type="text" name="uid" id="Userid" style="padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>

      </div>
      </tr>
    </div>
          <!-- ********************************BATCH NO******************************************* -->
          <div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="Batchno">Batch Number
          <font color="RED">*</font>

        </label>
        </td>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <td colspan="1"><input placeholder="  Batch Number"style="" type="text" name="bno" id="Batchno" style="padding:6px;  border:1px solid #281859;" maxlength="8" value="" class="" onchange="" onblur=""></td>

      </div>
      </tr>
    </div>
          <!-- ***********************************ENDED BATCHNO********************************************* -->

       <!-- ****************************************USER ID COMPLETED***************************************** -->
       <!-- *****************************password****************************************** -->
      <div class="row">
          <tr>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            <td colspan="1">
              <label for="Password">Password
                <font color="RED">*</font>

              </label>
              </td>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

              <td colspan="1"><input placeholder="  Password"style="" type="password" name="pwd" id="Password" style="padding:6px;  border:1px solid #281859;" maxlength="18" value="" class="" onchange="" onblur=""></td>

            </div>
            </tr>
          </div>


          <!-- ************************************************Completed password***************************************** -->


<div class="row">
    <tr>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <td colspan="1">
        <label for="Confirmpassword">Confirm Password
          <font color="RED">*</font>

        </label>
        </td>


      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <td colspan="1"><input placeholder="  Confimr Password"style="" type="password" name="confirmpwd" id="Confirmpassword" style="padding:6px;  border:1px solid #281859;" maxlength="18" value="" class="" onchange="" onblur=""></td>

      </div>
      </tr>
    </div>
   <!--  <div class="text-danger">

      <p>Sorry the password is wrong  </p>
    </div> -->



<!--   ********************************* row 7 ******************************************** -->

<tr>
<td colspan="4" align="center">
  <button type="submit" name="submit">Submit Report</button>
  <button type="reset" value="Reset" name="">Reset</button></td>
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
