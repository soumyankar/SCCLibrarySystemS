<?php
include "connect.php";
session_start();
if(isset($_SESSION['user_id']))
  header("location: student-profile-home.php");
if(isset($_POST['register'])){
  $name=$_POST["name"];
  $sroll=$_POST["roll"];
  $year=$_POST["year"];
  $roll_year=$_POST['roll_year'];
  $roll=$roll_year . "-" . $sroll;
  $pass=$_POST["register_password"];
  $sql="INSERT INTO students (roll_id,name,year,password) VALUES ('$roll','$name','$year','$pass')";
  $query=mysqli_query($conn,$sql);
  if(!$query)
  {
    echo "Not Inserted" . mysqli_error($conn);
  }
  header("location: index.php?registered=true");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script src="js/jquery.md5.js"></script>
  <script src="vendor/jquery/jquery.js"></script>
  <!-- Validation  --><script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>


  <link rel="shortcut icon" href="img/logo.ico">
  <title>CMSA Library System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.css" rel="stylesheet">

</head>
<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">CMSA Library</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="admin-login.php">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To The Library!</div>
        <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" data-toggle="modal" data-target="#LoginPortal">Student Login</a>
      </div>
    </div>
  </header>


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
              <a href="about.php"> &lt/&gt with ♥</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->
  <!-- Modal 6 -->
  <div class="modal fade" id="LoginPortal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student Login Portal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="msgbox" style="font-size: 18px;"> 
            <span id="msgbox"></span> 
          </div> 
          <form id="login_form" method="post" name="sentMessage" novalidate="novalidate">
            <div class="form-group">
              <h5>Login Credentials:</h5>
              <div style="display: inline-flex;">
              <select class="dropdown form-control" style="width: 30%; margin-right: 10px;" id="login_roll_year" name="roll_year">
                  <option class="form-control" value="">--</option>
                  <option class="form-control" value="14S">14S-</option>
                  <option class="form-control" value="14S">15S-</option>
                  <option  class="form-control" value="16S">16S-</option>
                  <option  class="form-control" value="17S">17S-</option>
                  <option  class="form-control" value="18S">18S-</option>
                  <option  class="form-control" value="19S">19S-</option>
                  <option  class="form-control" value="20S">20S-</option>
                  <option  class="form-control" value="21S">21S-</option>
                  <option  class="form-control" value="22S">22S-</option>
                  <option  class="form-control" value="23S">23S-</option>
                </select>
              <input class="form-control" id="login_roll" style="width: 100%;" type="text" placeholder="Roll-Number" required="required" data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="form-group">
              <input class="form-control" id="login_password" type="password" placeholder="**********" required="required" data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit"  id="login_submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          <div class="service-heading">
            <h4><a data-toggle="modal"  href="#" data-target="#RegisterPortal" data-dismiss="modal">Register Yourself</a></h4>
          </div>    
        </div>
      </div>
    </div>
  </div>
  <!-- Login-Modal -->
  <!-- Register Modal -->
  <div class="modal fade" id="RegisterPortal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student Register Portal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="register_form" method="post" role="form" name="sentMessage" novalidate="novalidate">
            <div class="form-group">
              <h5>Roll-Number:</h5>
              <div style="display: inline-flex;">
                <select class="dropdown form-control" style="width: 30%; margin-right: 10px;" id="roll_year" name="roll_year">
                  <option class="form-control" value="">--</option>
                  <option class="form-control" value="14S">14S-</option>
                  <option class="form-control" value="14S">15S-</option>
                  <option  class="form-control" value="16S">16S-</option>
                  <option  class="form-control" value="17S">17S-</option>
                  <option  class="form-control" value="18S">18S-</option>
                  <option  class="form-control" value="19S">19S-</option>
                  <option  class="form-control" value="20S">20S-</option>
                  <option  class="form-control" value="21S">21S-</option>
                  <option  class="form-control" value="22S">22S-</option>
                  <option  class="form-control" value="23S">23S-</option>
                </select>
                <input class="form-control" id="roll" name="roll" style="width: 100%;" type="text" placeholder="Roll-Number" required="required" data-validation-required-message="Please enter your Roll-Number">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="form-group">
              <h5>Name:</h5>
              <input class="form-control" id="name" name="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your Name">
              <p class="help-block text-danger"></p>
            </div>
            <div class="form-group">
              <h5>Year:</h5>
              <select class="dropdown form-control" name="year">
                <option class="form-control" value="">--Select Year--</option>
                <option class="form-control" value="1st Year">1st Year</option>
                <option class="form-control" value="2nd Year">2nd Year</option>
                <option  class="form-control" value="3rd Year">3rd Year</option>
              </select>
              <p class="help-block text-danger"></p>
            </div>
            <div class="form-group">
              <h5>Password:</h5>
              <input class="form-control" id="register_password" name="register_password" type="password" placeholder="**********" required="required" data-validation-required-message="Please enter your password">
              <p class="help-block text-danger"></p>
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
  <!-- Register Modal -->
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
          $("#register_form").validate({
            rules: {
              name: "required",
              roll: {
                required: true,
                remote: {
                  url: "check_roll.php",
                  type: "post",
                  data: { 
                    roll: function(){
                      return $('#roll_year').val()+"-"+($('#roll').val());
                    }   
                }
                }
              },
              register_password: {
                required: true,
                minlength: 5
              },
              year: {
                required: true
              },
              roll_year: {
                required: true
              }
            },
            messages: {
              name: "Please enter your Full Name",
              roll:{
                remote: "Roll Number is already registered"
              },
              register_password: {
                required: "Please provide a Password",
                minlength: "Your password must be at least 5 characters long"
              }           
            },
            submitHandler: function(form) {
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


  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="js/classie.js"></script>
  <script src="js/cbpAnimatedHeader.js"></script> -->

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="js/agency.js"></script>

  <script>
    var x=window.location.search.substring(1),y;
    if(x)
    {
      y=x.split('=');
//                console.log(y[0]);
if(y[0]=='registered')
  alert("Registration Successful! \nPlease Login to Continue.");
}
</script>

<script type="text/javascript">
  $('#login_submit').click(function() {

    var pass = $('#login_password').val();
    var year = $('#login_roll_year').val();
    var rollno = $('#login_roll').val();
    var roll = year + "-" + rollno;
    // console.log(roll);
    //    var salt = "HighSecurity";
    //       var strMD5 = $.md5(pass);
      // var strMD52 = $.md5(salt);
      // var saltEnc = strMD52+strMD5;
      // console.log('saltEnc');
      // $('#password').val(saltEnc);
      $("#msgbox").addClass('error-warning').html('Validating....').fadeIn(1000);

      $.post("ajax_login.php",{ login_roll:roll,login_pass:pass },function(data) {
        console.log(data);
        if ($.trim(data)=="Error") 
        {
          $("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
          { 
            //add message and change the class of the box and start fading
            $("#msgbox").html('<span style="color:red">Incorrect Roll-Number or Password!</span>').addClass('error-warning').fadeTo(900,1);
          });
        }
        else 
        {
          $("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
          { 
            //add message and change the class of the box and start fading
            $(this).html('Logging in.....').addClass('error-success').fadeTo(900,1,function()
            {
             document.location='student-profile-home.php';
           });
            
          });
        }
      });
      return false;
    });
  </script>

</body>
</html>