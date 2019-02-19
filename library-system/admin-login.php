<?php
session_start();
include 'connect.php';
if(isset($_POST['register']))
{
  $adkey=$_POST['admin_roll'];
  $pass=$_POST['password'];
  $sql="Select * from admin_master where admin_id='$adkey' and password='$pass'";
  $query=mysqli_query($conn,$sql);
  $result=mysqli_fetch_assoc($query);
  if($result)
  {
    $_SESSION['adminkey']=$adkey;
    header("location:admin-panel.php");
  }
  else
  {
    echo "<script>alert('Incorrect Credentials');</script>";
  }
}
$som=basename($_SERVER['REQUEST_URI']);
if(isset($_GET['adminkey']))
{
  $admin_id=$_GET['adminkey'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="img/logo.ico">
  <title>Administrator Login</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <!-- Script for updating modal username -->
  <script type="text/javascript">
    function setname(last_segment)
    {
      if(last_segment=="NULL")
        last_segment="admin_fail";
      document.getElementById('admin_roll').value = last_segment;
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
    kvp.unshift("admin-login.php?");
    var out="admin-login.php?"+kvp.pop();
    window.history.pushState( {} , '', out); 
  }
</script>
<!-- Custom styles for this template -->
<link href="css/agency.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="padding-top: 0;
  padding-bottom: 0; background-color: #212529;">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">CMSA Library</a>
    <a class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color:#212529; color:#fed136; ">
      Menu
    </a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Main -->
<section class="bg-light" id="team">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Administrators</h2>
        <h3 class="section-subheading text-muted"></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="team-member">
          <a data-toggle="modal" onclick="insertParam('adminkey','admin_001'); setname('admin_001');" style="cursor: pointer;" data-target="#LoginPortal">
            <img class="mx-auto rounded-circle" data-toggle="modal" data-target="#LoginPortal" src="img/admins/mb.png" alt=""></a>
            <h4>Moumita Banerjee</h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="team-member">
            <a data-toggle="modal" style="cursor: pointer;" onclick="setname('admin_002'); insertParam('adminkey','admin_002');" data-target="#LoginPortal">
              <img  data-toggle="modal" data-target="#LoginPortal" class="mx-auto rounded-circle" src="img/admins/ns.png" alt="">
            </a>
            <h4>Nivedita Saha</h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <a data-toggle="modal" onclick="insertParam('adminkey','admin_003'); setname('admin_003');" style="cursor: pointer;" data-target="#LoginPortal">
              <img class="mx-auto rounded-circle" src="img/admins/ss.png" data-toggle="modal" data-target="#LoginPortal" alt="">
            </a>
            <h4>Sourav Saha</h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <a data-toggle="modal" style="cursor: pointer;" data-target="#LoginPortal" onclick="setname('admin_004'); insertParam('adminkey','admin_004');">
              <img class="mx-auto rounded-circle" src="img/admins/akc.png" alt="" data-toggle="modal" data-target="#LoginPortal">
            </a>
            <h4>Arun Kr. Chakrabarti</h4>
          </div>
        </div>

        <div class="col-md-3">
          <div class="team-member">
            <a data-toggle="modal" style="cursor: pointer;" data-target="#LoginPortal" onclick="setname('admin_005'); insertParam('adminkey','admin_005');">
              <img class="mx-auto rounded-circle" src="img/admins/sb.png" alt="" data-toggle="modal" data-target="#LoginPortal">
            </a>
            <h4>Subhankar Bhandari</h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="team-member">
            <a data-toggle="modal" style="cursor: pointer;" data-target="#LoginPortal" onclick="setname('admin_006'); insertParam('adminkey','admin_006');">
              <img class="mx-auto rounded-circle" src="img/admins/sd.png" alt="" data-toggle="modal" data-target="#LoginPortal">
            </a>
            <h4>Sanjay Sir</h4>
          </div>
        </div>
        <div class="col-md-6">
          <div class="team-member">
            <a data-toggle="modal" style="cursor: pointer;" data-target="#LoginPortal" onclick="setname('admin_007'); insertParam('adminkey','admin_007');">
              <img class="mx-auto rounded-circle" src="img/admins/rd.png" alt="" data-toggle="modal" data-target="#LoginPortal">
            </a>
            <h4>Rabindra Sir</h4>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; CMSA Library 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://github.com/soumyankar" target="_blank">
                  <i class="fa fa-github"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://twitter.com/mr_mohapatra98" target="_blank">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.reddit.com/user/AngryFish98" target="_blank">
                  <i class="fa fa-reddit"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- Register Modal -->
    <div class="modal fade" id="LoginPortal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Admin Login Portal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="msgbox" style="font-size: 18px;"> 
              <span id="msgbox"></span> 
            </div>
            <form id="login_form" method="post" role="form" name="sentMessage" novalidate="novalidate">
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <h5>Username</h5>
                    <input class="form-control" id="admin_roll" name="admin_roll" type="text" placeholder="admin_test000" required="required" readonly>
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
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="register">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <!-- Login Script -->
</body>

</html>
