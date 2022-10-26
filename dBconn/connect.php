<?php
date_default_timezone_set('Asia/Manila');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visitorlogbooksystem";

// Create connection
    $iconn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
    if (!$iconn) {
        die("Mysqli Connection failed: " . mysqli_connect_error());
    }
