<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit Post</title>
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

	<?php include('menu.php');?>
	<p><a href="./">Blog Admin Index</a></p>

	<h2>Edit Post</h2>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);
		$postImg = $_FILES['postImg']['name'];
		$tmp_dir = $_FILES['postImg']['tmp_name'];
		$imgSize = $_FILES['postImg']['size'];

		//very basic validation
		if($postID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		else if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		else if($postImg ==''){
			$error[] = 'Please Upload Feature Image';
		}

		else if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		else{
			
			$upload_dir = '../../../assets/images/blog-feature-img/'; // upload directory
   
		   $imgExt = strtolower(pathinfo($postImg,PATHINFO_EXTENSION)); // get image extension
	   
		   // valid image extensions
		   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
	   
		   // rename uploading image
		   $userpic = rand(1000,1000000).".".$imgExt;
			   
		   // allow valid image file formats
		   if(in_array($imgExt, $valid_extensions)){			
			   // Check file size '5MB'
			   if($imgSize < 5000000)				{
				   move_uploaded_file($tmp_dir,$upload_dir.$postImg);
			   }
			   else{
				   $error[] = "Sorry, your file is too large.";
			   }
		   }
		   else{
			   $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
		   }
		}

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle,postImg = :postImg,  postCont = :postCont WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postImg' => $postImg,
					':postCont' => $postCont,
					':postID' => $postID
				));

				//redirect to index page
				header('Location: index.php?action=updated');
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

			$stmt = $db->prepare('SELECT postID, postTitle, postImg,  postCont FROM blog_posts WHERE postID = :postID') ;
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form  method='post' enctype="multipart/form-data">

		<input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php echo $row['postTitle'];?>'></p>

		<p><label>Feature Image</label><br />
		<p><img src="../../../assets/images/blog-feature-img//<?php echo $row['postImg']; ?>" height="150" width="150" /></p>
        <input type="file" name="postImg">

		
		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo $row['postCont'];?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form>

</div>

</body>
</html>	
