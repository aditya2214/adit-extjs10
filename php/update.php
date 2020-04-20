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
    $nama = $records->{"nama"};
    $birthplace = $records->{"birthplace"};
    $birthday = $records->{"birthday"};
    $created_at =$records->{"created_at"};
    $updated_at=$records->{"updated_at"};
    $success = 'false';
    $error = 'no error';

    $output = array();
   
    if ($conn->query($query)===TRUE){
        $success = 'true';
    }
    else {
        $error = $conn->error;
    }

    if($callback){
        // header('Content-Type: text/javascript');
        header('Content-Type:application/x-json');
        // echo $callback.'({"success":'.$success.',"message":"'.$error.'"});';
        echo json_encode([
            'success' => true,
            'message' => "data updated"
        ]);
    }else {
        header('Content-Type:application/x-json');
        echo json_encode($output);
    }
    $conn->close();

?>