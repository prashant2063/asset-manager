<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $Type = $_POST['assetType'];
  $Manufacturer = $_POST['assetManufacturer'];

  $Brand = $_POST['assetBrand'];
  $Model = $_POST['assetModel'];



  $SerialNumber = strtoupper($_POST['assetSerial']);
  $AssetNumber = strtoupper($_POST['assetNumber']);

  $AssetName = $_POST['assetName'];
  $Status = $_POST['assetStatus'];

  $AssetCondition = $_POST['assetCondition'];
  $date = $_POST['warrantyExpiry'];
  //format date to Y-m-d
  $WarrantyExpiry = date("Y-m-d", strtotime($date));
  //$WarrantyExpiry = date('Y-m-d', strtotime($date));

  $Vendor = $_POST['assetVendor'];
  $PurchasePrice = $_POST['assetPurchasePrice'];

  $ExpectedAssetLife = $_POST['ExpectedAssetLife'];
  $ScrapValue = $_POST['assetScrapValue'];

  $Purchase_Date = $_POST['purchaseDate'];
  $PurchaseDate = date("Y-m-d", strtotime($Purchase_Date));

  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');

  //convert date to good format
  if(($SerialNumber == "N/A") && ($AssetNumber == "N/A")){

      echo "Saving Failed!  You must provide either a serial number or an asset number";
      return;
  }else {
    if(($user->SerialNumberExists($SerialNumber) != "N/A")){
      if($user->SerialNumberExists($SerialNumber) != $SerialNumber){
        if(($user->AssetNumberExists($AssetNumber)=="N/A")) {
          $stmt = $db->prepare('INSERT INTO new_item (Type, Manufacturer, Brand, Model, SerialNumber, AssetNumber, AssetName, Status, AssetCondition, WarrantyExpiry, Vendor, PurchasePrice, ExpectedAssetLife, ScrapValue, PurchaseDate, AddedBy, DateAdded) VALUES ( :Type, :Manufacturer, :Brand, :Model, :SerialNumber, :AssetNumber, :AssetName, :Status, :AssetCondition, :WarrantyExpiry, :Vendor, :PurchasePrice, :ExpectedAssetLife, :ScrapValue, :PurchaseDate, :AddedBy, :DateAdded) ') ;

          $stmt->execute(array(
           ':Type' => $Type,
           ':Manufacturer' => $Manufacturer,
           ':Brand' => $Brand,
           ':Model' => $Model,
           ':SerialNumber' => $SerialNumber,
           ':AssetNumber' => $AssetNumber,
           ':AssetName' => $AssetName,
           ':Status' => $Status,
           ':AssetCondition' => $AssetCondition,
           ':WarrantyExpiry' => $WarrantyExpiry,
           ':Vendor' => $Vendor,
           ':PurchasePrice' => $PurchasePrice,
           ':ExpectedAssetLife' => $ExpectedAssetLife,
           ':ScrapValue' => $ScrapValue,
           ':PurchaseDate' => $PurchaseDate,
           ':AddedBy' => $AddedBy,
           ':DateAdded' => $DateAdded
          ));

          echo "Thank you! Your information was successfully saved!";
        }else {

            $stmt = $db->prepare('INSERT INTO new_item (Type, Manufacturer, Brand, Model, SerialNumber, AssetNumber, AssetName, Status, AssetCondition, WarrantyExpiry, Vendor, PurchasePrice, ExpectedAssetLife, ScrapValue, PurchaseDate, AddedBy, DateAdded) VALUES ( :Type, :Manufacturer, :Brand, :Model, :SerialNumber, :AssetNumber, :AssetName, :Status, :AssetCondition, :WarrantyExpiry, :Vendor, :PurchasePrice, :ExpectedAssetLife, :ScrapValue, :PurchaseDate, :AddedBy, :DateAdded) ') ;

            $stmt->execute(array(
             ':Type' => $Type,
             ':Manufacturer' => $Manufacturer,
             ':Brand' => $Brand,
             ':Model' => $Model,
             ':SerialNumber' => $SerialNumber,
             ':AssetNumber' => $AssetNumber,
             ':AssetName' => $AssetName,
             ':Status' => $Status,
             ':AssetCondition' => $AssetCondition,
             ':WarrantyExpiry' => $WarrantyExpiry,
             ':Vendor' => $Vendor,
             ':PurchasePrice' => $PurchasePrice,
             ':ExpectedAssetLife' => $ExpectedAssetLife,
             ':ScrapValue' => $ScrapValue,
             ':PurchaseDate' => $PurchaseDate,
             ':AddedBy' => $AddedBy,
             ':DateAdded' => $DateAdded
            ));
            echo "Thank you! Your information was successfully saved!";;
        }
      }else {
        echo "Saving Failed!  An item with a similar serial number already exists in the sysem";
      }
    }
//     }else{
// //echo $user->AssetNumberExists($AssetNumber);
//     if(!($user->AssetNumberExists($AssetNumber)=="N/A")) {
//       if(!($user->AssetNumberExists($AssetNumber) == $AssetNumber)){
//         if(($user->SerialNumberExists($SerialNumber) == "N/A")){
//           if(($user->SerialNumberExists($SerialNumber) == $SerialNumber)){
//             $stmt = $db->prepare('INSERT INTO new_item (Type, Manufacturer, Brand, Model, SerialNumber, AssetNumber, AssetName, Status, AssetCondition, WarrantyExpiry, Vendor, PurchasePrice, ExpectedAssetLife, ScrapValue, PurchaseDate, AddedBy, DateAdded) VALUES ( :Type, :Manufacturer, :Brand, :Model, :SerialNumber, :AssetNumber, :AssetName, :Status, :AssetCondition, :WarrantyExpiry, :Vendor, :PurchasePrice, :ExpectedAssetLife, :ScrapValue, :PurchaseDate, :AddedBy, :DateAdded) ') ;
//
//             $stmt->execute(array(
//              ':Type' => $Type,
//              ':Manufacturer' => $Manufacturer,
//              ':Brand' => $Brand,
//              ':Model' => $Model,
//              ':SerialNumber' => strtoupper($SerialNumber),
//              ':AssetNumber' => $AssetNumber,
//              ':AssetName' => $AssetName,
//              ':Status' => $Status,
//              ':AssetCondition' => $AssetCondition,
//              ':WarrantyExpiry' => $WarrantyExpiry,
//              ':Vendor' => $Vendor,
//              ':PurchasePrice' => $PurchasePrice,
//              ':ExpectedAssetLife' => $ExpectedAssetLife,
//              ':ScrapValue' => $ScrapValue,
//              ':PurchaseDate' => $PurchaseDate,
//              ':AddedBy' => $AddedBy,
//              ':DateAdded' => $DateAdded
//             ));
//             if($SerialNumber!="N/A"){
//               $AssetID = $SerialNumber;
//             }
//             if($AssetNumber!="N/A"){
//               $AssetID = $AssetNumber;
//             }
//
//             echo "string";
//           }else {
//             echo "Saving Failed!  An item with a similar serial number already exists in the sysem - me";
//           }
//         }
//       }else {
//         echo "Saving Failed!  An item with a similar Asset number already exists in the sysem";
//       }
//     }
//   }
}





  //
  //INSERT INTO AssetLicences( AssetID, LicenceID, DateInstalled, AddedBy, DateAdded) VALUES ( :AssetID, :LicenceID, :DateInstalled, :AddedBy, :DateAdded)
  ?>
