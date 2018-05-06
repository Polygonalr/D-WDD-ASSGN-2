<?php

$username = "root";
$password = "";
$dbhost = "localhost";
$dbname = "music_gallery";
$conn = mysqli_connect($dbhost, $username, $password, $dbname);
//table name is contacts
if(!$conn){
    die("cannot connect to database: ".mysqil_error($conn));
}

?>