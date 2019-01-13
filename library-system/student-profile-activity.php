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
	<!-- Remove URLs Param -->
	<script type="text/javascript">
		function removeParam(key, sourceURL) {
			var rtn = sourceURL.split("?")[0],
			param,
			params_arr = [],
			queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
			if (queryString !== "") {
				params_arr = queryString.split("&");
				for (var i = params_arr.length - 1; i >= 0; i -= 1) {
					param = params_arr[i].split("=")[0];
					if (param === key) {
						params_arr.splice(i, 1);
					}
				}
				rtn = rtn + "?" + params_arr.join("&");
			}
			return rtn;
		}
	</script>
	<!-- Script for updating URLs -->
	<script type="text/javascript">
		function insertParam(key, value)
		{
			key = encodeURI(key); value = encodeURI(value);

			var kvp = document.location.search.substr(1).split('&');

			var i=kvp.length; var x; while(i--) 
			{
				x = kvp[i].split('=');

				if (x[0]==key)
				{
					x[1] = value;
					kvp[i] = x.join('=');
					break;
				}
			}

			if(i<0) {kvp[kvp.length] = [key,value].join('=');
		}
    //this will reload the page, it's likely better to store this until finished
    document.location.search = kvp.join('&'); 
}
</script>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<?php
if(isset($_GET['issued']))
	echo "<script>alert('May not delete issued book, submit return or reissue request'); 
alterurl=removeParam('issued',window.location.href);
window.history.pushState( {}, '', alterurl);</script>";	
?>
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
					<?php
					$s7="Select * from borrow_requests where roll_id='$id'";
					$q7=mysqli_query($conn,$s7);
					?>
					<div class="row">
						<div class="col-lg-12">
							<h2>Borrow Requests</h2>
						</div>
						<?php
						$found=mysqli_num_rows($q7);
						if(!$found)
						{
							echo "<h4 class=\"col-md-12 panel panel-default\">--No Book Requests :(--</h4><br><br>";
						}
						else
						{
							while($found=mysqli_fetch_array($q7,MYSQLI_ASSOC))
							{
								$ac=$found['book_id'];
								$s1="Select * from books_master where access_code='$ac'";
								$q1=mysqli_query($conn,$s1);
								$r1=mysqli_fetch_assoc($q1);
								?>
								<div class="col-md-4">
									<div class="panel panel-success" style=" cursor: pointer;" onclick="insertParam('accesscode','<?php echo $ac;?>');"  href="#" data-toggle="modal" data-target="#BorrowBookModal">
										<div class="panel-heading" style="word-wrap: break-word;"><?php echo $r1['name']." - ".$r1['author'];?>
											<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span> </div>
											<div class="panel-body">
												<p><?php echo $r1['description'];?></p>
											</div>

											<div class="panel-body">
												<p>Queue Position: <input class="form-control" type="text" name="due_date" readonly value="<?php echo $found['queue_position'];?>"></p>
											</div>

											<div class="panel-body">
												<p>Status: <input class="form-control" type="text" name="due_date" readonly value="<?php if($found['status']==NULL) echo "Awaiting admin decision"; else echo $found['status'];?>"></p>
											</div>
										</div>
									</div>
									<?php
								}
							}
							?>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<h2>Book Addition Requests</h2>
							</div>
							<?php
							$s7="Select * from book_requests where roll_id='$id'";
							$q7=mysqli_query($conn,$s7);
							$found=mysqli_num_rows($q7);
							if(!$found)
							{
								echo "<h4 class=\"col-md-12 panel panel-default\">--No Book Requests :(--</h4><br><br>";
							}
							else
							{
								while($found=mysqli_fetch_array($q7,MYSQLI_ASSOC))
								{
									?>
									<div class="col-md-4">
										<div class="panel panel-blue">
											<div class="panel-heading" style="word-wrap: break-word;"><?php echo $found['name']." - ".$found['author'];?>
												<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
												<br>
												<div class="panel-body">
													<p>Awaiting Confirmation</p>
												</div>
											</div>
										</div>
										<?
									}
								}?>
							</div>
						</div>	
						<!-- Footer -->

						<div class="col-sm-12">
							<p class="back-link">&copy CMSA-Library 2017 By <a href="https://github.com/soumyankar" target="_blank"> Soumyankar Mohapatra</a></p>
						</div>
						<script src="dashboard/js/jquery-1.11.1.min.js"></script>
						<script src="dashboard/js/bootstrap.min.js"></script>
						<script src="dashboard/js/custom.js"></script>

						<script type="text/javascript">
							function query_check() {
								alterurl=removeParam('accesscode',window.location.href);
								console.log(alterurl);
								window.history.pushState( {}, '', alterurl);
							}
						</script>
						<?php
						if(isset($_GET['accesscode'])){ ?>
						<script>
							$(function(){
								$('#BorrowBookModal').modal('show');
								query_check();
							});
						</script>
						<?php         
					}
					?>
					<?php
					if(isset($_GET['accesscode'])){
						$ac=$_GET['accesscode'];
						$bsql="Select * from books_master where access_code='$ac'";
						$bquery=mysqli_query($conn,$bsql);
						$bresult=mysqli_fetch_assoc($bquery);
						$bav=$bresult['availability'];
						$class="info";
						if($bav=="Available")
							{$class="success";}
						if($bav=="Missing")
							{$class="warning";}
						if($bav=="Issued")
							{$class="danger";}
					}
					?>
					<!-- Modal -->
					<div class="modal fade" id="BorrowBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Borrow Book Panel</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">   
									<form class="form-horizontal row-border" method="post" action="#">

										<div class="form-group">
											<label class="col-md-2 control-label">Access Code</label>
											<div class="col-md-10">
												<input type="text" name="baccess" id="baccess" placeholder="Access Code" class="form-control" readonly value="<?php echo $bresult['access_code'];?>">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-2 control-label">Book Name</label>
											<div class="col-md-10">
												<input type="text" name="bname" id="bname" placeholder="Book name" class="form-control" readonly value="<?php echo $bresult['name'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Author</label>
											<div class="col-md-10">
												<input type="text" name="bauthor" id="bauthor"  placeholder="Author name" class="form-control" readonly value="<?php echo $bresult['author'];?>">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-2 control-label">Category</label>
											<div class="col-md-10">
												<input type="text" name="bcategory" id="bcategory" placeholder="Category name" class="form-control" readonly value="<?php echo $bresult['category'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Description</label>
											<div class="col-md-10">
												<input type="text" name="bdescription" id="bdescription" placeholder="Description" class="form-control" readonly value="<?php echo $bresult['description'];?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12" style="text-align: center;">
												<h3 style="width: 50%; margin: 0 auto;"><a class="btn btn-primary btn-<?php echo $class;?> btn-md" href="#"><?php echo $bav;?></a></h3>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
											<button type="button" name="borrow" id="delete" class="btn btn-danger"><a onclick="return confirm('Are you sure?')" href="student-delete.php?id=<?php echo $bresult['access_code']."&roll=". $id."&decision=YES";?>">Delete</a></button>
										</div>	
									</form>
								</div>
							</div>
						</div>
					</div>
				</body>
				</html>