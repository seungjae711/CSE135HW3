<?php 
    $hello = $_POST["hello"];
    if (empty($hello)){
        echo "<h1>Specify response paramter</h1>"; 
    }else {
        header('Content-Type: application/json');
    
        $json = array(
            "msg" => $hello . " it's " . date("M, d, Y h:i:s A")
        );
        echo json_encode($json);
    }
?>

