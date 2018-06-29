<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetID = $_REQUEST['SerialNumber'];

  $Id = base64_decode($_REQUEST['Id']);

  $ActivationCode = strtoupper($_REQUEST['ActivationCode']);

  $LicenceSlots =  $_REQUEST['AvailableSlots'];

  $LicenceName =  $user->getLicenceName($_REQUEST['LicenceName']);

  $SlotsUsed = $LicenceSlots - 1;

  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');



echo $Id;
    $stmt = $db->prepare('UPDATE new_licence SET SlotsUsed=:SlotsUsed WHERE SerialNumber = :SerialNumber') ;
    $stmt->execute(array(
     ':SlotsUsed' => $SlotsUsed,
     ':SerialNumber' => $ActivationCode
    ));

    $stmt2 = $db->prepare('UPDATE assetlicences SET AssetID=:AssetID,LicenceName=:LicenceName,LicenceID=:LicenceID,DateInstalled=:DateInstalled,AddedBy=:AddedBy,DateAdded=:DateAdded WHERE Id=:Id') ;

    $stmt2->execute(array(
     ':Id' => $Id,
     ':AssetID' => $AssetID,
     ':LicenceName' => $LicenceName,
     ':LicenceID' => $ActivationCode,
     ':DateInstalled' => $DateAdded,
     ':AddedBy' => $AddedBy,
     ':DateAdded' => $DateAdded
    ));
      echo "Thank you! Your information was successfully saved!";

  ?>
