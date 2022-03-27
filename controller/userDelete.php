<?php
    include_once('config.php');
    $id=$_POST['id'];
    $delete=$conn->query("delete from tbl_user where id=$id");
    if($delete){
        $response['status']=1;
        $response['message'] = 'User was deleted successfully!'; 
    }
    else{
        $response['status']=0;
        $response['message'] = 'User was not deleted!'; 
    }
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($response);
?>