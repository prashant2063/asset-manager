<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $To = $_POST['Reciepient'];

  $message = $_POST['Message'];

  $Opened = "No";
  $From = $_SESSION['username'];
  $Time = date('Y-m-d H:i:s');

//if user exists..
  if($user->UsernameExists($To))
  {
    if($To!=$From){

      $stmt = $db->prepare('INSERT INTO private_msg(UserFrom, UserTo, MessageBody, Date, Opened) VALUES (:UserFrom, :UserTo, :MessageBody, :Date, :Opened)') ;
      $stmt->execute(array(
       ':UserFrom' => $From,
       ':UserTo' => $To,
       ':MessageBody' => $message,
       ':Date' => $Time,
       ':Opened' => $Opened
      ));

        echo "success";
    }else {
      echo "sending failed. You cannot send messag to yourself";
    }

  }else {
    echo "User not found";
  }



  ?>
