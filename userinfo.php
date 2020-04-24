<?php
// Connect to SQL
$conn = new mysqli("localhost","websivm5_qzroot","xe&9Q1LB%Pvr","websivm5_quizportions");

// Receive request
$email = $conn -> real_escape_string($_GET['email']);
$login_code = $conn -> real_escape_string($_GET['login_code']);

//Check to see whether email exists
$email_sql = "SELECT email FROM Quizzers WHERE email = '$email';";
$email_db = $conn->query($email_sql);
$email_row=mysqli_fetch_row($email_db);
$email_result = $email_row[0];
if ($email_result == $email) {
    $exists = 1;
} else {
    $exists = 0;
}

//Get login code
$login_code_sql = "SELECT login_code FROM Quizzers WHERE email = '$email';";
$login_code_db = $conn->query($login_code_sql);
$login_code_row=mysqli_fetch_row($login_code_db);
$login_code_result = $login_code_row[0];

//Check login code
if ($login_code_result == $login_code) {
    $match = 'They match!';
    $ismatch = 1;
    
    //Get quizzerId
    $quizzerId_sql = "SELECT quizzerId FROM Quizzers WHERE email = '$email';";
    $quizzerId_db = $conn->query($quizzerId_sql);
    $quizzerId_row=mysqli_fetch_row($quizzerId_db);
    $quizzerId = $quizzerId_row[0];
    
    //Get first name
    $firstName_sql = "SELECT firstName FROM Quizzers WHERE email = '$email';";
    $firstName_db = $conn->query($firstName_sql);
    $firstName_row=mysqli_fetch_row($firstName_db);
    $firstName = $firstName_row[0];

    //Get last name
    $lastName_sql = "SELECT lastName FROM Quizzers WHERE email = '$email';";
    $lastName_db = $conn->query($lastName_sql);
    $lastName_row=mysqli_fetch_row($lastName_db);
    $lastName = $lastName_row[0];
    
    //Get district
    $district_sql = "SELECT district FROM Quizzers WHERE email = '$email';";
    $district_db = $conn->query($district_sql);
    $district_row=mysqli_fetch_row($district_db);
    $district = $district_row[0];
    
    //Get public
    $public_sql = "SELECT public FROM Quizzers WHERE email = '$email';";
    $public_db = $conn->query($public_sql);
    $public_row=mysqli_fetch_row($public_db);
    $public = $public_row[0];
    
} else {
    $ismatch = 0;
}

?>
<!DOCTYPE HTML>
<html>

<body>

    <script>
        var object = {
            exists: "<?php echo json_encode($exists); ?>",
            isMatch: "<?php echo json_encode($ismatch); ?>",
            quizzerID: "<?php echo json_encode($quizzerId); ?>",
            firstName: "<?php echo json_encode($firstName); ?>",
            lastName: "<?php echo json_encode($lastName); ?>",
            district: "<?php echo json_encode($district); ?>",
            privaryMode: "<?php echo json_encode($public); ?>"
        };
        window.parent.postMessage(object, "http://cadehunter.github.com");
        window.parent.postMessage(object, "https://cadehunter.github.com");

    </script>

</body>

</html>
<?php
    //Close SQL connection
    mysqli_close($conn);
?>
