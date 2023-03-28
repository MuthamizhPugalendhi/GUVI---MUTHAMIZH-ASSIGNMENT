<html>
<body>
<script>
    let uname_localstorage=localStorage.getItem("username");



</script>
<?php

    echo "<h1> Dear <script> document.writeln(uname_localstorage); </script> (Accessed for localStorage) </h1>";
    

    extract($_POST);
//    echo $age."--".$dob."--".$contact."--".$uname."--".$pword;

?>

<?php
   $servername = "localhost";
   $uname1 = "root";
   $pass= "";
   $dbname = "test";

   // Create connection
$conn = new mysqli($servername, $uname1, $pass, $dbname);
// Check connection
if ($conn->connect_error) {  die("Connection failed: " . $conn->connect_error);
}

$stmt =$conn->prepare("UPDATE guvi SET age=? , dob=? , contactno=?  WHERE username=?");
$stmt->bind_param("ssss", $age, $dob, $contact, $uname);

// echo "Reached" .$uname;

		if($stmt->execute()) {

  echo "<h1 style=\"color:black\";> Profile is successfully updated </h1>";
  
  echo "<h2> Click <a href=\"http://localhost/GUVI/login.html\">here</a> to Sign in and view updated profile </h2>";
    }
  $stmt->close();
$conn->close();
   ?>
<script>
     localStorage.setItem("age",'<?php echo $age; ?>');
     localStorage.setItem("dob",'<?php echo $dob?>');
     localStorage.setItem("contact",'<?php echo $contact?>');
</script>

<h1> Adding session data  to localStorage is successfully completed </h1>
<h1>
      <a href="readstorage.php">click here to view session data </a>
</h1>
<h1> Inserting into mongodb  </h1>

<?php

    require_once '../vendor/autoload.php';
    $con=new MongoDB\Client("mongodb://localhost:27017");
   $db=$con->guvi;
   $tb1=$db->test;
   $tb1->insertOne(["username" => $uname,"passw"=>$pword,"age"=>$age,
   "dob"=>$dob,"contact"=>$contact]);
   echo "<h1> Successfully Document is inserted userprofile documents in guvi db of MONGODB </h1> "
  


?>
      

</body>
</html>