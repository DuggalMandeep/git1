<?php
session_start();
?>

<?php
echo "redirecting to data page............";
$a=0;
$connect = mysqli_connect("localhost","root","","erp") or Die("Not Connected");
$command = "SELECT id FROM Student_Record";
$query = mysqli_query($connect,$command) or die(mysqli_error($query));

//echo mysqli_num_rows($query);
if(mysqli_num_rows($query) > 0){
  while($row = mysqli_fetch_assoc($query)) {
    //if((strcmp($usr,$row["id"]))==0 and (strcmp($pas,$row["Password"])==0)) {
     $usr = $row["id"];
     $usr1=$_POST["$usr"];
      if($usr1=="Reject"){
        $command = "INSERT INTO rejected_student select * from Student_Record where id=$usr";
        $query = mysqli_query($connect,$command) or die(mysqli_error($query));
        $command = "DELETE FROM Student_Record WHERE Student_Record.id = $usr";
        $query = mysqli_query($connect,$command) or die(mysqli_error($query));
      }
    }
  }
  header('Location:index.html');
  ?>
