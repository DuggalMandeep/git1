<?php
if(getimagesize($_FILES['photo']['tmp_name'])==FALSE OR getimagesize($_FILES['sign']['tmp_name'])==FALSE){
  echo "Failed";
}
else {
  $pname= addslashes($_FILES['photo']['tmp_name']);
  $pimage=base64_encode(file_get_contents(addslashes($_FILES['photo']['tmp_name'])));
  $simage=base64_encode(file_get_contents(addslashes($_FILES['sign']['tmp_name'])));

  saveimage($simage,$pimage);
}
function saveimage($simage,$pimage){
      $connect = mysqli_connect("localhost","root","","erp");
      $command = "insert into photo_data (image,sign) VALUES ('$pimage','$simage')";

      $query = mysqli_query($connect,$command);
      if($query){
          //echo "Success";
          Display();
        }
      else{
          echo "Not uploaded";
        }
}

function Display(){
  $connect = mysqli_connect("localhost","root","","erp");
  $command = "SELECT * FROM photo_data WHERE id=(SELECT max(id) FROM photo_data)";
  $query = mysqli_query($connect,$command);
  $rownum = mysqli_num_rows($query);
  for($a=0;$a<$rownum;$a++){
    $result = mysqli_fetch_array($query);

      $ppicture = $result['image'];
      $spicture = $result['sign'];
      ?>

      <html>
      <head>
      <title>Login</title>
      </head>
      <body>
        <center>
            <fieldset>

              <tr><h2><b><u>Data Recorded successfully<u><b></h2></tr>
              <tr><h3>Confirm Your Submissions</h3></tr>
              <table cellspacing="10">
              <tr>
                <td>uploaded Photo  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
                <td><?php echo '<img height="100px" width="100px" src="data:image;base64,'.$ppicture.'">'; ?></td>
              </tr>
              <tr>
                <td>uploaded signature :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                <td><?php echo '<img height="100px" width="100px" src="data:image;base64,'.$spicture.'">';  ?></td>
              </tr>
              </table>
              <form action="regisForm.html">
              <button name="submit" type="submit"> Final Submit </button>
            </form>
            </fieldset>
        </center>
      </body>
      </html>
      <?php
    }
  }
/*function showdetails(){
  echo "Hi";
  $connect = mysqli_connect("localhost","root","","erp");
  $vari = RandomString(8);
  $command = "INSERT INTO login (level, Password) VALUES ('Student','$vari')";
  $query = mysqli_query($connect,$command) or die(mysqli_error($con));
  $command = "SELECT * FROM login WHERE id=(SELECT max(id) FROM login)";
  $query = mysqli_query($connect,$command) or die(mysqli_error($con));

  $rownum = mysqli_num_rows($query);
  for($a=0;$a<$rownum;$a++){
    $result = mysqli_fetch_array($query);

      $id = $result['id'];
      $pas = $result['Password'];
    }
    ?>
    <html><script>
    alert("Your Username is <?php echo $id ?> and password is <?php echo $pas ?> .")
    </script>
  </html>
    <?php

}

function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'),range('A','Z'));
    $key = "";
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}*/
?>
