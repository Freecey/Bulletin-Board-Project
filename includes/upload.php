<?php
session_start();
include('connect.php');

$CUR_USRID = $_SESSION['user_id'];

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = md5($_SESSION['user_email']) . '.' . $fileExtension;
    $newFileNamewebp = md5($_SESSION['user_email']) . '.webp';

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg', 'webp', 'svg');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = '../uploaded/users/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        //$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
        $imglocalURL = 'https://'. $_SERVER['HTTP_HOST'] .'/uploaded/users/'.$newFileName;
        $imglocalURLwebp = 'https://'. $_SERVER['HTTP_HOST'] .'/uploaded/users/'.$newFileNamewebp;
        
        if($fileExtension == 'webp') {}else{
        $fname = $newFileName;
        $file = 'https://'. $_SERVER['HTTP_HOST'] .'/uploaded/users/'.$newFileName;
        $image = imagecreatefromstring(file_get_contents($file));
        ob_start();
        imagejpeg($image,NULL,100);
        $cont = ob_get_contents();
        ob_end_clean();
        imagedestroy($image);
        $content = imagecreatefromstring($cont);
        $output = '../uploaded/users/'.$newFileNamewebp;
        imagewebp($content,$output);
        imagedestroy($content);
        unlink('../uploaded/users/'.$newFileName);
      }

        // $blob = file_get_contents($imglocalURLwebp);

        $UPDATEQuerySQL3 = "UPDATE `users` 
        SET `user_imglocal` = '$imglocalURLwebp',
            `user_image` = '$imglocalURLwebp'
                WHERE `users`.`user_id` = $CUR_USRID";
        // echo $UPDATEQuerySQL1;
        $Prof_UpdateINSERT= $conn->prepare($UPDATEQuerySQL3);
        $Prof_UpdateINSERT->execute();



        $mime = 'image/webp';
        $blob = file_get_contents($imglocalURLwebp);
        
        $sql = "UPDATE users SET user_imgdata = :user_imgdata
                        WHERE user_id = $CUR_USRID";
        $stmt = $conn->prepare($sql);

        // $stmt->bindParam(':userimg_userid', $CUR_USRID);
        // $stmt->bindParam(':userimg_filename', $newFileNamewebp);
        // $stmt->bindParam(':userimg_mime', $mime);
        $stmt->bindParam(':user_imgdata', $blob, PDO::PARAM_LOB);
        
        $stmt->execute();


	      // $mime = 'image/webp';
        // $blob = file_get_contents($imglocalURLwebp);
        
        // $sql = "INSERT INTO userimg(userimg_userid,userimg_filename,userimg_mime,userimg_image) 
        //                 VALUES(:userimg_userid,:userimg_filename,:userimg_mime,:userimg_image)";
        // $stmt = $conn->prepare($sql);

        // $stmt->bindParam(':userimg_userid', $CUR_USRID);
        // $stmt->bindParam(':userimg_filename', $newFileNamewebp);
        // $stmt->bindParam(':userimg_mime', $mime);
        // $stmt->bindParam(':userimg_image', $blob, PDO::PARAM_LOB);
        
        // $stmt->execute();



        $_SESSION['ProfileUPDATEComplet'] = true;
        $message ='File is successfully uploaded.';
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
$_SESSION['uploadProfOK'] = 'ULPictOK' ;
header("Location: ../profile.php");
//header("Refresh:0");


//user_imglocal


//$blob = file_get_contents('####URL####');




?>