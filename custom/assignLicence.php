<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetID = $_POST['SerialNumber'];

  $ActivationCode = strtoupper($_POST['ActivationCode']);

  $LicenceSlots =  $_POST['AvailableSlots'];

  $LicenceName =  $user->getLicenceName($_POST['LicenceName']);

  $SlotsUsed = $LicenceSlots - 1;

  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');




    $stmt = $db->prepare('UPDATE new_licence SET SlotsUsed=:SlotsUsed WHERE SerialNumber = :SerialNumber') ;
    $stmt->execute(array(
     ':SlotsUsed' => $SlotsUsed,
     ':SerialNumber' => $ActivationCode
    ));

    $stmt2 = $db->prepare('INSERT INTO assetlicences (AssetID, LicenceName, LicenceID, DateInstalled, AddedBy, DateAdded) VALUES (:AssetID, :LicenceName, :LicenceID, :DateInstalled, :AddedBy, :DateAdded)') ;

    $stmt2->execute(array(
     ':AssetID' => $AssetID,
     ':LicenceName' => $LicenceName,
     ':LicenceID' => $ActivationCode,
     ':DateInstalled' => $DateAdded,
     ':AddedBy' => $AddedBy,
     ':DateAdded' => $DateAdded
    ));
      echo "Thank you! Your information was successfully saved!";

  ?>
