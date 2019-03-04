<?php
session_start();
if(isset($_SESSION['log']))
{
?>

<?php
	session_start();
     if(!isset($_SESSION['log'])){
        echo "hello!";
     }else {
	echo "Hello! " . $_SESSION['log'] . " you are logged in";
     }
?>


<!DOCTYPE html>
<html>
<head>
<title>welcome!</title>
<style>
            .dd {
                width: 5%;
                padding: 12px 20px;
                border: 8px solid #4CAF50;
                border-radius: 4px;
            }
            
            a {
                text-align: center;
                color:green;
                font-size: 37px;
                padding: 5px;
                margin: 5px;
            }
    </style>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Welcome!!  </h1>

<a href="./connection.php">Basic Client Characteristics</a><br><hr>
<a href="./SpeedC.php">Speed </a><br><hr>
<a href="./ClientErrors.php">Errors</a><br><hr>
<a href="./ClientEvents.php">Events</a><br><hr>


<br>
<br>
<br>
<br>
<br>
<br>
<a href="index.php">Get some more data by going home</a>
<br>

<br>
<a href="login.php" >logout</a>

</body>
</html>
<?php
}
else
{
	echo "please fill proper details";
	header("refresh:2;url=index.php");
}

?>