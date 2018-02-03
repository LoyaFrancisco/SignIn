
<?php

/*
The following module creates an events website
and also stores the data about the event in
the database.
*/

session_start();
$_EVENT_MESSAGE = "";
$_EVENT_URL = "";

// Database
$mysqli = new mysqli('localhost', 'memo', 'memo', 'USER');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title                      = $mysqli->real_escape_string($_POST['title']);
    $description         = $mysqli->real_escape_string($_POST['description']);
    $date                     = $mysqli->real_escape_string($_POST['date']);
    $location               = $mysqli->real_escape_string($_POST['location']);
    $secret_code        = $mysqli->real_escape_string($_POST['secret_code']);
    $event_question  = $mysqli->real_escape_string($_POST['event_question']);
    $event_answers   = "";
    $url                         = "";

    $insql = "INSERT INTO event (event_title, event_description, event_date, location, secret_code, event_question, url) "
    ."VALUES ('$title', '$description', '$date', '$location', '$secret_code', '$event_question','$url')";

    // if the query is succesful, redirect to main.php page, done!
    if ($mysqli->query($insql) === true) {
        $get_sql = "SELECT * FROM event WHERE event_title = '$title' ";
        $event_result = $mysqli->query($get_sql);
        $idrow = $event_result->fetch_assoc();
        $_EVENT_URL = "websiteurl.com/eventid=".$idrow["id"];
        $_EVENT_MESSAGE = "<h1 class='event-success'> Your event was successfully created. Link: $_EVENT_URL</h1>";
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Eventer</title>
    </head>
    <body>
        <h1>Eventor</h1>

        <form action="" method="post">
            <input type="text" placeholder="Event Title" name="title" required /><br />
            <input type="text" placeholder="Description" name="description" required /><br />
            <input type="text" placeholder="Date" name="date" required /><br />
            <input type="text" placeholder="Location" name="location" required /><br />
            <input type="text" placeholder="Secret Code" name="secret_code" required /><br />
            <input type="text" placeholder="Event Question" name="event_question" required /><br />
            <input type="submit" value="Create event!" name="Register" class="register btn"/>
            <div class="" > <? $_REGISTER_MESSAGE ?> </div>
        </form>

    </body>
</html>
