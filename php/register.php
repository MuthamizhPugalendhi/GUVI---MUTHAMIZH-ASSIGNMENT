<html>
<body>
<?php

    extract($_POST)
?>
<h1> Welcome <?php echo $_POST["username"];?> </h1><br/>

<?php
   $servername = "localhost";
   $uname = "root";
   $pass= "";
   $dbname = "test";
$conn = new mysqli($servername, $uname, $pass, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO guvi (username,email,password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

$stmt->execute();

  echo "<h1 style=\"text-align:center\";> Signup is Successful </h1>";
  echo "<h2 style=\"text-align:center\"> <a href=\"http://localhost/GUVI/login.html\">click here</a> to Sign in </h2>";
$stmt->close();
$conn->close();
   
?>
</body>
</html>