<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  // if(!$user->is_logged_in()){ header('Location: login'); }
  //
  // if ($_REQUEST['delete']) {
  //
	// 	$pid = $_REQUEST['delete'];
	// 	$query = "DELETE FROM new_item WHERE Id=:pid";
	// 	$stmt = $db->prepare( $query );
	// 	$stmt->execute(array(':pid'=>$pid));
  //
	// 	if ($stmt) {
	// 		echo "Asset Deleted Successfully ...";
	// 	}
  //
	// }

  ?>
  <?php

   $id_array = $_REQUEST['data']; // return array
      $id_count = count($_REQUEST['data']); // count array

      for($i=0; $i < $id_count; $i++)
      {
         $id = $id_array[$i];
        // $query = mysql_query("DELETE FROM `test` WHERE `id` = '$id'");
         $query = "DELETE FROM new_item WHERE Id=:pid";
       	 	$stmt = $db->prepare( $query );
       	 	$stmt->execute(array(':pid'=>$id));
          if ($stmt) {
        			echo "Asset Deleted Successfully ...";
        		}
     }

     ?>
