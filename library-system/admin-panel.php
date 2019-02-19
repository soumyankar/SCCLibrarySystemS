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
$s2="Select count(*) from students";
$q2=mysqli_query($conn,$s2);
$r2=mysqli_fetch_assoc($q2);

$s3="Select count(*) from books_master";
$q3=mysqli_query($conn,$s3);
$r3=mysqli_fetch_assoc($q3);


$s4="Select count(*) from borrow_requests";
$q4=mysqli_query($conn,$s4);
$r4=mysqli_fetch_assoc($q4);

$s5="Select count(*) from students where approved='No' ";
$q5=mysqli_query($conn,$s5);
$r5=mysqli_fetch_assoc($q5);

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
							<input type="hidden" name="ffusername" value="xD">
							<input type="hidden" name="ffpassword" value="xD">	
							<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="divider"></div>
					<ul class="nav menu">
						<li class="active"><a href="admin-panel.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
						<li><a href="admin-panel-students.php"><em class="fa fa-user">&nbsp;</em> Students</a></li>
						<li><a href="admin-panel-manage.php"><em class="fa fa-balance-scale">&nbsp;</em> Manage</a></li>
						<li><a href="admin-panel-books.php"><em class="fa fa-server">&nbsp;</em> Books</a></li>
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
							<li class="active">Dashboard</li>
						</ol>
					</div><!--/.row-->

					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">Dashboard</h1>
						</div>
					</div><!--/.row-->

					<div class="panel panel-container">
						<div class="row">
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
								<div class="panel panel-teal panel-widget border-right">
									<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
										<div class="large"><?php echo ($r4['count(*)']+$r5['count(*)']);?></div>
										<div class="text-muted">New Requests</div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
								<div class="panel panel-blue panel-widget border-right">
									<div class="row no-padding"><em class="fa fa-xl fa-book color-orange"></em>
										<div class="large"><?php echo $r3['count(*)'];?></div>
										<div class="text-muted">Books</div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
								<div class="panel panel-orange panel-widget border-right">
									<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
										<div class="large"><?php echo $r2['count(*)'];?></div>
										<div class="text-muted">Students</div>
									</div>
								</div>
							</div>
						</div><!--/.row-->
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									Site Traffic Overview
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li>
												<ul class="dropdown-settings">
													<li><a href="#">
														<em class="fa fa-cog"></em> Settings 1
													</a></li>
													<li class="divider"></li>
													<li><a href="#">
														<em class="fa fa-cog"></em> Settings 2
													</a></li>
													<li class="divider"></li>
													<li><a href="#">
														<em class="fa fa-cog"></em> Settings 3
													</a></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
								<div class="panel-body">
									<div class="canvas-wrapper">
										<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div><!--/.row-->

					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default chat">
								<div class="panel-heading">
									Chat
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li>
												<ul class="dropdown-settings">
													<li><a href="#">
														<em class="fa fa-cog"></em> Settings 1
													</a></li>
													<li class="divider"></li>
													<li><a href="#">
														<em class="fa fa-cog"></em> Settings 2
													</a></li>
													<li class="divider"></li>
													<li><a href="#">
														<em class="fa fa-cog"></em> Settings 3
													</a></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
								<div class="panel-body">
									<ul>
										<li class="left clearfix"><span class="chat-img pull-left">
											<img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
										</span>
										<div class="chat-body clearfix">
											<div class="header"><strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small></div>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
										</div>
									</li>
									<li class="right clearfix"><span class="chat-img pull-right">
										<img src="http://placehold.it/60/dde0e6/5f6468" alt="User Avatar" class="img-circle" />
									</span>
									<div class="chat-body clearfix">
										<div class="header"><strong class="pull-left primary-font">Jane Doe</strong> <small class="text-muted">6 mins ago</small></div>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
									</div>
								</li>
								<li class="left clearfix"><span class="chat-img pull-left">
									<img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small></div>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
								</div>
							</li>
						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here..." /><span class="input-group-btn">
								<button class="btn btn-primary btn-md" id="btn-chat">Send</button>
							</span></div>
						</div>
					</div>
				</div><!--/.col-->


				<div class="col-md-6">
					<div class="panel panel-default ">
						<div class="panel-heading">
							Timeline
							<ul class="pull-right panel-settings panel-button-tab-right">
								<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
									<em class="fa fa-cogs"></em>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<div class="panel-body timeline-container">
							<ul class="timeline">
								<li>
									<div class="timeline-badge"><em class="glyphicon glyphicon-exclamation-sign"></em></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">Book approval request pending</h4>
										</div>
										<div class="timeline-body">
											<p>$student-roll$-$student-name$ request for $book-name$</p>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge	"><em class="glyphicon glyphicon-info-sign"></em></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">New student enrollment</h4>
										</div>
										<div class="timeline-body">
											<p>Approve $student-roll$-$student-name$ registration.</p>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge"><em class="glyphicon glyphicon-certificate"></em></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">New book addition request</h4>
										</div>
										<div class="timeline-body">
											<p>$student-roll$-$student-name$ requests for $author-name$-$book-name$ </p>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge"><em class="glyphicon glyphicon-leaf"></em></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">Something else</h4>
										</div>
										<div class="timeline-body">
											<p>Something else</p>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div><!--/.col-->
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