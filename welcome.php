<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Gehu Login Query Portal</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="login.php">GEHU Query Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="myFunction()" id="logout_btn" href="logout.php">Logout</a>
      </li>
  
     
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?>! <i>Ask your queries in Chatbot below.</i></h3>
<hr>

<div class="card " style="width: 30rem;">
  <img class="card-img-top" src="data:image/jpeg;base64,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" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Student Query Chatbot</h5>
    <p class="card-text">Get all information about University! <br> You can submit Invalid questions and we will improve it.</p>
    <a href="bot.php" class="btn btn-primary">Go to Chatbot</a>
  </div>
</div>

</div>
<br>
<br>
<br>
<section class="col-md-6 " style="padding-left:10px;">
  

  
<div class="row-ms-3">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
      
        <img src="projectpage.png" class="d-block w-80 row-ms-1" alt="..."style="height: 450px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        align: center;">
        <div class="slider_text ">
            <h3> <span>Graphic Era Hill University Student Information Portal</span> <br>
           About My Project</h3>
            <p align = "justify">Cloud based student information Chatbot system is an artificial algorithm that analyzes the student’s queries and messages. This system has a built artificial intelligence to answer the query of the student. The answers are appropriate to the user’s queries, if the user find his answer to be invalid, he may select the invalid answer option button which will notify the admin.
Admin can view invalid through portal via login. System allows admin to delete the invalid answer or to add a specific answer of that equivalent question. To answer to the student query, the Chatbot system retrieves the answer from the database which is stored in the cloud.
The Chatbot system uses a specific keyword to retrieve the answers from the database. There is no format for the student to follow while asking any question in the Chatbot. The students can put up any query related to college activities through the system. This system replies to the user with Graphical user interface which implies that as if a real person is talking to the student.
 The system helps the student not only to get their queries answered but also to be updated with the college activities. Chatbot can be hosted in in any cloud platform.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://storage.googleapis.com/ezap-prod/colleges/3005/graphic-era-hill-university-bhimtal-campus-bhimtal-campus.jpg" class="d-block w-100" alt="..."style="height: 450px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;">
        <div class="slider_text ">
            <h3> <span>Graphic Era Hill University Campus</span> <br>
            Dehradun</h3>
           
      
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</section>
<!----------------ON click logout button-------------------->

<script>
function myFunction() {
  alert("You are now logged out!!");
}
</script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
