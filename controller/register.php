<?php include_once('config.php');?>
<?php
     $user_name = $_POST['register_name'];
     $user_email = $_POST['register_email'];
     $user_pass = base64_encode($_POST['register_pass']);
    $sql1 = "SELECT email FROM tbl_user WHERE email='$user_email'";
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
        $response['result'] = "User already exist!";
        $response['status'] = 0;
    }
    else{
        $sql2 = "INSERT INTO tbl_user (name, email, pass) VALUES ('$user_name', '$user_email', '$user_pass')";
            if ($conn->query($sql2) === TRUE) {
                $response['result'] = "registered successfully!";
                $response['status'] = 1;
            } else {
                $response['result'] = "register failed!";
                $response['status'] = 0;
            }
    }
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($response);
?>

