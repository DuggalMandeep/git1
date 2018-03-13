<?php
session_start();
?>

<?php
$sname=$_POST["sname"];
$pc=$_POST["pc"];
$fname=$_POST["fname"];
$fc=$_POST["fc"];
$mname=$_POST["mname"];
$dob=$_POST["dob"];
$gen=$_POST["gen"];
$mail=$_POST["mail"];
$add=$_POST["add"];
$city=$_POST["city"];
$state=$_POST["state"];
$pin=$_POST["pin"];
$clas=$_POST["clas"];

$arr = array('sname' => $sname,'clas' => $clas, 'pc' => $pc, 'fname' => $fname, 'fc' => $fc, 'mname' => $mname,'dob' => $dob, 'gen' => $gen, 'mail' => $mail, 'add' => $add, 'city' => $city, 'state' => $state, 'pin' => $pin);

$jstar = json_encode($arr);



//echo $jsoformat;


/*a=0;
$_SESSION["log"] = 3;
$con=mysqli_connect("localhost","root","","login") or die("couldnot connect");
$querry= "SELECT * FROM data";
$result=mysqli_query($con,$querry) or die(mysqli_error($con));
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      //  echo $row["name"]. " ". $row["pass"]. "<br>";
	if((strcmp($name,$row["name"]))==0 and (strcmp($pass,$row["pass"])==0)) {
	$a=1;$_SESSION["log"] = 1;
	//echo "yes";
}
    }
} else {
    echo "0 results";
}
mysqli_close($con);


if($a==1) {
header('Location: login1.php');

}else{
header('Location: login.html');
}*/
?>
<html>
<head>
<title>Login</title>
</head>
<body>
  <center>
      <fieldset>
        <legend align="center">Confirm form</legend>
        <table>
        <tr>
          <td>Student Name</td>
          <td><?php echo $sname?></td>
        </tr>
        <tr>
          <td>Class</td>
          <td><?php echo $clas?></td>
        </tr>
        <tr>
          <td>Father's Name</td>
          <td><?php echo $fname?></td>
        </tr>
        <tr>
          <td>Father's Contact No.</td>
          <td><?php echo $fc?></td>
        </tr>
        <tr>
          <td>Mother's Name</td>
          <td><?php echo $mname?></td>
        </tr>
        <tr>
          <td>Contact No.</td>
          <td><?php echo $pc?></td>
        </tr>
        <tr>
          <td>DOB</td>
          <td><?php echo $dob?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $gen?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $mail?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $add?></td>
        </tr>
        <tr>
          <td>City</td>
          <td><?php echo $city?></td>
        </tr>
        <tr>
          <td>State</td>
          <td><?php echo $state?></td>
        </tr>
        <tr >
          <td>Pin</td>
          <td><?php echo $pin?></td>
        </tr>

        </table>
        <button onclick="goBack()" >Back</button>
        <form name="login1" action="login1.php" method="POST">
          <!---?php echo $jstar; ?--->
          <input type="hidden" name="jstar" id="jstar" width="100" height="48" value= '<?php echo $jstar ;?>'>
          <input type="submit">
        </form>
      </fieldset>



  </center>
  <script>
  function goBack() {
      window.history.back();
  }
  </script>
</body>

</html>
