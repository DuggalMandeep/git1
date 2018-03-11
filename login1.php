<?php
session_start();
?>
<?php
$jstar =$_POST["jstar"];
//echo $jstar;

$book = json_decode($jstar);
$sname = $book->sname;
$clas = $book->clas;
$pc = $book->pc;
$fname = $book->fname;
$mname = $book->mname;
$fc = $book->fc;
$dob = $book->dob;
$gen = $book->gen;
$mail = $book->mail;
$add = $book->add;
$state = $book->state;
$city = $book->city;
$pin = $book->pin;

$connect = mysqli_connect("localhost", "root", "", "erp");
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$query="INSERT INTO Student_Record(sname,class,fname,mname,fc,pc,dob,gen,email,addr,city,state,pin)VALUES('$sname','$clas','$fname','$mname','$fc','$pc','$dob','$gen','$mail','$add','$city','$state','$pin')";
$result = mysqli_query($connect, $query);
if($result){
    //echo "Records inserted successfully.";
    //header('Location: login1.html');
    echo '<html>
    <head>
    <title>Login</title>
    </head>
    <body>
      <center>
        <form name="upload" action=upload.php method="POST" enctype="multipart/form-data">
          <fieldset>
            <tr><h2>Record Submitted successfully</h2></tr>
            <tr><h3>Upload following files</h3></tr>
            <table cellspacing="10">
            <tr>
              <td>Upload Photo  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
              <td><input type="file" name="photo" accept="image/gif, image/jpeg, image/png"></td>
            </tr>
            <tr>
              <td>Upload signature :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
              <td><input type="file" name="sign" accept="image/gif, image/jpeg, image/png"></td>
            </tr>
            </table>
            <input type="submit" name="submit"s width="100" height="48" value="Upload">
          </fieldset>
        </form>
      </center>
    </body>
    </html>'; 

} else
  {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
  }
?>
