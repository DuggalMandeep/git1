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
    header('Location: login1.html');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
?>
