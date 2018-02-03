
<?php

session_start();
$_REGISTER_MESSAGE = "";

// Database
$mysqli = new mysqli('localhost', 'memo', 'memo', 'USER');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $mysqli->real_escape_string($_POST['username']);
    $answer = $mysqli->real_escape_string($_POST['answer']);
    $event_code = ($_POST['event_code']);

    $_SESSION['username'] = $username;

    $sql = "INSERT INTO users (username, event_code, answer) "
    . "VALUES ('$username', '$event_code', '$answer')";

    // if the query is succesful, redirect to main.php page, done!
    if ($mysqli->query($sql) === true) {
      $_REGISTER_MESSAGE = "Registration Successful! Added $username to the database!";
    }
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Login</title>
  </head>
  <body>

    <h1>User Registration</h1>
    <form action='' method='post'>


      <input type="text" placeholder="User Name" name="username" required /><br />
      <input type="text" placeholder="Answer to event question:" name="answer" required /><br />
      <input type="text" placeholder="Event Code" name="event_code"  required /><br />
      <input type="submit" value="Register me to the awesomeness!" name="Register" class="register btn"/>


    </form>


  </body>
</html>
