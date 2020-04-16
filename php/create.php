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
    
    $nama = $records->{"nama"};
    $birthplace = $records->{"birthplace"};
    $birthday = $records->{"birthday"};

    $output=array();
    $success='false';
    $query="insert into employess (nama,birthplace,birthday) values ('$nama','$birthplace','$birthday')";
    if ($conn->query($query)===TRUE){
        $success = 'true';
    }
    else {
        $success='false';
        $error = $conn->error;
    }

    if($callback){
        header('Content-Type: text/javascript');
        echo $callback.'({"success":'.$success.',"items":'.json_encode($output).'});';
        // header('Content-Type:application/x-json');
        // echo json_encode([
        //     'success' => true,
        //     'message' => 'data created'
        // ]);
    }else {
        
        header('Content-Type:application/x-json');
        echo json_encode($output);
    }
    $conn->close();

?>