
<?php

/*
The following module creates an events website
and also stores the data about the event in
the database.
*/

session_start();
$_REGISTER_MESSAGE = "";

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

    $sql = "INSERT INTO event (event_title, event_description, event_date, location, secret_code, event_question, url) "
    ."VALUES ('$title', '$description', '$date', '$location', '$secret_code', '$event_question','$url')";

    // if the query is succesful, redirect to main.php page, done!
    if ($mysqli->query($sql) === true) {
      $_REGISTER_MESSAGE = "Event $title Created!";
      // header("Location:created.php?title='.$title'");
    }
    else {
        echo $mysqli->error;
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
