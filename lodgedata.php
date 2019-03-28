<?php
	session_start();
    include_once 'connect.php';

      //global $success;

      //database section
      if(isset($_POST['submit']))
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


      $stat= "INSERT INTO lodgecomplaint VALUES('$fname','$mname','$lname','$gend','$age','$add','$pin','$mail','$contact','$idproof','$iddetail','$district','$policestat','$place','$subject','$compdetail','pending')";


        //mysqli_query($conn,$stat);

        if(mysqli_query($conn,$stat))
        {
        	header("location: index.php?LodgedSuccessfully");

        //echo "Done";
        //






      //file1
        // $file=$_FILES['proofattach'];
      // $filename=$_FILES['pattach']['name'];
      // $filetmpname=$_FILES['pattach']['tmp_name'];
      // $filesize=$_FILES['pattach']['size'];
      // $fileerror=$_FILES['pattach']['error'];
      // $filetype=$_FILES['pattach']['type'];

      // $fileext=explode('.',$filename);
      // $fileactualext= strtolower(end($fileext));

      // $fileallowed=array('jpg','jpeg','pdf');

      // if(in_array($fileactualext,$fileallowed ))
      // {
      //   if($fileerror==0)
      //   {
      //     if($filesize<3000000)
      //     {
      //       $filenamenew= $iddetail.".".$fileactualext;
      //       $filedestination= 'proofattach/'.$filenamenew;
      //       move_uploaded_file($filetmpname, $filedestination);

      //       header("Location: index.php");



      //     }else
      //     {
      //       echo "The file is too large";
      //     }

      //   }else{
      //     echo "there is an error";
      //   }

      // }else{
      //   echo 'file type not allowed';
      // }




      // file2
      // $file=$_FILES['proofcase'];
      // $filename=$_FILES['proofcase']['name'];
      // $filetmpname=$_FILES['proofcase']['tmp_name'];
      // $filesize=$_FILES['proofcase']['size'];
      // $fileerror=$_FILES['proofcase']['error'];
      // $filetype=$_FILES['proofcase']['type'];

      // $fileext=explode('.',$filename);
      // $fileactualext= strtolower(end($fileext));

      // $fileallowed=array('jpg','jpeg','pdf');

      // if(in_array($fileactualext,$fileallowed ))
      // {
      //   if($fileerror===0)
      //   {
      //     if($filesize<300000)
      //     {
      //       $filenamenew= uniqid('',true).".".$fileactualext;
      //       $filedestination= 'proofcase/'.$filenamenew;
      //       move_uploaded_file($filetmpname, $filedestination);



      //     }else
      //     {
      //       echo "The file is too large";
      //     }

      //   }else{
      //     echo "there is an error";
      //   }

      // }else{
      //   echo 'file type not allowed';
      // }


      // $success="The Complaint Has been lodged Successfully";




    }
   }


    else{
      header("location: index.php?error");
    }

?>
