<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">

  <!-- Title -->
  <title>Foodzilla</title>

  <!-- Bootstrap Import -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS -->
  <link href="css/index.css" rel="stylesheet">

  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/b20f2a5bee.js" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Rowdies&display=swap" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Della+Respira&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

  <!-- Loader Script -->
  <script src="js/loader.js"></script>

</head>

<div class="loader_bg">
  <div id="loader"><img src="assets/images/foodzilla.png"></div>
</div>

<body>

  <!-- Top Section -->
  <header>

    <nav class="navbar fixed-top navbar-expand-md navbar-light navbar-fixed-top">
      <a class="navbar-brand" href="./">Foodzilla&trade;</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <?php
          if (isset($_SESSION["username"])) {
            echo '
              <li class="nav-item active">
                <a class="nav-link" href="./dashboard.php">' . $_SESSION["username"] . '</a>
              </li>
              ';
          } else {
            echo '
              <li class="nav-item active">
                <a class="nav-link" href="./login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./register.php">Register</a>
              </li>
              ';
          }
          ?>
          <li class="nav-item dropdown mr-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Navigate
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#features">Features</a>
              <a class="dropdown-item" href="#testimonial">Testimonial</a>
              <a class="dropdown-item" href="#about">About us</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    <div class="header-content">
      <img class="icon" alt="Foodzilla icon" src="assets/images/foodzilla.png">
      <h1> Foodzilla </h1>
      <hr>
      <p>A&nbsp;&nbsp;RECIPE&nbsp;&nbsp;IO</p>

    </div>
  </header>

  <!-- Features -->

  <section id="features">
    <div class="container feature-background">

      <div class="featurette-title mb-5">
        <h1 class="featurette-main-heading">Features</h1>
        <i class="fas fa-grip-lines fa-3x"></i>
        <i class="fas fa-star fa-3x"></i>
        <i class="fas fa-grip-lines fa-3x"></i>
      </div>


      <div class="row">

        <div class="featurette col-lg-4 p-3">
          <div class="featurette-box p-3">
            <i class="featurette-icon fas fa-hamburger fa-7x"></i>
            <h1 class="featurette-heading">Recipe Finder</h1>
            <h5 class="featurette-text">Just input the ingredients or recipe name and get variety of different recipe suggestions! Or get them from your fridge automatically!</h5>
            <!-- <button type="button" class="btn btn-outline-warning btn-lg featurette-button">Check it Out</button> -->
          </div>
        </div>
        <div class="featurette col-lg-4 p-3">
          <div class="featurette-box p-3">
            <i class="featurette-icon fas fa-clipboard fa-7x"></i>
            <h1 class="featurette-heading">Quick Notes</h1>
            <h5 class="featurette-text">Want to write some quick notes while cooking? Or maybe a TODO list? We have got you covered! Simply use the notepad feature.</h5>
            <!-- <button type="button" class="btn btn-outline-warning btn-lg featurette-button">Check it Out</button> -->
          </div>
        </div>
        <div class="featurette col-lg-4 p-3">
          <div class="featurette-box p-3">
            <i class="featurette-icon fas fa-users fa-7x"></i>
            <h1 class="featurette-heading">Social</h1>
            <h5 class="featurette-text">#CookTogether. Add friends and cook together. And see what they are cooking. Or show what you are cooking. Its always fun with friends!</h5>
            <!-- <button type="button" class="btn btn-outline-warning btn-lg featurette-button">Check it Out</button> -->
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- Testimonial -->

  <section id='testimonial'>
    <div class="container testimonial-container">
      <div class="featurette-title">
        <h1 id="testimonial" class="featurette-main-heading testimonial">Testimonial</h1>
        <i class="fas fa-grip-lines fa-3x testimonial"></i>
        <i class="fas fa-star fa-3x testimonial"></i>
        <i class="fas fa-grip-lines fa-3x testimonial"></i>
      </div>

      <div class="testimonials">
        <img class="avatar" src="assets/images/img_avatar.png" alt="avatar">
        <div class="audio-features">
          <audio class="audio" controls loop>
            <source src="assets/audio/Make Recipe.mp3" type="audio/mp3">

            Your browser does not support the audio tag.
          </audio>
        </div>
        <p class="featurette-text testimonial-text testimonial">"Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>

        <h3 class="featurette-text testimonial-author testimonial">- Lorem Ipsum</h3>
      </div>
    </div>
  </section>

  <!--Video-->
  <section id="promo-section">
    <div class="container promo pt-5">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/V5w1OGknhlc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>

  <!-- About -->

  <section id='about'>

    <div class="container about-container">

      <div class='featurette-title pb-5'>
        <h1 class="featurette-main-heading about">About Us</h1>
        <i class="fas fa-grip-lines fa-3x about"></i>
        <i class="fas fa-star fa-3x about"></i>
        <i class="fas fa-grip-lines fa-3x about"></i>
      </div>

      <div class="row">

        <div class="col-lg-4 col-md-4 team-image">
          <a href="https://www.linkedin.com/">
            <div class="avatar-image">
              <img class='team-avatar' src="assets/images/Yash.png">
              <div class="middle fa fa-linkedin fa-2x"></div>
            </div>
          </a>
          <h1 class='about-title'>Yash Thakkar</h1>
          <h4 class='about-text featurette-text'>TE5-D-74</h4>
        </div>

        <div class="col-lg-4 col-md-4 team-image">
          <a href="https://www.linkedin.com/">
            <div class="avatar-image">
              <img class='team-avatar' src="assets/images/tirth.png" alt="tirth_icon">
              <div class="middle fa fa-linkedin fa-2x"></div>
            </div>
          </a>
          <h1 class='about-title'>Tirth Thoria</h1>
          <h4 class='about-text featurette-text'>TE5-D-75</h4>
        </div>

        <div class="col-lg-4 col-md-4 team-image">
          <a href="https://www.linkedin.com/">
            <div class="avatar-image">
              <img class='team-avatar' src="assets/images/varun.png" alt="varun_icon">
              <!-- onmouseover='getContent("aj.html")' onmouseout='clearContent()'>
                  <script>
                    function getContent(url)
                    {
                        var xmlhttp;

                        if (window.XMLHttpRequest)
                          {// code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp=new XMLHttpRequest();
                          }

                        else
                        {// code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xmlhttp.onreadystatechange=function()
                        {
                          if (xmlhttp.readyState==4 && xmlhttp.status==200)
                          {
                            document.getElementById("aj").innerHTML=xmlhttp.responseText;
                          }
                        }

                        xmlhttp.open('GET',url,true);
                        xmlhttp.send();
                        }

                        function clearContent()
                        {
                              document.getElementById('aj').innerHTML=' ';
                        }
                  </script> -->
              <div class="middle fa fa-linkedin fa-2x"></div>
            </div>
          </a>
          <h1 class='about-title'>Varun Yadav</h1>
          <h4 class='about-text featurette-text'>TE5-D-83</h4>
          <div id="aj">
          </div>
        </div>

      </div>

    </div>

  </section>


  <!-- Footer -->

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <footer class="footer-distributed">

    <div class="footer-left">

      <h3>FoodZilla</h3>

      <p class="footer-links">
        <br>
        <br>
        <a href="#">Home</a>
        <a href="./register.php">Register</a>
        <a href="faq.xml">FAQ</a>
      </p>
    </div>

    <div class="footer-center">

      <div id="first">
        <i class="fa fa-map-marker"></i>
        <p>Mumbai, India</p>
      </div>

      <div id="second">
        <i class="fa fa-phone"></i>
        <p>+91 12345 67890</p>
      </div>

      <div id="third">
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:tvysakec3@gmail.com">tvysakec3@gmail.com</a></p>
      </div>

    </div>

    <div class="footer-right">

      <p class="footer-company-about">
        <span>About Us</span>
        Foodzilla is a food recipe website where you can find and share recipes and also see what your friends are cooking !
      </p>


      <div class="footer-icons">

        <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
        <a href="https://twitter.com/login?lang=en-gb"><i class="fa fa-twitter"></i></a>
        <a href="https://github.com/AceAltair13/Foodzilla-A-Recipe-IO.git"><i class="fa fa-github"></i></a>

      </div>

    </div>

  </footer>


</body>

</html>