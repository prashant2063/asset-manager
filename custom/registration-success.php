<?php
  require('../func/config.php');
   $stmt = $db->prepare("SELECT Photo FROM profilemaster WHERE Id=:uID LIMIT 1");
   $stmt->execute(array(":uID"=>"1"));
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
     $_SESSION["temp_photo"] = $row['Photo'];
   }

   $code = $_POST['code'];
   $Name = $_POST['Name'];
   $Email = $_POST['Email'];
   $Username = $_POST['Username'];
   $PhoneNumber = $_POST['PhoneNumber'];
   $Password = $_POST['Password'];
   $hashedpassword = $user->password_hash($Password, PASSWORD_BCRYPT);
   $Office = $_POST['Office'];
   $Department = $_POST['Department'];
   $OfficeTelephone = $_POST['OfficeTelephone'];
   $Role = "2";
   $uID = base64_decode($_POST['uID']);
   $code = $_POST['code'];
   //validate username
  if(!$user->UsernameExists($Username)){

   $stmt = $db->prepare("SELECT Id, Status FROM profilemaster WHERE Id=:uID AND tokenCode=:code LIMIT 1");
   $stmt->execute(array(":uID"=>$uID,":code"=>$code));
   $row=$stmt->fetch(PDO::FETCH_ASSOC);
   if($stmt->rowCount() > 0)
   {
      $statusY = "Y";
      $stmt = $db->prepare('UPDATE profilemaster SET Name=:Name,Email=:Email,Username=:Username,PhoneNumber=:PhoneNumber,Password=:Password,Photo=:Photo,Office=:Office,Department=:Department,OfficeTelephone=:OfficeTelephone,Role=:Role,Status=:Status WHERE Id=:uID ');
      // $stmt = $db->prepare('UPDATE profilemaster SET Status=:Status, Photo=:photo WHERE Id=:uID AND tokenCode=:code');
      $stmt->bindParam(':Name',$Name);
      $stmt->bindParam(':Email',$Email);
      $stmt->bindParam(':Username',$Username);
      $stmt->bindParam(':PhoneNumber',$PhoneNumber);
      $stmt->bindParam(':Password',$hashedpassword);
      $stmt->bindParam(':Office',$Office);
      $stmt->bindParam(':Department',$Department);
      $stmt->bindParam(':OfficeTelephone',$OfficeTelephone);
      $stmt->bindParam(':Role',$Role);
      $stmt->bindParam(':Photo', $_SESSION["temp_photo"]);
      $stmt->bindParam(':uID', $uID);
      $stmt->bindParam(':Status', $statusY);

      if($stmt->execute())
      {
         echo "success";
         //start session
         $user->login($Email,$Password);
         //session variables
         $_SESSION["username"] = $Username;
         $_SESSION['usersfullname'] = $Name;
         $_SESSION["profilephoto"] = $_SESSION["temp_photo"];
      }else{
        echo "Failed to save";
      }
   }else {
     echo "Account Not Found";
   }
 }else {
   echo "The username you chose has already been taken. Choose another one ";
 }
 ?>
