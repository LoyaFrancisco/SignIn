
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
                <button name="submit" type="submit" id="newevent-submit" data-submit="...Sending">Submit</button>
              </fieldset>
            </form>

            <div class="event-create-success"> <?=$_EVENT_MESSAGE?> </div>

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
            </div>

          </div>
          </div>

        </div>
      </div>
    </section>

    <?php
    include "templates/main-bottom.html";
     ?>
