<?php //include config
require_once('include/config.php');

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Jobs</title>
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

	
	<p><a href="../blog/admin/jobs.php">Jobs Admin Index</a></p>

	<h2>Add Jobs</h2>

	<?php
	
	//if form has been submitted process it
	if(isset($_POST['submit'])){
		
		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);
		
		if($job_title ==''){
			$error[] = 'Please enter the title.';
		}
		else if($job_desc ==''){
			$error[] = 'Please enter job description';
		}
		
		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('INSERT INTO career (job_title,job_desc) VALUES (:job_title,:job_desc)') ;
				$stmt->execute(array(
					':job_title' => $job_title,
					':job_desc' => $job_desc
				));

			  	
				//redirect to index page
				header('Location: ../blog/admin/jobs.php', true, 301);
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form  method='post' enctype="multipart/form-data">

		<p><label>Title</label><br />
		<input type='text' name='job_title' value='<?php if(isset($error)){ echo $_POST['job_title'];}?>'></p>
		
		<p><label>Content</label><br />
		<textarea name='job_desc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['job_desc'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
