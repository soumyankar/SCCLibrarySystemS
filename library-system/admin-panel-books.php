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
	$roll=$_POST['access'];
	$name=$_POST['name'];
	$author=$_POST['author'];
	$category=$_POST['category'];
	$description=$_POST['description'];
	$regsql="INSERT INTO `books_master`(`access_code`, `name`, `author`, `category`, `description`, `availability`) VALUES ('$roll','$name','$author','$category','$description','Available')";
	$reqque=mysqli_query($conn,$regsql);
	if($reqque)
	{
		echo "<script>alert(\"Book added\"); 
		</script>";
	}
	else
	{
		echo "<script>alert(\"Book wasnt added\"); 
		</script>"."Not Inserted" . mysqli_error($conn);
	}
}
if(isset($_POST['remove']))
{
	$rid=$_POST['remove_id'];
	$rsql="select * from books_master where access_code='$rid'";
	$rquery=mysqli_query($conn,$rsql);
	$rres=mysqli_fetch_assoc($rquery);
	if($rres)
	{
		$demo="delete from books_master where access_code='$remove_id'";
		$rdemo=mysqli_query($conn,$demo);
		echo "<script>alert(\"Book removed\"); 

		</script>";
	}
	else
	{
		echo "<script>
		alert(\"Book doesnt exist\"); 
		</script>";
	}

}
$s2="Select count(*) from books_master";
$q2=mysqli_query($conn,$s2);
$re2=mysqli_fetch_assoc($q2);

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
	<!-- script to add params to url -->
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
<!-- Form Validation -->
  <script>
        <!-- For Registration -->
    (function($,W,D)
    {
      var JQUERY4U = {};

      JQUERY4U.UTIL =
      {
        setupFormValidation: function()
        {
          //form validation rules
          $("#addbook").validate({
            rules: {
              name: "required",
              img: {
                remote: "upload.php"
              }
            },
            messages: {
              name: "Please enter book name",
              img:{
              		remote: "Some error in uploading"	
              }
              password: {
                required: "Please provide a Password",
                minlength: "Your password must be at least 5 characters long"
              }
            },
            submitHandler: function(form) {
              console.log(hello);
              form.submit();
            }
          });
        }
      }

      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
      });

    })(jQuery, window, document);
    </script>

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
						<li><a href="admin-panel-students.php"><em class="fa fa-user">&nbsp;</em> Students</a></li>
						<li><a href="admin-panel-manage.php"><em class="fa fa-balance-scale">&nbsp;</em> Manage</a></li>
						<li class="active"><a href="admin-panel-books.php"><em class="fa fa-server">&nbsp;</em> Books</a></li>
						<li><a href="#"><em class="fa fa-motorcycle">&nbsp;</em> Additional Feature</a></li>

						<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
					</ul>
				</div><!--/.sidebar-->

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
				<!-- Main Container -->
				<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
					<div class="row">
						<ol class="breadcrumb">
							<li><a href="#">
								<em class="fa fa-home"></em>
							</a></li>
							<li class="active">Books</li>
						</ol>
					</div><!--/.row-->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">Books Database</h1>
						</div>
					</div><!--/.row-->

					<div class="row">
						<div class="col-md-12">
							<form method="post" role="form">
								<div class="input-group input-group-lg">
									<input type="text" name="query" id="query" placeholder="Search" class="form-control">
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
							<span class="btn-group dropup">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="page-size">Category</span> <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li class="active"><a>Category</a></li>
									<li value=""><a></a></li>
									<li value=""><a></a></li>
									<li value=""><a></a></li>
								</ul>
							</span>
							<span class="btn-group dropup">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="page-size">Author</span> <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li class="active"><a href="javascript:void(0)">Author</a></li>
									<li value=""><a href="javascript:void(0)"></a></li>
									<li value=""><a href="javascript:void(0)"></a></li>
									<li value=""><a href="javascript:void(0)"></a></li>
								</ul>
							</span>
						</div>
					</div>
					<br>
					<div class="col-md-12">
						<button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#RemoveBook"><i class="fa fa-minus" aria-hidden="true"></i>
						Remove Book</button>
						<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#AddBook"><i class="fa fa-plus" aria-hidden="true"></i>
						Add Book</button>
						<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#ModifyBook"><i class="fa fa-wrench" aria-hidden="true"></i>
						Modify Book</button>
						<div class="panel panel-default">
							<div class="panel-heading">Showing <?php echo $re2['count(*)'];?> Results
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
								$sql3="Select * from books_master where name like '%{$q9}%' or author like '%{$q9}%' or category like '%{$q9}%' or availability like '%{$q9}%'";
							}
							else
							{
								$sql3="Select * from books_master  ORDER BY name ASC LIMIT $start_from, $limit";
							}
							$query3=mysqli_query($conn,$sql3);
							$found=mysqli_num_rows($query3);
							if(!$found)
							{
								echo "<div class=\"col-md-12 panel panel-default\"><h4>--No books :(--</h4></div";
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
													<h3 class="search-result-title"><a href="#"><?php echo $found['name']."-".$found['author'];?></a></h3>
													<p class="text-muted"><?php echo $found['category'];?></p>
													<p><?php echo $found['description'];?></p>
												</div>
												<?php 
												$class="info";
												if($found['availability']=="Available")
													{$class="success";}
												if($found['availability']=="Missing")
													{$class="warning";}
												if($found['availability']=="Issued")
													{$class="danger";}
												?>
												<div class="col-sm-3 text-center">
													<h3><a class="btn btn-primary btn-<?php echo $class;?> btn-md" href="#"><?php echo $found['availability'];?></a></h3>
													<a class="btn btn-primary btn-info btn-md" href="#">View Details</a>
												</div>
											</div>
										</div>
									</div><!--/.search-result-item-->
									<?php
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
								
								<button type="button" onclick="insertParam('page',<?php echo $i;?>);" class="btn btn-default"><?php echo $i;?></button>
								<!-- $pagLink .= " <a href='#' onclick='insertParam('page','".$i.")"'.'>".$i."</a>"; -->
								<?php
							}  
							?>	
							
							<button type="button" class="btn btn-default">Next</button>
							<button type="button" class="btn btn-default"><span class="fa fa-arrow-right"></span></button>
						</div>
					</div>
					<!-- Main Container -->

					<div class="col-sm-12">
						<p class="back-link">&copy CMSA-Library 2017 By <a href="https://github.com/soumyankar" target="_blank"> Soumyankar Mohapatra</a></p>
					</div>
				</div><!--/.row-->
			</div> <!--/.main-->

			<script src="dashboard/js/jquery-1.11.1.min.js"></script>
			<script src="dashboard/js/bootstrap.min.js"></script>
			<script src="dashboard/js/custom.js"></script>
			<!-- Modal Scripts (Add)-->
			<div class="modal fade" id="AddBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="addbook" role="form" method="post" name="sentMessage" enctype="multipart/form-data" novalidate="novalidate">
								<div class="col-md-12">
									<div class="form-group">
										<h5>Book-ID:</h5>
										<input class="form-control" id="book_id" name="access" type="text" placeholder="Book-ID" required="required" data-validation-required-message="Please enter Book-ID">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<h5>Book-Name:</h5>
										<input class="form-control" name="name" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter Name">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<h5>Author:</h5>
										<input class="form-control" id="author" name="author" type="text" placeholder="Author-Name" required="required" data-validation-required-message="Please enter Author">
										<p class="help-block text-danger"></p>
									</div>

									<div class="form-group">
										<h5>Category:</h5>
										<input class="form-control" id="category" name="category" type="text" placeholder="Category-Name" required="required" data-validation-required-message="Please enter Author">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<h5>Description:</h5>
										<input class="form-control" id="description" name="description" type="text" placeholder="" required="required" data-validation-required-message="Please enter Publisher">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<h5>Upload Image:</h5>
										<input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
										<input class="form-control btn" style="background-color: green; color: white; border-radius: 5px solid white;" type="button"  value="Upload Image" name="submit">
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="register" class="btn btn-primary">Save changes</button>
								</div>
							</form>    
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Scripts (Remove)-->
			<div class="modal fade" id="RemoveBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Remove Book</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="removebook" method="post" role="form" name="sentMessage" novalidate="novalidate">
								<div class="col-md-12">
									<div class="form-group">
										<h5>Book-ID:</h5>
										<input class="form-control" id="bname" name="remove_id" type="text" placeholder="Book-ID" required="required" data-validation-required-message="Please enter Book-ID">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="remove" class="btn btn-danger">Remove Book</button>
								</div>
							</form>    
						</div>
					</div>
				</div>
			</div>					
			<!-- Modal Scripts (Modify)-->
			<div class="modal fade" id="ModifyBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modify Book</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Oops, Still working on it :p    
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-info">Modify Book</button>
						</div>
					</div>
				</div>
			</div>
		</body>
		</html>