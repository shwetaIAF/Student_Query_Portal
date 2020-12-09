<?php
		$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


</head>
<br><br><br><br><br><br>
<br>
<br>
<form action="" method="POST">
	
			<div id="main-wrapper">
				<center>
			
			
	
		<tr>
		<td>Invalid Response</td>
			<td><input type="text" value="" name="message" placeholder="Type your query here..."required></td>
			
		</tr>
		
		</tr>
	<tr>
		<br><br><br><br>
	<td  colspan="3" align="center"><input type="submit" id="button" name="submit" value="Report as Invalid"/></td>
<div>
<br>
</div>
        <div>
        <a href="welcome.php"><input class="btn btn-warning" type="button" id="back_btn" value=" BACK "/></a>
        </div>
        <div>
        <br>
        </div>
        <div>
        <a href="login.php"><input class="btn btn-primary" type="button" id="logout_btn" value=" LOGOUT"/></a>
        </div>
        

	</tr>



	</form>


</body>
</html>


<?php
if(isset($_POST['submit']))
{
	
	$message=$_POST['message'];


$query="insert into complaint values(NULL,'$message')";
$query_run = mysqli_query($conn,$query);


						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("Success! Complaint Submitted") </script>';						
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>';
						
					    
					   }


					}


?>