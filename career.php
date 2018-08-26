<?php include "assets/files/header.php" ?>
<?php	require_once 'admin/team/dbconfig.php';?>

<!--Banner content-->
<div class="banner_text">
	<div class="container">
		<h1>CAREER</h1>
	</div>
</div>
<!-- Career page banner -->
<section class="career_banner">
    <div class="container">
        <div class="row">
            <h2>Create a world that inspires human connection</h2>
        </div>
    </div>
</section>
<!-- Career goal -->
<section class="career_goal">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <i class="fa fa-pencil-square-o"></i>
                <h3>Create</h3>
                <p>We build the best experience for our community - as a team.</p>        
            </div>

            <div class="col-md-4">
                <i class="fa fa-question-circle-o"></i>
                <h3>Learn</h3>
                <p>We look inside and outside for inspiration and learning.</p>        
            </div>

            <div class="col-md-4">
                <i class="fa fa-paper-plane"></i>
                <h3>Play</h3>
                <p>Life is what happens when you're busy working. We make sure to enjoy it.</p>        
            </div>
        </div>
    </div>
</section>
<!-- Career goal -->
<section class="career_benefit">
    <div class="container">
        <div class="row text-center">
            <h2>Benefit at Nodwin</h2>
            <div class="col-md-4">
                <ul class="list-unstyled">
                    <li>Comprehensive Health Plans</li>
                    <li>Culture of Learning</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-unstyled">
                    <li>Personal Time Off</li>
                    <li>Offsites and Happy Hours</li>   
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-unstyled">
                    <li>Well-being at Work</li>
                    <li>Enhanced Paternity/Maternity Programs</li> 
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Career list-->
    <?php   
        $connect = mysqli_connect("localhost", "root", "", "db");  
        $query = "SELECT * FROM career ORDER BY job_title ASC";  
        $result = mysqli_query($connect, $query);  
    ?>  
        <section class="jobs_area">
            <div class="container">
                <div class="row margin-none">
                    <h2>Current Opening</h2>
                    <div class="panel-group" id="posts">  
                        <?php  
                        while($row = mysqli_fetch_array($result))  
                        {  
                        ?>  
                            <div class="panel panel-default">  
                                <div class="panel-heading">  
                                    <h4 class="panel-title">  
                                            <a href="#<?php echo $row["job_id"]; ?>" data-toggle="collapse" data-parent="#posts"><?php echo $row["job_title"]; ?></a>  
                                    </h4>  
                                </div>  
                                <div id="<?php echo $row["job_id"]; ?>" class="panel-collapse collapse">  
                                    <div class="panel-body">  
                                    <?php echo $row["job_desc"]; ?>  
                                    </div>  
                                </div>  
                            </div>  
                        <?php  
                        }  
                        ?>  
                    </div>  
                </div>  
                <br />
                        
                    </div>
                </div>
            </div>
        </section>

<?php include "assets/files/footer.php" ?>