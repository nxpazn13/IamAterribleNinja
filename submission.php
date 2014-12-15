<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>submission</title>
</head>

<body>

<?php
echo $_POST ["name"];
echo htmlspecialchars($_POST["name"]);

$servername = "localhost";
$username = "iamaterr_admin";
$password = "ninjaproblems99";
$dbname = "iamaterr_masterEmail";
$name = $_POST["name"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Email
VALUES ('$name')";

// connection results
if (mysqli_query($conn, $sql)) {
    echo " New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>


?>

</body>
</html>