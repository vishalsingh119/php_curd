<?php //include config
	require_once('include/config.php');

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit Job</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">
	<p><a href="../blog/admin/jobs.php">Blog Admin Index</a></p>

	<h2>Edit Post</h2>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);
		

		//very basic validation
		if($job_id ==''){
			$error[] = 'This Job is missing a valid id!.';
		}
		else if($job_title ==''){
			$error[] = 'Please enter the Jobs Title.';
		}

		else if ($job_desc ==''){
			$error[] = 'Please Enter Jobs Description';
		}

		
		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE career SET job_title = :job_title,job_desc = :job_desc WHERE job_id = :job_id') ;
				$stmt->execute(array(
					':job_title' => $job_title,
					':job_desc' => $job_desc,
					':job_id' => $job_id
				));

				//redirect to index page
				header('Location: ../blog/admin/jobs.php');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT job_id, job_title, job_desc FROM career WHERE job_id = :job_id') ;
			$stmt->execute(array(':job_id' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form  method='post' enctype="multipart/form-data">
		<input type='hidden' name='job_id' value='<?php echo $row['job_id'];?>'>

		
		<p><label>Title</label><br />
		<input type='text' name='job_title' value='<?php echo $row['job_title'];?>'></p>

		
		
		<p><label>Content</label><br />
		<textarea name='job_desc' cols='60' rows='10'><?php echo $row['job_desc'];?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form>

</div>

</body>
</html>	
