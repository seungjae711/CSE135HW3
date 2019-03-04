<?php
	session_start();
     if(!isset($_SESSION['log'])){
        echo "hello!";
     }else {
	echo "Hello! " . $_SESSION['log'] . " you are logged in";
     }
?>
<?php
$con=mysqli_connect("localhost","root","tmdwo3264","basic");
$sql= "SELECT * FROM basicC ";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic Client Characteristics</title>
    <link rel="stylesheet" href="style.css" />
    <style>     
            a {
                text-align: center;
                color:green;
                font-size: 37px;
                padding: 5px;
                margin: 5px;
            }
    </style>
</head>
<body>
    <table align ="center" border ="1px" style="width:600px; line-height:40px;">
        <tr>
            <th colspan="3"><h2>Client Characteristics</h2></th>
        </tr>
        <t>
            <th>resolution</th>
            <th>platform</th>
            <th>browser</th>
        </t>
    <?php
        while($rows = $result->fetch_assoc())
        {
    ?>  
        <tr>
            <td><?php echo $rows['resolution']?></td>
            <td><?php echo $rows['platform']?></td>
            <td><?php echo $rows['browser']?></td>        
        </tr>
    <?php
        }
    ?>
    </table>
    <br>
    <a href="./welcome.php">See your other data!</a><br>
    <a href="index.html">Get some more data by going home</a>

    
</body>
</html>