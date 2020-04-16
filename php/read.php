<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="adit_extjs";
    
    $conn = new mysqli($servername, $username,$password,$dbname);

    if ($conn->connect_error){
        die("connection failed:" . $conn->connect_error);
    }

    $callback = $_REQUEST['callback'];

    $output = array();
    $success = 'false';
    $query="select * from employess" or die("Cannot access item");
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        while($obj = mysqli_fetch_object($result)){
            $output[] = $obj;
        }
        $success = 'true';
    }

    if($callback){
        header('Content-Type: text/javascript');
        echo $callback . '({"success":'.$success.',"items":' . json_encode($output) . '});';
    } else {
        header('Content-Type:application/x-json');echo
        json_encode($output);
    }
    $conn->close();
?>