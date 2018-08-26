<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['deljob'])){ 


	$stmt = $db->prepare('DELETE FROM `career` WHERE job_id = :job_id') ;
	$stmt->execute(array(':job_id' => $_GET['deljob']));

	header('Location: ../admin/jobs.php?action=deleted');
	exit;

} 

?>
<!doctype html>	
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Users</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script language="JavaScript" type="text/javascript">
  function deljob(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = '../admin/jobs.php?deljob=' + id;
	  }
  }
  </script>
</head>
<body>

	<div id="wrapper">

	<?php include('menu.php');?>

	<?php 
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>User '.$_GET['action'].'.</h3>'; 
	} 
	?>

	<table>
	<tr>
		<th>Jobs Id</th>
		<th>Job Name</th>
		<th>Job Desc</th>
		<th>Action</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT job_id, job_title, job_desc FROM career ORDER BY job_id DESC');
			while($row = $stmt->fetch()){
				
				echo '<tr>';
				echo '<td>'.$row['job_id'].'</td>';
				echo '<td>'.$row['job_title'].'</td>';
				echo '<td><div style="height:100px;overflow:auto;">'.$row['job_desc'].'</td>';
				?>

				<td>
					<a href="../../jobs/edit-jobs.php?id=<?php echo $row['job_id'];?>">Edit</a> 
					<br/>
					<a href="javascript:deljob('<?php echo $row['job_id'];?>','<?php echo $row['job_title'];?>')">Delete</a>
				
				</td>
				
				<?php 
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a href="../../jobs/add-jobs.php">Add Job</a></p>

</div>

</body>
</html>
