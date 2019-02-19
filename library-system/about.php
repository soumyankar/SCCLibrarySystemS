<?php
include "connect.php";
if(isset($_POST['register'])){
  $name=$_POST["feedback_name"];
  $sroll=$_POST["feedback_roll"];
  $msg=$_POST["feedback_message"];
  $sql="INSERT INTO `feedback` (`feedback_id`, `feedback_name`, `feedback_roll`, `feedback_msg`) VALUES (NULL, '$$name', '$sroll', '$msg');";
  $query=mysqli_query($conn,$sql);
  if(!$query)
  {
    echo "Not Inserted" . mysqli_error($conn);
  }
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
          <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="admin-login.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Services -->
  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Features</h2>
          <h3 class="section-subheading text-muted">Highlights of the library system:</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Machine Learning</h4>
          <p class="text-muted">Suggestive section for users, which follows their trend of borrowing books
          and refers to them the books they'd like to pick!(Kinda-buggy)</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Responsive Design</h4>
          <p class="text-muted">Fits perfectly onto any device of any viewport!</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Encryption</h4>
          <p class="text-muted">SSH encrypt for passwords; Don't worry about admins peeking into your profiles!</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Portfolio Grid -->
  <!-- Portfolio Grid Omitted -->
  <!-- About -->
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          <h3 class="section-subheading text-muted">Developed on:</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>HTML & CSS</h4>
                  <h4 class="subheading">Front-End UI</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Basic vanilla html. Implemented Bootstrap framework to make the website responsive
                  on all sorts of devices.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Javascript</h4>
                  <h4 class="subheading">Front-End Interaction</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">User interaction events captured through JS, Implemented
                  JQuery plugins and some custom scripts.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>PHP</h4>
                  <h4 class="subheading">Back-End Scripting</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Server side scripting done with php,as well as connections to the
                  database setup with elementary php.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>MySQL</h4>
                  <h4 class="subheading">Database Handling</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Back-End Data handled with MySQL queries and built-in functions for encryption as well.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>And
                  <br>Tons of
                  <br>Passion!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Developed By</h2>
            <h3 class="section-subheading text-muted">Me,myself and I!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
              <h4>Soumyankar Mohapatra</h4>
              <p class="text-muted">Lead Designer</p>
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
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">Built with hard work and love.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Clients -->
    <!-- Clients End -->
    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Feedback!</h2>
            <h3 class="section-subheading text-muted">Would really love to hear some feedback from any user!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="feedback_contactForm" method="post" role="form" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="feedback_name" name="feedback_name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="feedback_roll" name="feedback_roll" type="text" placeholder="Your Roll-Number*" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="feedback_message" name="feedback_message" placeholder="Your Feedback*" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" name="register" type="submit">Submit!</button>
                </div>
              </div>
            </form>
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
    
  </body>
  </html>