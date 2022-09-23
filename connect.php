<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "iai";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$conn->set_charset("utf8");
