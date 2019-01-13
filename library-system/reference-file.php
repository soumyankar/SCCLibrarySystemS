<?php
session_start();
include "connect.php";
$id=$_SESSION['user_id'];
$sql="Select * from students where roll_id='$id'";
$query=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($query);
if(!isset($_SESSION['user_id']))
{
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Profile</title>
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
					<a class="navbar-brand" href="#"><span>Student</span>Profile</a>
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
						<li><a href="student-profile-home.php"><em class="fa fa-dashboard">&nbsp;</em> Profile</a></li>
						<li><a href="student-profile-books.php"><em class="fa fa-server">&nbsp;</em> Books</a></li>
						<li class="active"><a href="student-profile-activity.php"><em class="fa fa-bullhorn">&nbsp;</em> Activity</a></li>
						<li><a href="#"><em class="fa fa-motorcycle">&nbsp;</em> Additional Feature</a></li>
						<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
					</ul>
				</div><!--/.sidebar-->
				<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
					<div class="row">
						<ol class="breadcrumb">
							<li><a href="#">
								<em class="fa fa-home"></em>
							</a></li>
							<li class="active">Activity</li>
						</ol>
					</div><!--/.row-->

					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">Activity</h1>
						</div>
					</div><!--/.row-->


					<div class="row">
						<div class="col-lg-12">
							<h2>Recent Activity</h2>
							<div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Welcome to the admin dashboard panel bootstrap template <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
							<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Welcome to the admin dashboard panel bootstrap template <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
							<div class="alert bg-warning" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Welcome to the admin dashboard panel bootstrap template <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
							<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Welcome to the admin dashboard panel bootstrap template <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
						</div>
					</div><!--/.row-->		

					<div class="row">
						<div class="col-lg-12">
							<h2>Collapsible Panels</h2>
						</div>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">Default Panel
									<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut ante in sapien blandit luctus sed ut lacus. Phasellus urna est, faucibus nec ultrices placerat, feugiat et ligula. Donec vestibulum magna a dui pharetra molestie. Fusce et dui urna.</p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="panel panel-primary">
									<div class="panel-heading">Primary Panel
										<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut ante in sapien blandit luctus sed ut lacus. Phasellus urna est, faucibus nec ultrices placerat, feugiat et ligula. Donec vestibulum magna a dui pharetra molestie. Fusce et dui urna.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="panel panel-success">
										<div class="panel-heading">Success Panel
											<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
											<div class="panel-body">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut ante in sapien blandit luctus sed ut lacus. Phasellus urna est, faucibus nec ultrices placerat, feugiat et ligula. Donec vestibulum magna a dui pharetra molestie. Fusce et dui urna.</p>
											</div>
										</div>
									</div>
								</div><!-- /.row -->

								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-info">
											<div class="panel-heading">Info Panel
												<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
												<div class="panel-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut ante in sapien blandit luctus sed ut lacus. Phasellus urna est, faucibus nec ultrices placerat, feugiat et ligula. Donec vestibulum magna a dui pharetra molestie. Fusce et dui urna.</p>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="panel panel-warning">
												<div class="panel-heading">Warning Panel
													<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
													<div class="panel-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut ante in sapien blandit luctus sed ut lacus. Phasellus urna est, faucibus nec ultrices placerat, feugiat et ligula. Donec vestibulum magna a dui pharetra molestie. Fusce et dui urna.</p>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="panel panel-danger">
													<div class="panel-heading">Danger Panel
														<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
														<div class="panel-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut ante in sapien blandit luctus sed ut lacus. Phasellus urna est, faucibus nec ultrices placerat, feugiat et ligula. Donec vestibulum magna a dui pharetra molestie. Fusce et dui urna.</p>
														</div>
													</div>
												</div>
											</div><!-- /.row -->
										</div>	
										<!-- Footer -->

										<div class="col-sm-12">
											<p class="back-link">&copy CMSA-Library 2017 By <a href="https://github.com/soumyankar" target="_blank"> Soumyankar Mohapatra</a></p>
										</div>
									</div><!--/.row-->

								</div>	<!--/.main-->

								<script src="dashboard/js/jquery-1.11.1.min.js"></script>
								<script src="dashboard/js/bootstrap.min.js"></script>
								<script src="dashboard/js/chart.min.js"></script>
								<script src="dashboard/js/chart-data.js"></script>
								<script src="dashboard/js/easypiechart.js"></script>
								<script src="dashboard/js/easypiechart-data.js"></script>
								<script src="dashboard/js/bootstrap-datepicker.js"></script>
								<script src="dashboard/js/custom.js"></script>
								<script>
									window.onload = function () {
										var chart1 = document.getElementById("line-chart").getContext("2d");
										window.myLine = new Chart(chart1).Line(lineChartData, {
											responsive: true,
											scaleLineColor: "rgba(0,0,0,.2)",
											scaleGridLineColor: "rgba(0,0,0,.05)",
											scaleFontColor: "#c5c7cc"
										});
									};
								</script>
							</body>
							</html>