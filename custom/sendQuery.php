<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }


  $message = $_POST['Message'];
//  $To = $user->getAdmin();
  $Opened = "No";
  $From = $_SESSION['username'];
  $Time = date('Y-m-d H:i:s');

//if user exists..
    if($_SESSION['Role']!="1"){

      $stmt2 = $db->prepare("SELECT Username FROM profilemaster WHERE Role = 1");
      $stmt2->execute();
      while($row = $stmt2->fetch())
      {
        extract($row);

        $stmt = $db->prepare('INSERT INTO private_msg (UserFrom, UserTo,MessageBody, Date, Opened) VALUES (:UserFrom,:UserTo,:Body, :Date, :Opened)') ;
        $stmt->execute(array(
         ':UserFrom' => $From,
         ':UserTo' => $row['Username'],
         ':Body' => $message,
         ':Date' => $Time,
         ':Opened' => $Opened
        ));
      }



        echo "Success! Your query has been successfully sent to the admin ";
    }else {
      echo "sending failed. You cannot send messag to yourself";
    }



  ?>
