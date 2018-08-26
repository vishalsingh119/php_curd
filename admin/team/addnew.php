<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user email
		$user_position = $_POST['position'];
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($username)){
			$errMSG = "Please Enter Username.";
		}
		else if(empty($user_position)){
			$errMSG = "fuck you";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO team_users(userName,userProfession,userPic,position) VALUES(:uname, :ujob, :upic, :position)');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':position',$user_position);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("Location:../blog/admin/team.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>

<div class="container">


	<div class="page-header">
    	<h1 class="h2">add new user. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    </div>
    
	 <?php
	 	
		 $conn = mysqli_connect("localhost","root","","db");

		 // Check connection
		 if ($conn->connect_error) {
		 	die("Connection failed: " . $conn->connect_error);
		 } 
		 $max = "SELECT MAX(userID) as max_id FROM team_users";     
		 $max1 =  mysqli_query($conn, $max);   
		 $row = mysqli_fetch_assoc($max1); 
		 $max_id=$row['max_id'];      
		 echo $max_id+1 ; 
		
		?>
	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	  <input type="hidden" value="<?php echo $max_id+1; ?>" name="position" />  
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Name</label></td>
        <td>
		<input class="form-control" type="text" name="user_name" placeholder="Enter Name" value="<?php echo $username; ?>" />
		</td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Nick Name</label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="Your Nick Name" value="<?php echo $userjob; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2">
			<button type="submit" name="btnsave" class="btn btn-default">
        		<span class="glyphicon glyphicon-save"></span> &nbsp; save
        	</button>
        </td>
    </tr>
    
    </table>
    
</form>



<div class="alert alert-info">
    <strong>tutorial link !</strong> <a href="http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html">Coding Cage</a>!
</div>

    

</div>



	


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>