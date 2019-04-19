<!DOCTYPE html>
<html>
<head>

	<title>

	</title>
	<link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


		<script type="text/javascript">
		function redirect(button){
			var x = button.id;

			switch (x) {
				case '1':
				document.write();
				window.location.assign("loged.php");
					break;
				case '2':
				document.write();
				window.location.assign("loged.php");
					break;
					default:
			    return false;
	}
}

		</script>

    <style type="text/css">
#btn{
	margin: 5px 0px;

	width:150%;
	height: 45px;
}


		#data{
			margin-top: 3.5%;
			font-size: 1.25em;
		}
		#data th{
			text-transform: capitalize;
			font-size: 1.25em;
			text-shadow: 1.5px 1.5px 2.5px #c1c1c1;
			text-align: inherit;
			padding: 0 20px;
		}
		#data td{
			color: #281859;
			text-shadow: 1px 1px 1.5px #c1c1c1;
			text-transform: capitalize;

			font-weight: 400;
			padding: 0 20px;
		}

table{
	text-align: end;
}

		h3{
			text-shadow: 1px 1px 2.5px #c1c1c1;
		}
button{
		width: 200%;
		height: 50px;
	  color: white;
	  background-color: #281859;
	  border: 2px solid #c1c1c1;
	  border-radius: 8%;
}

button:hover{
  width: 200%;
	height: 50px;
  color: white;
  background-color:#281859;
  border: 2px solid #c1c1c1;
  text-shadow: 1.5px 1.5px 3px #eded67de;
  border-radius: 8%;
}

		#topheader{
		  background-color: #F7F8F3;
		  width: 100%;
		  height: auto;
			border-bottom: 2px solid #281859;
			border-radius: 2.5%;
		}



    	#logout{
    		margin-top: 3.5%;
    		display: flex;
    		align-items: center;
    		justify-content: center;

    	}
    	body{
    		margin: 0 auto;
    		padding: 0 auto;
    	}
    	body .center{
    		display: flex;
    		align-items: center;
    		justify-content: center;

    	}
    </style>
</head>
<body>
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

</div>
		<!-- PHP CODE -->

		<?php
	include_once 'connect.php';
	session_start();

	$policestation=$_SESSION['policesta'];

	//echo "logged successfully".'<br>';
	if(isset($_SESSION['uid']))
	{
		$uid=$_SESSION['uid'];
		$stat="SELECT * FROM users WHERE userid='$uid'";
		$result=mysqli_query($conn,$stat);
		$resultcheck=mysqli_num_rows($result);
		if($resultcheck>0)
		{
			if($row=mysqli_fetch_assoc($result))
			{
				$fname= $row['firstname'];
				$mname= $row['midname'];
				$lname= $row['lastname'];
				$gen= $row['gender'];
				$police=$row['policestation'];
				$desig=$row['designation'];
				$batch=$row['batchno'];


			}
		}
		else{
			echo "error";

		}
	}
	else {
		header("Location:index.php");
	}
?>


	<div id="logout">
		<table>
		<th>
			<td><h1 style="	text-shadow: 1.5px 1.5px 2.5px #c1c1c1; text-transform:capitalize;">Welcome <?php echo $fname?></h1></td>
		</th>

	</table>


	</div>
	<hr>

		<div>
			<table  class="center">
				<tr>
					<td><h3>Police Station :</h3></td>
					<td><h3>&nbsp; &nbsp;<?php echo $police ?></h3></td>
				</tr>
				<tr>
					<td><h3>Designation :</h3></td>
					<td><h3><?php echo $desig ?></h3></td>
				</tr>
				<tr>
					<td><h3>Batch Number :</h3></td>
					<td><h3><?php echo $batch ?></h3></td>
				</tr>
			</table>

		</div>



		<!-- *******************************Display Data From Table************************************* -->


		<?php

			$sql="SELECT * FROM lodgecomplaint WHERE  dist='$police'";
			$result=mysqli_query($conn,$sql);
			$resultcheck=mysqli_num_rows($result);
			if($resultcheck > 0)
			{
				?>

		<table  cellspacing="10" id="data" style="text-align:left;" class="center">

			<tr>
				<th style="width: auto;">complaint id</th>
				<th style="width: auto;">Firstname</th>
				<th style="width: auto;">last name</th>

				<th style="width: auto;">Date</th>
				<th style="width: auto;">Place</th>
				<th style="width: auto;">Subject</th>
				<th style="width: auto;">status</th>

			</tr>
			<tr style="margin-bottom:15px;">
			<?php

				while($row=mysqli_fetch_assoc($result))
				{
					$id=$row['complaint_id'];
					$firstdata=$row['fname'];
					$last=$row['lastname'];
					$status=$row['status'];
					$dat=$row['dates'];
					$dist=$row['dist'];
					$place=$row['place'];
					$sub=$row['subject'];
					$compdet=$row['complaintdetail'];
					$status=$row['status']; ?>
				<td style="width: auto;"><a href="comp.php?compid=<?=$row['complaint_id']?>" value="1" style="color:#281859; text-decoration:underline;"><?php echo $id; ?><a></td>
				<td style="width: auto;"><?php echo $firstdata; ?></td>

				<td style="width: auto;"><?php echo $last; ?></td>

				<td style="width: auto;"><?php echo $dat; ?></td>
				<td style="width: auto;"><?php echo $place; ?></td>
				<td style="width: auto;"><?php echo $sub; ?></td>
				<td style="width: auto;"><?php echo $status; ?></td>
				<td style="width: auto;">
					<!-- <form action="loged.php" method="POST">
						<input type="hidden" name="id" value="//php echo $; ?>">

						<button id="btn" class="btn" onclick="redirect()" name="accept">Accept</button>
					</form> -->
				</td>
					<form action="loged.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<td style="width: auto;">

						<button id="btn" class="btn" onclick="redirect()" name="accept">Accept</button>
						</td>
						<td>
						<button id="btn" class="btn" onclick="redirect()" name="reject">Reject</button>
						</td>
				</form>

			</tr>
			<?php }?>
		</table>
	<?php	}else{
				echo "<h1 class='center'>No new cases at this police Station</h1>";
			}


		?>
		<?php
			if(isset($_POST['accept']))
			{
				$name=$desig.". ".$fname." ".$lname;
				$val=$_POST['id'];
				$sql="UPDATE lodgecomplaint SET status='Approved', incharge='$name' WHERE complaint_id='$val'";
				mysqli_query($conn,$sql);
				echo '<script type="text/javascript">
				alert("Approved Successfully");
I
				</script>';

				echo '<meta http-equiv="refresh" content="1">';

			}
			if(isset($_POST['reject']))
			{
				$name=$desig.". ".$fname." ".$lname;
				$val=$_POST['id'];
				$sql="UPDATE lodgecomplaint SET status='Rejected', incharge='$name' WHERE complaint_id='$val'";
				mysqli_query($conn,$sql);
				echo '<script type="text/javascript">
				alert("Complaint Rejected!");
I
				</script>';
				echo '<meta http-equiv="refresh" content="1">';

			}

		?>


		<!-- *********************************ENDED DISPLAYING  Data******************************* -->
	<div id="logout">
	<form action="logout.php" method="POST" style="margin-bottom: 2.5%;">
		<button  name="logout" type="submit">LOGOUT</button>
	</form>

	</div>


	<!-- ********************************Footer********************************** -->
	<footer style="margin-top:1.75%">
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
<!-- ***************************************Footer Completed******************************** -->
</body>
</html>
