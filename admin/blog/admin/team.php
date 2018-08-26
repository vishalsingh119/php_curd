<?php
//include config
require_once('../includes/config.php');
//pagination
require('../includes/pagination.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delpost'])){ 

	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
	exit;
} 

?>
<?php
//hide all error
error_reporting(0);
ini_set('display_errors', 0);
	require_once '../../team/dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM team_users WHERE userID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM team_users WHERE userID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location: index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../style/normalize.css">
<link rel="stylesheet" href="../style/main.css">

</head>

<body>
<div id="wrapper">
<?php include('menu.php');?>
	<div class="page-header">
    	<h1 class="h2">all members. / <a class="btn btn-default" href="../../team/addnew.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; add new </a></h1> 
    </div>
    
<br />
	<button class="save btn btn-success">SAVE</button>
	<div class="alert alert-success" id="response" role="alert">SORT AND SAVE</div>
	<div class="row"><div class="team_mate">
	<?php
		
		$stmt = $DB_con->prepare('SELECT userID, userName, userProfession, userPic FROM team_users ORDER BY position ASC');
		$stmt->execute();
		
		
		if($stmt->rowCount() > 0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);
				
				?>
				<div class="team_block col-sm-12" id=item-<?php echo $row['userID']; ?> >
					<p class="col-sm-4 page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p>
					<div class="col-sm-4">
						<img class="col-sm-4"  src="../../team/user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="80px" height="80px" />
					</div>	
					<p class="page-header col-sm-4">
						<span>
							<a class="btn btn-info" href="../../team/editform.php?edit_id=<?php echo $row['userID']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
							<a class="btn btn-danger" href="?delete_id=<?php echo $row['userID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
						</span>
					</p>
				</div>
				      
				<?php
			}
		}
		else
		{
			?>
			<div class="col-xs-12">
				<div class="alert alert-warning">
					<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
				</div>
			</div>
			<?php
		}
		
	?> </div>
	</div>	


</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    var ul_sortable = $('.team_mate');
    ul_sortable.sortable({
        revert: 100,
        placeholder: 'placeholder'
    });
    ul_sortable.disableSelection();
    var btn_save = $('button.save'),
        div_response = $('#response');
    btn_save.on('click', function(e) {
        e.preventDefault();
        var sortable_data = ul_sortable.sortable('serialize');
        div_response.text('saved');
        $.ajax({
            data: sortable_data,
            type: 'POST',
            url: '../../team/save.php',
            success:function(result) {
                div_response.text(result);
            }
        });
    });
</script>

</body>
</html>