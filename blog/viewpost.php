<?php require('includes/config.php'); 

$stmt = $db->prepare('SELECT postID, postTitle,postImg, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Nodwin Gaming </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="">
        <meta name="keywords" content="">

        <link rel="shortcut icon" type="img/icon" href="assets/images/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../assets/css/ros.animate.css" />
        <link rel="stylesheet" href="../assets/css/custom.css" />
        <noscript>
            <span class="noscript">For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</span>
        </noscript>	
    </head>
    <body>
        <!-- Navbar -->
        <header id="header">               
        <nav class="navbar navbar-default">
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="index.php" title="NODWIN"><img src="../assets/images/nodwin_gl.png" class="img-responsive"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">home</a></li>
                <li><a href="about.php">about </a></li>
                <li><a href="#">gallery</a></li>
                <li><a href="http://localhost/nodwingaming/blog.php">blog</a></li>
                <li><a href="career.php">careers</a></li>
                </ul>
            </div>
            </div>
        </nav>
    </header>   
    
    <main>
		<section class="blog_area">
			<div class="container">

			<div id="wrapper">
				<?php	
					echo '<div>';
						echo '<h1>'.$row['postTitle'].'</h1>';
						echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
                        echo '<img src="../assets/images/blog-feature-img/'
                             .$row['postImg'].'" class="img-responsive" />';
                         echo '<p>'.$row['postCont'].'</p>';	
                             			
					echo '</div>';
				?>

			</div>


			</div>	
		</section>

	

<?php include "../assets/files/footer.php" ?>