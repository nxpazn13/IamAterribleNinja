<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html/javascript; charset=utf-8" />
<title>Terrible Ninja</title>
<style>
header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
	font-family:Tahoma, Geneva, sans-serif;	 
}
h1 {
	color: white;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
p  {color:white}
body {background-color:black}

</style>
</head>

<body>
<header>
<br>
<h1><strong>I am a Terrible Ninja</strong></h1>
</header>


<canvas id="myCanvas" width="778" height="100"></canvas>
    <script>
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
 // round line cap (middle line)
      context.beginPath();
      context.moveTo(400, canvas.height / 2);
      context.lineTo(canvas.width - 200, canvas.height / 2);
      context.lineWidth = 20;
      context.strokeStyle = '#FFFFFF';
      context.lineCap = 'round';
      context.stroke();
</script>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
?>


</body>
</html>
