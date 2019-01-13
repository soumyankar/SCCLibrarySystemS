<?php
session_start();
include "connect.php";
$id=$_SESSION['adminkey'];	
$sql="Select * from admin_master where admin_id='$id'";
$query=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($query);
if(!isset($_SESSION['adminkey']))
{
	header("location:admin-login.php");
}
if(isset($_POST['register']))
{
	$roll=$_POST['roll_id'];
	$name=$_POST['name'];
	$year=$_POST['year'];
	$pass=$_POST['password'];
	$regsql="INSERT INTO students (roll_id,name,year,password) VALUES ('$roll','$name','$year','$pass')";
	$reqque=mysqli_query($conn,$regsql);
	if($reqque)
	{
		echo "<script>alert(\"Student added\"); 
		</script>";
	}
	else
	{
		echo "<script>
		alert(\"Student wasnt added \"  ); 
		</script>";
		echo "Not Inserted" . mysqli_error($conn);
	}
}
if(isset($_POST['remove']) && $_POST['r_roll_id']!= "")
{
	$rid=$_POST['r_roll_id'];
	$rsql="select * from students where roll_id='$rid'";
	$rquery=mysqli_query($conn,$rsql);
	$rres=mysqli_fetch_assoc($rquery);
	if($rres)
	{
		$demo="delete from students where roll_id='$rid'";
		$rdemo=mysqli_query($conn,$demo);
		echo "<script>alert(\"Student removed\"); 

		</script>";
	}
	else
	{
		echo "<script>
		alert(\"Student doesnt exist\"); 
		</script>";
	}

}
$s2="Select count(*) from students";
$q2=mysqli_query($conn,$s2);
$r2=mysqli_fetch_assoc($q2);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator Panel</title>
	<link href="dashboard/css/bootstrap.min.css" rel="stylesheet">
	<link href="dashboard/css/font-awesome.min.css" rel="stylesheet">
	<link href="dashboard/css/datepicker3.css" rel="stylesheet">
	<link href="dashboard/css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/logo.ico">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>

<![endif]-->

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#"><span>Admin</span>Panel</a>
					<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-bell"></em><span class="label label-info">5</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
								</a></li>
								<li class="divider"></li>
								<li><a href="#">
									<div><em class="fa fa-heart"></em> 12 New Likes
										<span class="pull-right text-muted small">4 mins ago</span></div>
									</a></li>
									<li class="divider"></li>
									<li><a href="#">
										<div><em class="fa fa-user"></em> 5 New Followers
											<span class="pull-right text-muted small">4 mins ago</span></div>
										</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div><!-- /.container-fluid -->
				</nav>
				<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
					<div class="profile-sidebar">
						<div class="profile-userpic">
							<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
						</div>
						<div class="profile-usertitle">
							<div class="profile-usertitle-name"><?php echo $result['name'];?></div>
							<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="divider"></div>
					<ul class="nav menu">
						<li><a href="admin-panel.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
						<li class="active"><a href="admin-panel-students.php"><em class="fa fa-user">&nbsp;</em> Students</a></li>
						<li><a href="admin-panel-manage.php"><em class="fa fa-balance-scale">&nbsp;</em> Manage</a></li>
						<li><a href="admin-panel-books.php"><em class="fa fa-server">&nbsp;</em> Books</a></li>
						<li><a href="#"><em class="fa fa-motorcycle">&nbsp;</em> Additional Feature</a></li>

						<li><a href="index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
					</ul>
				</div><!--/.sidebar-->

				<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
					<div class="row">
						<ol class="breadcrumb">
							<li><a href="#">
								<em class="fa fa-home"></em>
							</a></li>
							<li class="active">Students</li>
						</ol>
					</div><!--/.row-->
					<br>

					<!-- Container -->
					
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">Student Database</h1>
						</div>
					</div><!--/.row-->

					<div class="row">
						<div class="col-md-12">
							<form method="post" role="form">
								<div class="input-group input-group-lg">
									<input type="text" placeholder="Search" id="query" name="query" value="" class="form-control">
									<div class="input-group-btn">
										<button type="submit" name="search" class="btn btn-default" tabindex="-1"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</form>
							<br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#RemoveStudent"><i class="fa fa-minus" aria-hidden="true"></i>
							Remove Student</button>
							<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#AddStudent"><i class="fa fa-plus" aria-hidden="true"></i>
							Add Student</button>
						</div>
					</div>
					<br>
					<br>
					<br>
					<?php 
					if(isset($_POST['search']))
					{
						$q9=$_POST['query'];
						$sql3="Select * from students where name like '%{$q9}%' or roll_id like '%{$q9}%' or year like '%{$q9}%'";
					}
					else
					{
						$sql3="Select * from students";
					}
					$query3=mysqli_query($conn,$sql3);
					$found=mysqli_num_rows($query3);
					if(!$found)
					{
						echo "<div class=\"col-md-12 panel panel-default\"><h4>--No Users :(--</h4></div";
					}
					else
					{
						while($found=mysqli_fetch_array($query3,MYSQLI_ASSOC))
						{
							?>
							<div class="col-sm-3" style="align-content: center; text-align: center;">
								<div class="card" style="border: 2px !important;">
									<img class="card-img-top" src="http://www.placehold.it/225x225" alt="Card image cap" style="width: 225px; height: 225px; border: 7px solid #fff; border-radius: 50%;">
								</div>
								<br>
								<br>
								<ul class="list-group list-group-flush" style="text-align: center; align-items: center; align-content: center;">
									<li class="list-group-item"><?php echo $found['name'];?></li>
									<li class="list-group-item"><?php echo $found['roll_id'];?></li>
									<li class="list-group-item"><?php echo $found['year'];?></li>
								</ul>
							</div>
							<?php
						}
					}
					?>
					<!-- Container -->

					<div class="col-sm-12">
						<p class="back-link">&copy CMSA-Library 2017 By <a href="https://github.com/soumyankar" target="_blank"> Soumyankar Mohapatra</a></p>
					</div>
				</div><!--/.row-->
			</div>	<!--/.main-->

			<script src="dashboard/js/jquery-1.11.1.min.js"></script>
			<script src="dashboard/js/bootstrap.min.js"></script>
			<script src="dashboard/js/custom.js"></script>

			<!-- Student Modals-->

			<!-- Add Student Modal Start -->
			<div class="modal fade" id="RemoveStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Remove Student</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="remove_form" method="post" role="form" name="sentMessage" novalidate="novalidate">
							<div class="col-md-12">
								<div class="form-group">
									<h5>Roll-Number</h5>
									<input class="form-control" id="r_roll_id" name="r_roll_id" type="text" placeholder="" required="required">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="remove">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Remove Student Modal End -->

			<!-- Add Student Modal Start -->
			<div class="modal fade" id="AddStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="login_form" method="post" role="form" name="sentMessage" novalidate="novalidate">
							<div class="col-md-12">
								<div class="form-group">
									<h5>Roll-Number</h5>
									<input class="form-control" id="roll_id" name="roll_id" type="text" placeholder="" required="required">
									<p class="help-block text-danger"></p>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<h5>Name</h5>
									<input class="form-control" id="name" name="name" type="text" placeholder="" required="required">
									<p class="help-block text-danger"></p>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<h5>Year</h5>
									<select class="dropdown form-control" name="year">
										<option class="form-control" value="">--Select Year--</option>
										<option class="form-control" value="1st Year">1st Year</option>
										<option class="form-control" value="2nd Year">2nd Year</option>
										<option  class="form-control" value="3rd Year">3rd Year</option>
									</select>
									<p class="help-block text-danger"></p>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<h5>Password:</h5>
									<input class="form-control" id="password" name="password" type="password" placeholder="**********" required="required" data-validation-required-message="Please enter your password">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="clearfix"></div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="register">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Add Student Modal End -->

	</body>
	</html>