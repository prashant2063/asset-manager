<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }


  $SerialNumber = $_POST['assetSerial'];
  $AssetNumber = $_POST['assetNumber'];
  $Status = $_POST['assetStatus'];
  $AssetCondition = $_POST['assetCondition'];
  $Custodian = $_POST['Custodian'];
  $Office = $_POST['Office'];
  $Department = $_POST['Department'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');
  $Year =  date('Y');

  $soft = "Software";
  //if not exist, create new record..
  if($AssetNumber =="N/A"){
    $ass = $SerialNumber;
  }else if($SerialNumber=="N/A"){
    $ass = $AssetNumber;
  }

  $stmt = $db->prepare('INSERT INTO new_inventory (AssetNumber, AssetSerial,AssetType, Status, AssetCondition, Custodian, Office, Department, Year, DateAdded, AddedBy) VALUES (:AssetNumber, :AssetSerial, :AssetType, :Status, :AssetCondition, :Custodian, :Office, :Department, :Year, :DateAdded, :AddedBy)') ;

  $stmt->execute(array(
   ':AssetSerial' => strtoupper($SerialNumber),
   ':AssetNumber' => $AssetNumber,
   ':AssetType' => $user->getAssetType($ass),
  //':AssetType' => $soft,
   ':Status' => $Status,
   ':AssetCondition' => $AssetCondition,
   ':Custodian' => $Custodian,
   ':Office' => $Office,
   ':Department' => $Department,
   ':Year' => $Year,
   ':AddedBy' => $AddedBy,
   ':DateAdded' => $DateAdded
  ));
echo "Inventory taken successfully";
 //  $CategoryID = $user->getAssetType($ass);
 //
 //  if($CategoryID =="Electronics"){
 //    $Total = $user->countTotalAssetByType($Year, "Electronics");
 //  //  echo $Total;
 //  }
 //
 //  $TotalUntraceable = $user->countTotal_Untraceable($Year, $Status);
 //  $TotalInStore = $user->countTotalInStore($Year, $Status);
 //
 // // $Total;
 //
 //  if(!$user->assetExistsInvantory($ass) == $ass){
 //
 //
 //
 //    $categoryNumber = 1;
 //    $Total = $Total+$categoryNumber;
 //    //total done
 //    //untraceable
 //    if($Status=="Untraceable"){
 //      $TotalUntraceable = $TotalUntraceable+1;
 //    }else {
 //      $TotalUntraceable = $TotalUntraceable+0;
 //    }
 //
 //    //in Store
 //    if($Status=="In storage"){
 //      $TotalInStore = $TotalInStore+1;
 //    }else {
 //      $TotalInStore = $TotalInStore+0;
 //    }
 //
 //    if(!$user->categoryExistsInvantorySummary($CategoryID) == $CategoryID){
 //
 //      $stmt2 = $db->prepare('INSERT INTO inventory_summary(AssetType, InventoryYear, Total, TotalUntraceable, TotalInStore) VALUES (:AssetType, :InventoryYear, :Total, :TotalUntraceable, :TotalInStore)') ;
 //
 //      $stmt2->execute(array(
 //      ':AssetType' => $CategoryID,
 //      ':InventoryYear' => $Year,
 //      ':Total' => '1',
 //      ':TotalUntraceable' => $TotalUntraceable,
 //      ':TotalInStore' => $TotalInStore
 //      ));
 //    }else {
 //      $stmt2 = $db->prepare('UPDATE inventory_summary SET Total=:Total,TotalUntraceable=:TotalUntraceable,TotalInStore=:TotalInStore WHERE AssetType=:AssetType AND InventoryYear=:InventoryYear') ;
 //
 //      $stmt2->execute(array(
 //      ':AssetType' => $CategoryID,
 //      ':InventoryYear' => $Year,
 //      ':Total' => $Total,
 //      ':TotalUntraceable' => $TotalUntraceable,
 //      ':TotalInStore' => $TotalInStore
 //      ));
 //    }
 //
 //  }else {
 //    if($CategoryID =="Electronics"){
 //      $Total = $user->countTotalAssetByType($Year, "Electronics");
 //
 //    }
 //    $categoryNumber = 1;
 //    //if asset is not in
 //    if(!$user->assetExistsInvantory($ass) == $ass){
 //      $Total = $user->countTotalAssetByType($Year, $CategoryID)+$categoryNumber;//get total from db
 //    }
 //    echo $Total;
 //    //total done
 //    //untraceable
 //    if($Status=="Untraceable"){
 //      $TotalUntraceable = $TotalUntraceable+1;
 //    }else {
 //      $TotalUntraceable = $TotalUntraceable+0;
 //    }
 //
 //    //in Store
 //    if($Status=="In storage"){
 //      $TotalInStore = $TotalInStore+1;
 //    }else {
 //      $TotalInStore = $TotalInStore+0;
 //    }
 //
 //    if(!$user->categoryExistsInvantorySummary($CategoryID) == $CategoryID){
 //      $stmt2 = $db->prepare('INSERT INTO inventory_summary(AssetType, InventoryYear, Total, TotalUntraceable, TotalInStore) VALUES (:AssetType, :InventoryYear, :Total, :TotalUntraceable, :TotalInStore)') ;
 //
 //      $stmt2->execute(array(
 //      ':AssetType' => $CategoryID,
 //      ':InventoryYear' => $Year,
 //      ':Total' => '1',
 //      ':TotalUntraceable' => $TotalUntraceable,
 //      ':TotalInStore' => $TotalInStore
 //      ));
 //    }else {
 //      $stmt2 = $db->prepare('UPDATE inventory_summary SET Total=:Total,TotalUntraceable=:TotalUntraceable,TotalInStore=:TotalInStore WHERE AssetType=:AssetType AND InventoryYear=:InventoryYear') ;
 //
 //      $stmt2->execute(array(
 //      ':AssetType' => $CategoryID,
 //      ':InventoryYear' => $Year,
 //      ':Total' => $Total,
 //      ':TotalUntraceable' => $TotalUntraceable,
 //      ':TotalInStore' => $TotalInStore
 //      ));
 //    }
 //  }
 //

  //else update

//  echo "Thank you! Your information was successfully updated!";
  ?>
