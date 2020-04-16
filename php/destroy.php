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
    $records = json_decode($_REQUEST['records']);
    $id = $records->{"id"};
    $success = 'false';
    $error = 'no error';

    $output = array();
    $query="delete from employess where id=$id";
    if ($conn->query($query)===TRUE){
        $success='true';
    }else {
        $error = $conn->error;
    }

    if($callback){
        header('Content-Type: text/javascript');
        echo $callback.'({"success":'.$success.',"message":"'.$error.'"});';
    }else {
        header('Content-Type:application/x-json');
        echo json_encode($output);
    }
    $conn->close();

?>