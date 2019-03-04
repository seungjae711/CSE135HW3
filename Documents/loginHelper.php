<?php
$uname=$_POST['username'];//username
$password=$_POST['password'];//password 

session_start();

$con=mysqli_connect("localhost","root","tmdwo3264","users");
$result=mysqli_query($con,"SELECT * FROM `login_info` WHERE `username`='$uname' && `password`='$password'");
$count=mysqli_num_rows($result);

if($count==1)
{
    $_SESSION['log']=$uname;
    $_SESSION['browser'] = $uname;
    header("refresh:1.5; url=http://localhost/welcome.php");
    echo "Login success!!";
}
else
{
    header("refresh:1.5; url=login.php");
    echo "Sorry your information is not correct. Try it again!";
}
?>
