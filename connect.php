<?php
$servername = "localhost";
$username = "root";
$password = "chontech2020!";
$database = "iai2";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$conn->set_charset("utf8");