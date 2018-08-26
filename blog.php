<?php require('admin/blog/includes/config.php'); ?>
<?php require('admin/blog/includes/pagination.php'); ?>
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
				
				
				while($row = mysqli_fetch_array($nquery)){
					//while($crow = mysqli_fetch_array($stmt->fetch)){
					//while($row = $stmt->fetch()){
					
					echo '<div class="col-md-4 blog_item ">';
						echo '<a href="blog/viewpost.php?id='.$row['postID'].'" title="'.$row['postTitle'].'">
								<img src="./assets/images/blog-feature-img/'
							 .$row['postImg'].'" class="img-responsive" />';
						echo '<h5>'.substr($row['postTitle'],0,35).'...'.'</h5></a>';
										
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

		</div>
	</div>	
</section>
<!--pagination-->
<div id="pagination_controls" class="text-center blog_pagination"><?php echo $paginationCtrls; ?></div></div>

	

<?php include "assets/files/footer.php" ?>
   