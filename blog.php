<?php require('blog/includes/config.php'); ?>
<?php include "assets/files/header.php" ?>
<div class="banner_text">
	<div class="container">
		<h1>BLOG</h1>
	</div>
</div>
<section class="blog_area">
	<div class="container">
		<div id="wrapper" class="blog_wrapper">

		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle,postImg, postDate FROM blog_posts ORDER BY postID DESC ');
				while($row = $stmt->fetch()){
					
					echo '<div class="col-md-4 blog_item ">';
						echo '<a href="blog/viewpost.php?id='.$row['postID'].'">
								<img src="./assets/images/blog-feature-img/'
							 .$row['postImg'].'" class="img-responsive" /></a>';
						echo '<h5><a href="blog/viewpost.php?id='.$row['postID'].'">'.substr($row['postTitle'],0,35).'...'.'</a></h5>';
										
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

		</div>
	</div>	
</section>
<?php

	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}
	$no_of_records_per_page = 1;
	$offset = ($pageno-1) * $no_of_records_per_page;

	$conn=mysqli_connect("localhost","root","","db");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	$total_pages_sql = "SELECT COUNT(*) FROM blog_posts";
	$result = mysqli_query($conn,$total_pages_sql);
	$total_rows = mysqli_fetch_array($result)[0];
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	$sql = "SELECT * FROM blog_posts LIMIT $offset, $no_of_records_per_page";
	$res_data = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($res_data)){
		//here goes the data
	}
	mysqli_close($conn);
?>
	<ul class="pagination">
		<li><a href="?pageno=1">First</a></li>
		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
			<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
		</li>
		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
			<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
		</li>
		<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>

	

<?php include "assets/files/footer.php" ?>
   