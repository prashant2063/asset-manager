<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetNumber = $_POST['AssetNumber'];
  $SerialNumber = $_POST['SerialNumber'];

  if($AssetNumber =="N/A"){
    $ass = $SerialNumber;
  }else if($SerialNumber=="N/A"){
    $ass = $AssetNumber;
  }

  $AssPeriod = $_POST['AssignmentPeriod'];

  if($AssPeriod=="1"){
    $AssignmentPeriod = 1;
  }else if($AssPeriod=="2"){
    $AssignmentPeriod = 2;
  }

  $AssignedUser =  $_POST['AssignedUser'];

  $NumberOfDays =  $_POST['NumberOfDays'];

//  $SlotsUsed = $LicenceSlots - 1;

  $AssignedBy = $_SESSION['usersfullname'];
  $DateAssigned = date('Y-m-d');

  //check if assigneditems
  if(!($user->checkIfAssigned($ass)==$ass)){

    $stmt = $db->prepare('INSERT INTO assigneditems( SerialNumber, AssignedUser, OfficeName, DepartmentName, AssignmentPeriod, NumberOfDays, DateAssigned, AssignedBy, Returned) VALUES ( :SerialNumber, :AssignedUser,:OfficeName, :DepartmentName, :AssignmentPeriod, :NumberOfDays, :DateAssigned, :AssignedBy, :Returned)') ;
    $stmt->execute(array(
     ':SerialNumber' => $ass,
     ':AssignedUser' => $AssignedUser,
     ':OfficeName' => $user->getUserOffice($AssignedUser),
     ':DepartmentName' => $user->getUserDepartment($AssignedUser),
     ':AssignmentPeriod' => $AssignmentPeriod,
     ':NumberOfDays' => $NumberOfDays,
     ':DateAssigned' => $DateAssigned,
     ':AssignedBy' => $AssignedBy,
     ':Returned' => "NO"
    ));

    $To = $user->getUserUsername($AssignedUser);
    $message = "Congratulations you have been assigned a new Asset $ass for $NumberOfDays days.";
    $user->sendMessage($To, $message);

    echo "Thank you! Your information was successfully saved!";
  }else {
    echo "The item is not available for assigning";
  }

  ?>
