
<?php

/*
The following module creates an events website
and also stores the data about the event in
the database.
*/

session_start();
$_EVENT_MESSAGE = "";
$_EVENT_URL = "";
$_EVENTS_LIST = array();

// Database
$mysqli = new mysqli('localhost', 'memo', 'memo', 'USER');
$get_events             =  "SELECT * FROM event";
$get_events_result = mysqli_query($mysqli, $get_events);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title                      = $mysqli->real_escape_string($_POST['title']);
    $description         = $mysqli->real_escape_string($_POST['description']);
    $date                     = $mysqli->real_escape_string($_POST['date']);
    $location               = $mysqli->real_escape_string($_POST['location']);
    $secret_code        = $mysqli->real_escape_string($_POST['secret_code']);
    $event_question  = $mysqli->real_escape_string($_POST['event_question']);
    $event_answers   = "";
    $url                         = "";

    $insql = "INSERT INTO event (event_title, event_description, event_date, location,
            secret_code, event_question, url) "
            ."VALUES ('$title', '$description', '$date', '$location',
             '$secret_code', '$event_question','$url')";

    // if the query is succesful, redirect to main.php page, done!
    if ($mysqli->query($insql) === true) {
        $get_sql            = "SELECT * FROM event WHERE event_title = '$title' ";
        $event_result   = $mysqli->query($get_sql);
        $id_row             = $event_result->fetch_assoc();

        $_EVENT_URL           = "websiteurl.com/eventid=".$id_row["id"];
        $_EVENT_MESSAGE = "<h2 class='event-success'> Your event was successfully created. Link: $_EVENT_URL</h2>";
    }
}
?>

<?php
    include "templates/main-top.html";
 ?>

<<<<<<< HEAD




<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simplified Event Planner</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Event | Data |  Progress</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#instructions">Instructions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Planning an Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead index">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To the Ulitmate Event Planner!</div>
          <div class="intro-heading text-uppercase">The best way to organize your events</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#instructions">Tell Me More</a>
        </div>
      </div>
    </header>

    <!-- Instructions -->
    <section id="instructions">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Instructions</h2>
            <h3 class="section-subheading text-muted">-------------------------------------------</h3>
          </div>
        </div>
        <div class="row text-center">

          <div class="col-md-4">

            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-tasks fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Planning an event</h4>
            <p class="text-muted">Use the integrated Jotform to create an event. After filling out the form, a Google spreadsheet of your event will be updated</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Google calendar</h4>
            <p class="text-muted">A Google API integrated calendar will be synced to your calendar to organize your event</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Ex3</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-light" id="portfolio">
      <div class="container">
=======
>>>>>>> 269256b6e36c9425e3193ae45d5e4dee2ee4f535
    <!-- Planning Event -->
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Planning an event</h2>
            <h3 class="section-subheading text-muted">The event creator will use the Event management registration form below to create an event that all of the organization's members will be going to.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
          <div class="formcontainer">
            <form id="new_event" action="" method="post">
              <h3>Create a new event</h3>
              <h4>Please input the details below to create a new event</h4>
              <fieldset>
                <input placeholder="Your Event Title" name="title" type="text" required autofocus>
              </fieldset>
              <fieldset>
                <input name="location" placeholder="Event Location" type = "text" required>
              </fieldset>
              <fieldset>
                <textarea name = "description" placeholder="Input your event description..." required></textarea>
              </fieldset>
              <fieldset>
                <p>Date</p>
                <input name = "date" type="date" required>
              </fieldset>
              <fieldset>
                <p>Time</p>
                <input name = "time" type="time"required>
                <input placeholder="Event Location" name = "location" type = "text"  required>
              </fieldset>
              <fieldset>
                <textarea name = "description" placeholder="Input your event description..." tabindex="1" required></textarea>
              </fieldset>
              <fieldset>
<<<<<<< HEAD
                <p>Date</p>
                <input name = "date" type="date" tabindex="1" required> 
              </fieldset>
              <fieldset>
                <p>Time</p>
                <input name = "time" type="time" tabindex="1" required>
              </fieldset>

              <fieldset>
                <input name = "secret_code" placeholder = "Secret code only event-goers will know" type="text" required>
              </fieldset>

              <fieldset>
                <textarea name = "event_question" placeholder="Input a question to ask the event goers..." required></textarea>
              </fieldset>

              <fieldset>
=======
>>>>>>> 269256b6e36c9425e3193ae45d5e4dee2ee4f535
                <button name="submit" type="submit" id="newevent-submit" data-submit="...Sending">Submit</button>
              </fieldset>
            </form>

            <div class="event-create-success"> <?=$_EVENT_MESSAGE?> </div>

<<<<<<< HEAD


          </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Team -->
    <section id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/Guillermo.jpg" alt="">
              <h4>Guillermo Sanchez</h4>
              <p class="text-muted">Back-end developer | Database integration</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/Francisco.jpg" alt="">
              <h4>Francisco Loya</h4>
              <p class="text-muted">Front-end developer | UI/UX Designer</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/Miguel.jpg" alt="">
              <h4>Miguel Barba</h4>
              <p class="text-muted">Back-end Developer | "Ooo Chips Bruh!"</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
=======
            <div class="row text-center">
                <div class="col-md-4">
                  <h4 class="service-heading">Recent Events Created</h4>
                  <?php
                      if (mysqli_num_rows($get_events_result) > 0) {
                          while ($row = mysqli_fetch_array($get_events_result)) {
                              echo "<a href='#'>{$row['event_title']}</a></br>\n";
                          }
                      }
                      else {
                          echo "<h2> No reent events </h2>";
                      }
                   ?>
                </div>
>>>>>>> 269256b6e36c9425e3193ae45d5e4dee2ee4f535
            </div>

          </div>
          </div>

        </div>
      </div>
    </section>

    <?php
    include "templates/main-bottom.html";
     ?>
