<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Post</title>
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

	<h2>Add Post</h2>

	<?php
	
	//if form has been submitted process it
	if(isset($_POST['submit'])){
		
		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);
		$postImg = $_FILES['postImg']['name'];
		$tmp_dir = $_FILES['postImg']['tmp_name'];
		$imgSize = $_FILES['postImg']['size'];
		//global $postImg;
		//$postImg = isset($_POST['postImg']) ? $_POST['postImg'] : "";
		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}
		else if($postImg ==''){
			$error[] = 'Please Upload Feature Image ha';
		}
		
		else if($postCont ==''){
			$error[] = 'Please enter the content.';
		}
		else{
			
		 	$upload_dir = '../../assets/images/blog-feature-img/'; // upload directory
	
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
				$stmt = $db->prepare('INSERT INTO blog_posts (postTitle,postImg,postCont,postDate) VALUES (:postTitle,:postImg, :postCont, :postDate)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postImg' => $postImg,
					':postCont' => $postCont,
					':postDate' => date('Y-m-d H:i:s')
				));
				
				// $featured_image = $_FILES['postImg']['name'];
				//   	// image file directory
				//   	$target = "img/" . basename($featured_image);
				  	
				//   	if (move_uploaded_file($_FILES['postImg']['tmp_name'], $target)) {
				//   		echo "File is valid, and was successfully uploaded.\n";
				// 	} else {
				// 	   echo "Upload failed";
				// }
	
			  	
				//redirect to index page
				header('Location: index.php?action=added', true, 301);
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
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>
		<p><label>Feature Image</label><br />
		<input type="file" name="postImg" >
		

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
