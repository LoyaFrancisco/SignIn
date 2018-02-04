


<?php
// echo $_POST['username'];
// echo $_REQUEST['username'];

$users = array();

function create_user($users, $username, $password, $email){
  array_push( $users, list($username, $password, $email) );
}

function print_existing_users($users){
  foreach ($users as $u) {
    echo "User is registered $u. ";
  }
}
create_user($users, $username, $password, $email){
print_existing_users($users);
        // print_existing_users($users);
}
?>
