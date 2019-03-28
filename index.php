

<?php
//php mail function
ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port","25");
ini_set ("sendmail_from","pateljash77@gmail.com");


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if(isset($_REQUEST['email'])&&isset($_REQUEST['subject'])&&isset($_REQUEST['comment']))
{
  ini_set("sendmail_from",$_POST['email']);

  $flag='ok';
  $err=array();

//Email information
$admin_email = "degujaratpolice@gmail.com";
//$email = $_REQUEST['email'];

$email = test_input($_POST["email"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
$subject = test_input($_REQUEST['subject']);
$comment = test_input($_REQUEST['comment']);
$headers = 'From: pateljash77@gmail.com'. "\r\n" .
  'Reply-To: '.$email. "\r\n" .
  'X-Mailer: PHP/' . phpversion();
$from="pateljash77@gmail.com";
}


//send email
if(isset($_REQUEST['submit'])){
//if "email" variable is filled out, send email
if (isset($_REQUEST['email']))  {

  // code...
  if(mail($admin_email, $subject, $comment,$headers)){

    $err['feed'] = 'We Appreciate your valuable feedback!';

  }

  //if "email" variable is not filled out, display the form
  else {

    $err['nofeed'] = 'Something went wrong!';

      }

}
//Email response
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
    <link rel="stylesheet" href="homestyle.css">
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
    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
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




<!--******************* Carousel slides begin *******************************-->

<div class="container-fluid border-bottom" id="slide-border">
<!--****************** slider starts ****************************************-->
<div class="carousel slide" id="myslider" data-ride="carousel">

  <div class="carousel-inner" id="slides">

<!--****************** carousel images ****************************************-->
<div class="carousel-item active">
  <img src="img/flagc.jpg" alt="acp">
  <div class="carousel-caption">
    <h1>Gujarat Police</h1>
    <h2>Online F.I.R System</h2>
    <h3>Simplified for Complainants <br> No Queues, No Delays and Quick Response</h3>
  </div>
</div>

    <div class="carousel-item">
      <img src="img/ACP.jpg" alt="acp">
      <div class="carousel-caption">
        <h1>Online Onduty</h1>

      </div>
    </div>

    <div class="carousel-item">
      <img src="img/100.jpg" alt="acp">
      <div class="carousel-caption">
        <h1>Gujarat Police-Suggestions</h1>

      </div>
    </div>

  </div>

<!--****************** carousel indicators ************************************-->
  <ol class="carousel-indicators">
    <li data-target="#myslider" data-slide-to="0" class="active"></li>
    <li data-target="#myslider" data-slide-to="1" class=""></li>
    <li data-target="#myslider" data-slide-to="2" class=""></li>

  </ol>
<!--****************** carousel controls **************************************-->

<a href="#myslider" data-slide="prev" class="carousel-control-prev">
  <span class="carousel-control-prev-icon"></span>
</a>

<a href="#myslider" data-slide="next" class="carousel-control-next">
  <span class="carousel-control-next-icon"></span>
</a>

 </div>

</div>

<!---**************    carousel completed     *******************************-->
<!---**************    about section          *******************************-->

<section id="mid">
<div class="row align-items-center">
  <div class="col-xs-6 col-sm-8 col-md-9 col-lg-9">

    <section id="about" class="border">
    <h1 class="display-2" style="font-size:200%">Welcome to Gujarat Police</h1>
    <hr style="font-size:5em; margin-bottom:5%;">

    <p class="lead" style="">Gujarat police is constantly active for your safety and law and order in city, this is the core objective of Gujarat Police. We accept your co-operation to reduce the crime rate in the state so people can live peacefully.
<br><br> This website is a humble try to get together people and police.
Responsibility of protection and safety of the citizens of Gujarat is on prime responsibility of Gujarat Police Force.
</p>
<span id="span">for more assistance call <strong>100</strong> </span>
</section>

</div>

  <!--***************   Suggestions form      **************************-->


  <section id="contact" class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
<h1 style="text-shadow: 0px 1px 1px #c1c1c1;" class="h1 text-center">Contact Us</h1>
<hr>
<br>
    <form action="" method="post" id="hovr">
  <div class="form-group">
    <label style="text-shadow: 0px 1px 1px #c1c1c1;" for="exampleInputEmail1">Email address</label>
    <input maxlength="25" data-errormessage-value-missing="Please enter your email address" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required oninvalid="this.setCustomValidity('please provide your email address!')" oninput="setCustomValidity('')">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

  </div>
  <div class="form-group">
    <label style="text-shadow: 0px 1px 1px #c1c1c1;" for="formGroupExampleInput">Subject</label>
    <input type="text" name="subject" class="form-control" id="formGroupExampleInput" placeholder="Enter the Matter of Concern" maxlength="50" required oninvalid="this.setCustomValidity('subject cannot be left Blank!')" oninput="setCustomValidity('')">


  </div>

  <div  class="form-group">
      <label style="text-shadow: 0px 1px 1px #c1c1c1;" for="exampleFormControlTextarea1">Feedback</label>
      <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Enter your feedbacks here" required maxlength="250" oninvalid="this.setCustomValidity('please enter your feedback')" oninput="setCustomValidity('')"></textarea>



    </div>


  <button type="submit" name="submit" class="btn float-right">Send</button>

  <?php
          if(isset($err['feed']))
          {
              echo "<br><h5 style='font-size:0.75em; margin:5.5% 0;'>".$err['feed']."</h5>";
          }
          if(isset($err['nofeed']))
          {
              echo "<br><h5 style='font-size:0.75em; margin:5.5% 0;color:red;'>".$err['nofeed']."</h5>";
          }
          if (isset($emailErr)) {
            // code...
            echo "<br><h5 style='font-size:0.75em; margin:7.5% 0;color:red;'>".$emailErr."</h5>";

          }

   ?>


<!-- ******************* php mail end **************************-->
</form>

</section>

</div>


</section>

  <!--***************   Suggestions form      **************************-->



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



<?php



?>
