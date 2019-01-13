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

if(isset($_POST['breq']))
{
	if($result['approved']=='No')
	{
		echo "<script>confirm(\"Registration hasn't been approved. Request may not be submitted.!\");</script>";
	}
	else
	{
		$name=$_POST["bname"];
		$author=$_POST["author"];
		$publisher=$_POST["publisher"];
		$sql2="INSERT INTO book_requests(roll_id,name,author,publisher) VALUES ('$id','$name','$author','$publisher')";
		$query2=mysqli_query($conn,$sql2);
		if(!$query2)
		{
			echo "Not Inserted" . mysqli_error($conn);
		}
		else
		{ 
			header("location: student-profile-books.php?requested=true");
		}
	}
}

if(isset($_POST['borrow']))
{
	if($result['approved']=='No')
	{
		echo "<script>confirm(\"Registration hasn't been approved. Request may not be submitted.!\");</script>";
	}
	else
	{
		$book_id=$_POST['baccess'];
		$sql6="Select * from books_master where access_code='$book_id'";
		$q6=mysqli_query($conn,$sql6);
		$r6=mysqli_fetch_assoc($q6);
		$s7="Select * from borrow_requests where book_id='$book_id' and roll_id='$id'";
		$q7=mysqli_query($conn,$s7);
		$r7=mysqli_fetch_assoc($q7);
		if($r7)
			echo "<script>confirm(\"Book requested already submitted!\");</script>";		
		if($r6['availability']=='Issued')
		{
			echo "<script>confirm(\"Book already issued!\");</script>";
		}		
		if(!$r7 && $r6['availability']!='Issued')
		{
			$que="select max(queue_position) from borrow_requests where book_id='$book_id'";
			$qque=mysqli_query($conn,$que);
			$rque=mysqli_fetch_assoc($qque);
			$xyz=$rque['max(queue_position)']+1;
			$timestamp = date("Y-m-d H:i:s");
			$borrowsql="INSERT INTO borrow_requests(roll_id,book_id,requested_at,queue_position) VALUES ('$id','$book_id','$timestamp','$xyz')";
			$borrowq=mysqli_query($conn,$borrowsql);
			if(!$borrowq)
				echo "not inserted" . mysqli_error($conn);
			else
			{
				echo "<script>alert(\"Borrow requested submitted\"); 
				</script>";
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Profile</title>
	<!-- Script for checking addition for books -->

	<script src="dashboard/js/jquery-1.11.1.min.js"></script>
	<script src="dashboard/js/custom.js"></script>
	<script>
		var x=window.location.search.substring(1),y;
		if(x)
		{
			y=x.split('=');
//                console.log(y[0]);
if(y[0]=='requested')
	alert("Request Submitted.");
}
</script>
<!-- Script to remove URLs -->
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
<link rel="shortcut icon" href="img/logo.ico">
<!--Custom Font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->

<script src="dashboard/js/bootstrap.min.js"></script>

<link href="dashboard/css/bootstrap.min.css" rel="stylesheet">
<link href="dashboard/css/font-awesome.min.css" rel="stylesheet">
<link href="dashboard/css/datepicker3.css" rel="stylesheet">
<link href="dashboard/css/styles.css" rel="stylesheet">
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
						<li class="active"><a href="student-profile-books.php"><em class="fa fa-server">&nbsp;</em> Books</a></li>
						<li><a href="student-profile-activity.php"><em class="fa fa-bullhorn">&nbsp;</em> Activity</a></li>
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
							<li class="active">Books</li>
						</ol>
					</div><!--/.row-->
					<!-- Main -->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">All Books</h1>
						</div>
					</div><!--/.row-->
					<?php 
					if(isset($_GET['showlimit']))
						$limit=$_GET['showlimit'];
					else
						$limit = 10;  
					if (isset($_GET["page"]))
						$page  = $_GET["page"];
					else
						$page=1;   
					$start_from = ($page-1) * $limit;  
					$sql2="Select count(access_code) from books_master";
					$q2=mysqli_query($conn,$sql2);
					$r2=mysqli_fetch_assoc($q2);
					?>
					<!-- Main Content -->
					<div class="row">
						<div class="col-md-12">
							<form method="post" role="form">
								<div class="input-group input-group-lg">
									<input type="text" name="query" id="searchbox" placeholder="Search" class="form-control">
									<div class="input-group-btn">
										<button type="submit" name="search" class="btn btn-default" tabindex="-1"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</form>
							<br>
							<div class="row">
								<div class="col-lg-12">
									<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-question-circle-o">&nbsp;</em>Dont see your book?<a data-toggle="modal" data-target="#RequestBookModal" href="#"><u> Request Book </u></a><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
								</div>
							</div><!--/.row-->		
							<br>
							<div class="panel panel-default">
								<div class="panel-heading">Showing <?php echo $r2['count(access_code)'];?> Results
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li>
												<ul class="dropdown-settings">
													<li><a href="#" onclick="insertParam('showlimit',10);">
														<em class="fa fa-cog"></em>10</a>
													</li>
													<li class="divider"></li>
													<li><a href="#" onclick="insertParam('showlimit',25);">
														<em class="fa fa-cog"></em>25
													</a></li>
													<li class="divider"></li>
													<li><a href="#" onclick="insertParam('showlimit',50);">
														<em class="fa fa-cog"></em>50
													</a></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>	
							</div>
							<div class="panel-body">
								<?php
								if(isset($_POST['search']))
								{
									$q9=$_POST['query'];
									$sql3="Select * from books_master where name like '%{$q9}%' or author like '%{$q9}%' or category like '%{$q9}%' or availability like '%{$q9}%' or access_code like '%{$q9}%' ORDER BY name ASC LIMIT $start_from, $limit ";
								}
								else
								{
									$sql3="Select * from books_master ORDER BY name ASC LIMIT $start_from, $limit";
								}
								$query3=mysqli_query($conn,$sql3);
								$found=mysqli_num_rows($query3);
								if(!$found)
								{
									echo "<h4 style=\"position:absolute; top:60%; left:60%\">--No Users :(--</h4>";
								}
								else
								{
									while($found=mysqli_fetch_array($query3,MYSQLI_ASSOC))
									{
										?>
										<div class="search-result-item col-md-12">
											<div class="col-sm-2"><a href="#">
												<img class="search-result-image img-responsive" src="http://via.placeholder.com/150x150">
											</a></div>
											<div class="search-result-item-body col-sm-10">
												<div class="row">
													<div class="col-sm-9">
														<h3 class="search-result-title"><a href="#"><?php echo $found['name'] . " - " . $found['author']; ?></a></h3>
														<p class="text-muted"><?php echo $found['category'];?></p>
														<p><?php echo $found['description'];?></p>
													</div>
													<div class="col-sm-3 text-center">
														<?php 
														$class="info";
														if($found['availability']=="Available")
															{$class="success";}
														if($found['availability']=="Missing")
															{$class="warning";}
														if($found['availability']=="Issued")
															{$class="danger";}
														?>
														<h3><a class="btn btn-primary btn-<?php echo $class;?> btn-md" href="#"><?php echo $found['availability'];?></a></h3>
														<a class="btn btn-primary btn-info btn-md" onclick="insertParam('accesscode','<?php echo $found['access_code'];?>');"  href="#" data-toggle="modal" data-target="#BorrowBookModal">View Details</a>
													</div>
													<!-- insertParam('accesscode','<?php echo $found['access_code'];?>'); -->
												</div>
											</div>
										</div><!--/.search-result-item-->
										<?
									}
								}
								?>
							</div>
						</div>
						<div class="text-center">
							<div class="btn-group">
								<button type="button" class="btn btn-default"><span class="fa fa-arrow-left"></span></button>
								<button type="button" class="btn btn-default">Previous</button>
								<?php
								$total_records = $r2['count(access_code)'];  
								$total_pages = ceil($total_records / $limit); 
								// $pagLink = "<button type= \"button\" class=\"btn btn-default\">";   
								for ($i=1; $i<=$total_pages; $i++) {  
									?>
									<button type="button" class="btn btn-default" onclick="insertParam('page',<?php echo $i;?>);"><?php echo $i;?></button>
									<!-- $pagLink .= " <a href='#' onclick='insertParam('page','".$i.")"'.'>".$i."</a>"; -->
									<?php
								}  
								?>	
								<button type="button" class="btn btn-default">Next</button>
								<button type="button" class="btn btn-default"><span class="fa fa-arrow-right"></span></button>
							</div>
						</div>
					</div>
					<!-- Main Ending -->
					<!-- Footer -->
					<footer class="col-sm-12">
						<p class="back-link">&copy CMSA-Library 2017 By <a href="https://github.com/soumyankar" target="_blank"> Soumyankar Mohapatra</a></p>
					</footer>
				</div><!--/.row-->

			</div>	<!--/.main-->
			<!-- Modal -->
			<div class="modal fade" id="RequestBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Request Book Addition</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">   
							<form class="form-horizontal row-border" method="post" action="#">
								<div class="form-group">
									<label class="col-md-2 control-label">Book Name</label>
									<div class="col-md-10">
										<input type="text" name="bname" id="bname" placeholder="Book name" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Author</label>
									<div class="col-md-10">
										<input type="text" name="author" id="author"  placeholder="Author name" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Publisher</label>
									<div class="col-md-10">
										<input type="text" name="publisher" id="publisher" placeholder="Publisher name" class="form-control">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="breq" id="breq" class="btn btn-primary">Request</button>
								</div>	
							</form>
						</div>
					</div>
				</div>
			</div>
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
		<!-- Book borrow modal -->
		<?php
		if(isset($_GET['accesscode'])){
			$ac=$_GET['accesscode'];
			echo $ac;
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
								<button type="submit" name="borrow" id="borrow" class="btn btn-primary">Request</button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>