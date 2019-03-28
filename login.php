<?php
	session_start();
	include_once 'connect.php';

if(isset($_POST['loginbutton']))
	{
		$logid=mysqli_real_escape_string($conn,$_POST['uid']);
		$pass=mysqli_real_escape_string($conn,$_POST['pass']);

			if($logid=="admin"&&$pass=="admin")
			{
				$stat= "SELECT * FROM users";
				$result= mysqli_query($conn,$stat);
				$resultcheck= mysqli_num_rows($result);
					if($resultcheck>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
							echo $row['userid'].'<br>';
							echo $row['midname'].'<br>';
							echo $row['lastname'].'<br>';
							echo $row['gender'].'<br>';
							echo $row['age'].'<br>';
							echo $row['address'].'<br>';
							echo $row['pin'].'<br>';
							echo $row['contact'].'<br>';
							echo "<hr>";

						}


					}
			//echo 'Successfully loged admin';
			}
		else
		{

			$stat= "SELECT * FROM users WHERE userid='$logid'";
				$result= mysqli_query($conn,$stat);
				$resultcheck= mysqli_num_rows($result);
					if($resultcheck<1)
					{
						header("location: index.php?loginerror");
					}
					if($resultcheck>0)
					{
						if($row=mysqli_fetch_assoc($result))
						{

							if($pass==$row['password'])
							{
								$_SESSION['uid']=$row['userid'];
								$_SESSION['pass']=$row['password'];
								$_SESSION['name']=$row['firstname'];
								$_SESSION['policesta']=$row['policestation'];
								header("location: loged.php");

							}
							else {
								{
									header("location: index.php?password_incorrect");

								}
							}
						}


					}

		}
	}


?>
