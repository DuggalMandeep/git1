<?php
session_start();
?>

<?php
$usr=$_POST["id"];
$pas=$_POST["pas"];
$a=0;
$connect = mysqli_connect("localhost","root","","erp") or Die("Not Connected");
$command = "SELECT * FROM login WHERE id='$usr'";
$query = mysqli_query($connect,$command) or die(mysqli_error($query));
if(mysqli_num_rows($query) > 0){
  while($row = mysqli_fetch_assoc($query)) {
    if((strcmp($usr,$row["id"]))==0 and (strcmp($pas,$row["Password"])==0)) {
      $a=1;
      $_SESSION["log"] = 1;
    }
  }
  if($a==0){
    header('Location:Auth.html');
  }
}?>
<html><head><title>DATA</title>
</head><body>
<?php
$command = "SELECT * FROM Student_Record";
$query = mysqli_query($connect,$command) or die(mysqli_error($query));


$output = '
    <center><h1>Student Record</h1></center><hr/><br><br>
        <center><table border="1px"cellpadding="2px" >
          <thead>
            <tr>
               <th width="16%">Photo</th>
               <th width="5%" >ID</th>
               <th width="15%">Student Name</th>
               <th width="15%">Fatherś Name</th>
               <th width="10%">gender</th>
               <th width="5%" >Class</th>
               <th width="9%">DOB</th>
               <th width="15%">Email</th>
               <th width="12%">Contact No.</th>
            </tr>
         </thead>
      <tbody>
';
if(mysqli_num_rows($query) > 0)
{
     while($row = mysqli_fetch_assoc($query))
     {
       $idd = $row["id"];
      // $connect = mysqli_connect("localhost","root","","erp") or Die("Not Connected");
       $command = "SELECT * FROM photo_data WHERE id = '$idd'";
       $query1 = mysqli_query($connect,$command)or die(mysqli_error($query));
        $result = mysqli_fetch_assoc($query1);
           $ppicture = $result['image'];
          $output .= '<tr >
                          <td><center >'.'<img height="100px" width="100px" src="data:image;base64,'.$ppicture.'</center></td>
                          <td><center >'. $row["id"] .'</center></td>
                          <td><center >'. $row["sname"] .'</center></td>
                          <td><center >'. $row["fname"] .'</center></td>
                          <td><center >'. $row["gen"] .'</center></td>
                          <td><center >'. $row["class"] .'</center></td>
                          <td><center >'. $row["dob"] .'</center></td>
                          <td><center >'. $row["email"] .'</center></td>
                          <td><center >'. $row["pc"] .'</center></td>
                      </tr>';
     }
}
else
{
     $output .= '<tr>
                  <td colspan="9">No Data Found</td>
                 </tr>';
}
$output .= '</tbody></table></center></body></html>';
echo $output;

 ?>
