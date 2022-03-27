<?php 
$uploadDir = 'uploads/'; 
$allowTypes = array('pdf','jpg', 'png', 'jpeg');
// $response = array( 
//     'status' => 0, 
//     'message' => 'Form submission failed, please try again.' 
// ); 
 
// If form is submitted 
$errMsg = ''; 
$valid = 1; 
if(isset($_POST['report_date']) || isset($_POST['evaluation_date']) || isset($_POST['files'])){ 
    // Get the submitted form data
    $id= $_POST['user_id'];
    $report_date = $_POST['report_date'];
    $evaluation_date = $_POST['evaluation_date']; 
    $filesArr = $_FILES["files"];
    

    //print_r("#".$filesArr."#");

    // Check whether submitted data is not empty 
    if($valid == 1){ 
        $uploadStatus = 1; 
        $fileNames = array_filter($filesArr['name']); 
        // Upload file 
        $uploadedFile = ''; 
        if(!empty($fileNames)){  
            foreach($filesArr['name'] as $key=>$val){  
                // File upload path  
                
                $fileName = basename($filesArr['name'][$key]);  
                $targetFilePath = $uploadDir . $fileName;  
                
                // Check whether file type is valid  
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                
                if(in_array($fileType, $allowTypes)){  
                    // Upload file to server  
                    move_uploaded_file($filesArr["tmp_name"][$key], $targetFilePath);
                        $uploadedFile .= $fileName.','; 
                    // }
                }
                // else{  
                //     $uploadStatus = 0; 
                //     $response['message'] = 'Sorry, only pdf files are allowed to upload.'; 
                // }  
            }  
        } 
         
        if($uploadStatus == 1){ 
            
            // Include the database config file 
            include_once('controller/config.php');
             
            // Insert form data in the database 
            $uploadedFileStr = "uploads/".trim($uploadedFile, ',');
            $tempArr=[];
            
            for($i=0; $i<count($fileNames); $i++){
                $fileName=substr($fileNames[$i], 0, strrpos($fileNames[$i], "."));
                
                if(strlen($fileName) > 6)
                {
                    $NameKey=$fileName[5].$fileName[6];
                    //$temp = trim(file_get_contents('data.json'), "\xEF\xBB\xBF");
                    $data=json_decode(file_get_contents('data.json'));
                    if(strpos(file_get_contents('data.json'), '"'.$NameKey.'"')){
                        $instrument=$data->$NameKey;
                        }
                         
                    else   
                        $instrument="undefined";
                        //undefined
                       
                }
                else
                    $instrument="undefined";
                $insert = $conn->query("INSERT INTO tbl_report (user_id,report_name,instrument,report_date,evaluation_date,uploads) VALUES ('".$id."','".$fileName."','".$instrument."','".$report_date."', '".$evaluation_date."','".$fileNames[$i]."')"); 
                
               // $temp = ['report_name'=>$fileName,'instrument'=>$instrument,
                 //   'report_date'=>$report_date,'evaluation_date'=>$evaluation_date];
                //array_push($tempArr,$temp);
            }

            if($insert){ 
                $select = $conn->query("SELECT * FROM tbl_report where user_id='$id'");
                $tempArr=[];
                while($row  = mysqli_fetch_array($select)){
                    array_push($tempArr,$row);
                }
                $response['status'] = 1; 
                $response['value'] = $tempArr;
                $response['message'] = 'Report was uploaded successfully!';
                
            } 
            $conn->close();
        } 
    }else{ 
         $response['message'] = 'Please fill all the mandatory fields!'.$errMsg; 
    } 
}
 
// Return response 
header('Content-Type: application/json');
echo json_encode($response);