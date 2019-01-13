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
						<li><a href="admin-panel-students.php"><em class="fa fa-user">&nbsp;</em> Students</a></li>
						<li class="active"><a href="admin-panel-manage.php"><em class="fa fa-balance-scale">&nbsp;</em> Manage</a></li>
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
							</a>
						</li>
						<li class="active">Manage</li>
					</ol>
				</div>
				<!--/.row-->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Manage Requests</h1>
					</div>
				</div>
				<!--/.row-->		
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">Borrow Requests</div>
							<div class="panel-body">
								<div class="bootstrap-table" style="">
									<div class="fixed-table-toolbar" >
										<div class="columns btn-group pull-right">
											<button class="btn btn-default" type="button" name="refresh" title="Refresh"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button><button class="btn btn-default" type="button" name="toggle" title="Toggle"><i class="glyphicon glyphicon glyphicon-list-alt icon-list-alt"></i></button>
											<div class="keep-open btn-group" title="Columns">
												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button>
												<ul class="dropdown-menu" role="menu">
													<li><label><input type="checkbox" data-field="id" value="1" checked="checked">Book ID</label></li>
													<li><label><input type="checkbox" data-field="name" value="2" checked="checked">Student Name</label></li>
													<li><label><input type="checkbox" data-field="price" value="3" checked="checked">Availability</label></li>
												</ul>
											</div>
										</div>
										<div class="pull-right search"><input name="manage_search" class="form-control" type="text" placeholder="Search"></div>
									</div>
									<div class="fixed-table-container">
										<div class="fixed-table-header">
											<table></table>
										</div>
										<div class="fixed-table-body">
											<div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
											<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover" style="overflow-x: auto; margin-top: 0px;">
												<thead>
													<tr>
														<th style="">
															<div data-field="id" class="th-inner sortable">Book ID</div>
															<div class="fht-cell"></div>
														</th>

														<th style="">
															<div data-field="id" class="th-inner sortable">Book</div>
															<div class="fht-cell"></div>
														</th>

														<th style="">
															<div data-field="name" class="th-inner sortable">Student Name</div>
															<div class="fht-cell"></div>
														</th> 
														<th style="">
															<div data-field="price" class="th-inner sortable">Requested At:</div>
															<div class="fht-cell"></div>
														</th>
														<th style="">
															<div data-field="availability" class="th-inner sortable">Availability</div>
															<div class="fht-cell"></div>
														</th>
														<th style="">
															<div data-field="decision" class="th-inner sortable">Decision</div>
															<div class="fht-cell"></div>
														</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													if(isset($_POST['manage_search']))
													{
														$q9=$_POST['manage_search'];
														$sql3="Select * from borrow_requests where roll_id like '%{$q9}%' or book_id like '%{$q9}%'";
													}
													else
													{
														$sql3="Select * from borrow_requests where status IS NULL ";
													}
													$query3=mysqli_query($conn,$sql3);
													$found=mysqli_num_rows($query3);
													if(!$found)
													{
														echo "<div class=\"col-md-12 panel panel-default\"><h4>--No borrow requests :(--</h4></div";
													}
													else
													{
														while($found=mysqli_fetch_array($query3,MYSQLI_ASSOC))
														{
															$bid=$found['book_id'];
															$rid=$found['roll_id'];
															$sql4="Select * from books_master where access_code='$bid' ";
															$sql5="Select * from students where roll_id='$rid'";
															$q4=mysqli_query($conn,$sql4);
															$result4=mysqli_fetch_assoc($q4);
															$q5=mysqli_query($conn,$sql5);
															$result5=mysqli_fetch_assoc($q5);
															$class="info";
															if($result4['availability']=="Available")
																{$class="success";}
															if($result4['availability']=="Missing")
																{$class="warning";}
															if($result4['availability']=="Issued")
																{$class="danger";}	
															?>
															<tr data-index="0">
																<td style=""><?php echo $result4['access_code'];?></td>
																<td style=""><?php echo $result4['name'] . " by " . $result4['author'];?></td>
																<td style=""><?php echo $result5['name'];?></td>
																<td style=""><?php echo $found['requested_at'];?></td>
																<td style=""><button type="button" href="#" class="btn btn-sm btn-<?php echo $class;?>"><?php echo $result4['availability'];?></button></td>
																<td style=""><button type="button" style="margin-bottom:5px;" class="btn-sm btn-success"><a onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $result4['access_code']."&roll=". $rid."&decision=YES";?>">Approve</a></button>
																	<button type="button" style="display: inline-block; padding: 5px;" href="#" class="btn-sm btn-danger"><a onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $result4['access_code']."&roll=". $rid."&decision=NO";?>">Decline</a></button></td>
																</tr>
																<?php
															}
														}
														?>
													</tbody>
												</table>
											</div>
											<div class="fixed-table-pagination">
												<div class="pull-left pagination-detail">
													<span class="pagination-info">Showing 1 to 10 of 21 rows</span>
													<span class="page-list">
														<span class="btn-group dropup">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="page-size">10</span> <span class="caret"></span></button>
															<ul class="dropdown-menu" role="menu">
																<li class="active"><a href="javascript:void(0)">10</a></li>
																<li><a href="javascript:void(0)">25</a></li>
																<li><a href="javascript:void(0)">50</a></li>
																<li><a href="javascript:void(0)">100</a></li>
															</ul>
														</span>
														records per page
													</span>
												</div>
												<div class="pull-right pagination">
													<ul class="pagination">
														<li class="page-first disabled"><a href="javascript:void(0)">&lt;&lt;</a></li>
														<li class="page-pre disabled"><a href="javascript:void(0)">&lt;</a></li>
														<li class="page-number active disabled"><a href="javascript:void(0)">1</a></li>
														<li class="page-number"><a href="javascript:void(0)">2</a></li>
														<li class="page-number"><a href="javascript:void(0)">3</a></li>
														<li class="page-next"><a href="javascript:void(0)">&gt;</a></li>
														<li class="page-last"><a href="javascript:void(0)">&gt;&gt;</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>	
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">Registration Approvals</div>
								<div class="panel-body">
									<div class="bootstrap-table" style="">
										<div class="fixed-table-toolbar" >
											<div class="columns btn-group pull-right">
												<button class="btn btn-default" type="button" name="refresh" title="Refresh"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button><button class="btn btn-default" type="button" name="toggle" title="Toggle"><i class="glyphicon glyphicon glyphicon-list-alt icon-list-alt"></i></button>
												<div class="keep-open btn-group" title="Columns">
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button>
													<ul class="dropdown-menu" role="menu">
														<li><label><input type="checkbox" data-field="id" value="1" checked="checked">Roll ID</label></li>
														<li><label><input type="checkbox" data-field="name" value="2" checked="checked">Student Name</label></li>
														<li><label><input type="checkbox" data-field="price" value="3" checked="checked">Availability</label></li>
													</ul>
												</div>
											</div>
											<div class="pull-right search"><input class="form-control" method="post" name="borrow_search" type="text" placeholder="Search"></div> 
										</div>
										<div class="fixed-table-container">
											<div class="fixed-table-header">
												<table></table>
											</div>
											<div class="fixed-table-body">
												<div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
												<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover" style="overflow-x: auto; margin-top: 0px;">
													<thead>
														<tr>
															<th style="">
																<div data-field="id" class="th-inner sortable">Roll Number</div>
																<div class="fht-cell"></div>
															</th>

															<th style="">
																<div data-field="id" class="th-inner sortable">Student Name</div>
																<div class="fht-cell"></div>
															</th>

															<th style="">
																<div data-field="name" class="th-inner sortable">Year</div>
																<div class="fht-cell"></div>
															</th>
															<th style="">
																<div data-field="decision" class="th-inner sortable">Decision</div>
																<div class="fht-cell"></div>
															</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														if(isset($_POST['borrow_search']))
														{
															$q9=$_POST['borrow_search'];
															$sql3="Select * from students where roll_id like '%{$q9}%' or name like '%{$q9}%'";
														}
														else
														{
															$sql3="Select * from students where approved='no' ";
														}
														$query3=mysqli_query($conn,$sql3);
														$found=mysqli_num_rows($query3);
														if(!$found)
														{
															echo "<div class=\"col-md-12 panel panel-default\"><h4>--No registration approval requests :(--</h4></div";
														}
														else
														{
															while($found=mysqli_fetch_array($query3,MYSQLI_ASSOC))
															{
																?>
																<tr data-index="0">
																	<td style=""><?php echo $found['roll_id'];?></td>
																	<td style=""><?php echo $found['name'];?></td>
																	<td style=""><?php echo $found['year'];?></td>
																	<td style=""><button type="button" href="#" style="margin-bottom:5px;" class="btn-sm btn-success"><a onclick="return confirm('Are you sure?')" href="approve.php?id=<?php echo $found['roll_id']."&decision=YES";?>">Approve</a></button>
																		<button type="button" style="display: inline-block; padding: 5px;" href="#" class="btn-sm btn-danger"><a onclick="return confirm('Are you sure?')" href="approve.php?id=<?php echo $found['roll_id']."&decision=NO";?>">Decline</a></button></td>
																	</tr>
																	<?php
																}
															}
															?>
														</tbody>
													</table>
												</div>
												<div class="fixed-table-pagination">
													<div class="pull-left pagination-detail">
														<span class="pagination-info">Showing 1 to 10 of 21 rows</span>
														<span class="page-list">
															<span class="btn-group dropup">
																<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="page-size">10</span> <span class="caret"></span></button>
																<ul class="dropdown-menu" role="menu">
																	<li class="active"><a href="javascript:void(0)">10</a></li>
																	<li><a href="javascript:void(0)">25</a></li>
																	<li><a href="javascript:void(0)">50</a></li>
																	<li><a href="javascript:void(0)">100</a></li>
																</ul>
															</span>
															records per page
														</span>
													</div>
													<div class="pull-right pagination">
														<ul class="pagination">
															<li class="page-first disabled"><a href="javascript:void(0)">&lt;&lt;</a></li>
															<li class="page-pre disabled"><a href="javascript:void(0)">&lt;</a></li>
															<li class="page-number active disabled"><a href="javascript:void(0)">1</a></li>
															<li class="page-number"><a href="javascript:void(0)">2</a></li>
															<li class="page-number"><a href="javascript:void(0)">3</a></li>
															<li class="page-next"><a href="javascript:void(0)">&gt;</a></li>
															<li class="page-last"><a href="javascript:void(0)">&gt;&gt;</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>

							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">Book Addition Requests</div>
									<div class="panel-body">
										<div class="bootstrap-table" style="">
											<div class="fixed-table-toolbar" >
												<div class="columns btn-group pull-right">
													<button class="btn btn-default" type="button" name="refresh" title="Refresh"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button><button class="btn btn-default" type="button" name="toggle" title="Toggle"><i class="glyphicon glyphicon glyphicon-list-alt icon-list-alt"></i></button>
													<div class="keep-open btn-group" title="Columns">
														<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button>
														<ul class="dropdown-menu" role="menu">
															<li><label><input type="checkbox" data-field="id" value="1" checked="checked">Roll ID</label></li>
															<li><label><input type="checkbox" data-field="name" value="2" checked="checked">Student Name</label></li>
															<li><label><input type="checkbox" data-field="price" value="3" checked="checked">Availability</label></li>
														</ul>
													</div>
												</div>
												<div class="pull-right search"><input class="form-control" name="addition_search" method="post" type="text" placeholder="Search"></div>
											</div>
											<div class="fixed-table-container">
												<div class="fixed-table-header">
													<table></table>
												</div>
												<div class="fixed-table-body">
													<div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
													<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover" style="overflow-x: auto; margin-top: 0px;">
														<thead>
															<tr>
																<th style=""></th>
																<th style="">
																	<div data-field="id" class="th-inner sortable">Book Name</div>
																	<div class="fht-cell"></div>
																</th>

																<th style="">
																	<div data-field="id" class="th-inner sortable">Author</div>
																	<div class="fht-cell"></div>
																</th>

																<th style="">
																	<div data-field="name" class="th-inner sortable">Publisher</div>
																	<div class="fht-cell"></div>
																</th>

																<th style="">
																	<div data-field="name" class="th-inner sortable">Requested by</div>
																	<div class="fht-cell"></div>
																</th>
															</tr>
														</thead>
														<tbody>
															<?php 
															if(isset($_POST['addition_search']))
															{
																$q10=$_POST['borrow_search'];
																$sql5="Select * from book_requests where roll_id like '%{$q10}%' or name like '%{$q10}%'";
															}
															else
															{
																$sql5="Select * from book_requests ";
															}
															$query5=mysqli_query($conn,$sql5);
															$found2=mysqli_num_rows($query5);
															?>
															<tr data-index="0">
																<?php
																if(!$found2)
																{
																	echo "<div class=\"col-md-12 panel panel-default\"><h4>--No registration approval requests :(--</h4></div";
																}
																else
																{
																	while($found2=mysqli_fetch_array($query5,MYSQLI_ASSOC))

																	{
																		$y=$found2['roll_id'];
																		$xy="Select * from students where roll_id='$y'";
																		$qxy=mysqli_query($conn,$xy);
																		$x=mysqli_fetch_assoc($qxy);
																		?>
																		
																		<td style="align-content: center; padding-top: 20px;"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></td>
																		<td style=""><?php echo $found2['name'];?></td>
																		<td style=""><?php echo $found2['author'];?></td>
																		<td style=""><?php echo $found2['publisher'];?></td>
																		<td style=""><?php echo $x['roll_id']."-".$x['name'];?></td>
																	</tr>
																	<?php
																}
															}?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<!-- Main Container -->

							<div class="col-sm-12">
								<p class="back-link">&copy CMSA-Library 2017 By <a href="https://github.com/soumyankar" target="_blank"> Soumyankar Mohapatra</a></p>
							</div>
						</div><!--/.row-->
					</div>	<!--/.main-->

					<script src="dashboard/js/jquery-1.11.1.min.js"></script>
					<script src="dashboard/js/bootstrap.min.js"></script>
					<script src="dashboard/js/custom.js"></script>
					<script type="text/javascript">
						function test()
						{
							window.confirm("Approve borrow request?");
						}
					</script>

				</body>
				</html>