<?php
    session_start();
    include_once('config.php');
    $user_email = $_POST['login_email'];
    $user_pass =base64_encode($_POST['login_pass']);
    $sql="SELECT * FROM tbl_user where email='$user_email' and pass='$user_pass'";
    $result=$conn->query("SELECT * FROM tbl_user where email='$user_email' and pass='$user_pass'");
    $row  = mysqli_fetch_array($result);
    if ($result->num_rows > 0) {
        $_SESSION['id']=$row['id'];
        $_SESSION['email']=$row['email'];
        $_SESSION['role']=$row['role'];
        $response['role']= $row["role"];
        $response['status'] = 1;
        $response['message'] = "Log in successfully!";
    }
    else{
        $response['status'] = 0;
        $response['message'] = "Unregistered user!";
    }
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($response);
?>

