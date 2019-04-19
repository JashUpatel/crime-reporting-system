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
    <link rel="stylesheet" href="status.css">
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
    <span class=""><i class="fas fa-bars fa-1x" style="margin::1.25em 0; color:#f7f8f3;"></i></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav ml-auto mr-auto">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <span class="nav-item nav-link" href="" data-target="#modal_login" data-toggle="modal">Login</span>
      <a class="nav-item nav-link" href="lodge.php">Lodge Complaint</a>
      <a class="nav-item nav-link" href="view.php">View Complaint</a>
      <a class="nav-item nav-link active" href="status.php">Complaint Status</a>
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

  <!-- ******************  status form *************************************-->


<div class="container border" style="padding:3% 10%  !important;">
<form  action="showstatus.php" method="post">

<table class="table table-border" >

  <thead>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <tr align="left" class="titles h4" height="30"><th colspan="4" style="color: #281859;">Track the Status of FIR</th>
      </tr>


    </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <tr>

     <td colspan="4" align="left" style="color: #281859; padding:2% 1.3%;font-size: 1.25em;font-weight: normal;">
     <b>Note:</b> Parameters marked with a <font color="red">*</font> are mandatory

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

    <td colspan="">
      <label for="FirstComplainantName">First Name of Complainant

      </label>
    </td>
  </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <td colspan=""><input type="text" placeholder=" Enter Name" name="FirstComplainantName" id="FirstComplainantName" style="width:100% !important; padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>
  </div>
  </tr>
</div>


  <!--  ********************************* row 2 ********************************************-->

  <!--  ********************************* row 3  ********************************************-->

  <tr>
    <td colspan="">
      <label for="LastComplainantName">Last Name of Complainant

      </label>
      </td>

      <td colspan=""><input type="text" placeholder=" Enter Surname" name="LastComplainantName" id="LastComplainantName" style="width:100% !important; padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>

  </tr>


  <tr>
    <td colspan="">
      <label for="email">Email id
        <font color="RED">*</font>

      </label>
      </td>

      <td colspan=""><input placeholder=" Enter Email ID" required type="email" name="email" id="LastComplainantName" style="width:100% !important; padding:6px;  border:1px solid #281859;" maxlength="50" value="" class="" onchange="" onblur=""></td>



  </tr>

<tr>
  <td colspan="">
    <label for="phone">Contact Number
      <font color="RED">*</font>

    </label>
    </td>

    <td colspan=""><input type="text" name="phno" required placeholder=" Enter Phone Number" id="LastComplainantName" style="width:100% !important; padding:6px;  border:1px solid #281859;" maxlength="10" value="" class="" onchange="" onblur=""></td>

</tr>

<tr>
  <td colspan="">
    <label for="id">Complaint ID
      <font color="RED">*</font>

    </label>
    </td>

    <td colspan=""><input type="text" placeholder=" Enter Complaint ID" required name="compid" id="LastComplainantName" style="width:100% !important; padding:6px;  border:1px solid #281859;" maxlength="10" value="" class="" onchange="" onblur=""></td>

</tr>


<!--  ********************************* row 7 ********************************************-->

<tr>
<td colspan="4" align="center">
<button type="submit" name="submit">Show Status</button>
<button type="reset" value="Reset" name="button">Reset</button>
</td>
</tr>


      </tbody>

</table>
</form>

</div>





  <!-- ****************** footer section *************************************-->

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
