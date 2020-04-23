<?php

// Connect to SQL
$conn = new mysqli("localhost","websivm5_qzroot","xe&9Q1LB%Pvr","websivm5_quizportions");

//Get data into PHP
$firstName = $conn -> real_escape_string($_GET['firstName']);
$lastName = $conn -> real_escape_string($_GET['lastName']);
$email = $conn -> real_escape_string($_GET['email']);
$district = $conn -> real_escape_string($_GET['district']);
$public = $conn -> real_escape_string($_GET['public']);

$sql = "INSERT INTO Quizzers (quizzerId, firstName, lastName, email, district, public)
VALUES (NULL, '$firstName', '$lastName', '$email', '$district', $public)";

if (mysqli_query($conn, $sql)) {
 echo "New record created successfully <br>";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Output to print for testing
echo $firstName . " ";
echo $lastName . " ";
echo $email . " ";
echo $district . " ";
echo $public . " ";


?>