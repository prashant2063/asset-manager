<?php
  require('../func/config.php');


   $Name = $_REQUEST['Name'];
   $Email = $_REQUEST['Email'];
   $Username = $_REQUEST['Username'];
   $PhoneNumber = $_REQUEST['PhoneNumber'];
   $Password = $_REQUEST['Password'];
   $hashedpassword = $user->password_hash($Password, PASSWORD_BCRYPT);
   $Office = $_REQUEST['Office'];
   $Department = $_REQUEST['Department'];
   $OfficeTelephone = $_REQUEST['OfficeTelephone'];
   $uID = $_REQUEST['uID'];

   ////
  //  $imgFile = $_FILES['file']['name'];
  // 	$tmp_dir = $_FILES['file']['tmp_name'];
	// 	$imgSize = $_FILES['file']['size'];
   //
  //   if(empty($imgFile)){
  //   			$errMSG = "Please Select Image File.";
  //   		}
  //   		else
  //   		{
  //   			$upload_dir = 'user_images/'; // upload directory
   //
  //   			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
   //
  //   			// valid image extensions
  //   			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
   //
  //   			// rename uploading image
  //   			$userpic = rand(1000,1000000).".".$imgExt;
   //
  //   			// allow valid image file formats
  //   			if(in_array($imgExt, $valid_extensions)){
  //   				// Check file size '5MB'
  //   				if($imgSize < 5000000)				{
  //   					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
  //   				}
  //   				else{
  //   					$errMSG = "Sorry, your file is too large.";
  //   				}
  //   			}
  //   			else{
  //   				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //   			}
  //   		}

   //validate username  allow if username chosen is current username

  $stmt = $db->prepare('UPDATE profilemaster SET Name=:Name,Email=:Email,Username=:Username,PhoneNumber=:PhoneNumber,Password=:Password,Office=:Office,Department=:Department,OfficeTelephone=:OfficeTelephone WHERE Id=:uID ');
  // $stmt = $db->prepare('UPDATE profilemaster SET Status=:Status, Photo=:photo WHERE Id=:uID AND tokenCode=:code');
  // $stmt->bindParam(':Photo',$userpic);
  $stmt->bindParam(':Name',$Name);
  $stmt->bindParam(':Email',$Email);
  $stmt->bindParam(':Username',$Username);
  $stmt->bindParam(':PhoneNumber',$PhoneNumber);
  $stmt->bindParam(':Password',$hashedpassword);
  $stmt->bindParam(':Office',$Office);
  $stmt->bindParam(':Department',$Department);
  $stmt->bindParam(':OfficeTelephone',$OfficeTelephone);
  $stmt->bindParam(':uID',$uID);


  if($stmt->execute())
  {
     echo "Thank you! Your information was successfully updated!";
     //start session
     $user->login($Email,$Password);
     //session variables
     $_SESSION["username"] = $Username;
     $_SESSION['usersfullname'] = $Name;
    // $_SESSION["profilephoto"] = $_SESSION["temp_photo"];
  }else{
    echo "Failed to save";
  }
 ?>
