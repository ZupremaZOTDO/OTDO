<!DOCTYPE html>

<?php

    session_start();


    //call our google database


    $str = file_get_contents('https://spreadsheets.google.com/feeds/list/10Fh3acl21rZ7syNgUO1uFk4xNO2XoAJKEwBI2LuFPdY/1/public/basic?alt=json');

    $json = (json_decode($str, true));

    //echo $json['feed']['entry'][0]['content']['$t'];

    $output_1 = "<p>";
    foreach($json['feed']['entry'] as $userInfo){
        $output_1 .= "<p>".$userInfo['content']['$t']."</p>";
    }
    $output_1 .= "</p>";


    //set our user variables


    //$username = "user";
    //$password = "password";


        //username 

    $a = $output_1;

    if (strpos($a, $_POST['lastname']) !== false) {
        $lastname_boloon = true;
    } else {
        $lastname_boloon = false;
    }

    //$username = var_export($lastname_boloon,false);

    //echo $username;


        //password

    //$password_boloon = false;

    $a = $output_1;

    if (strpos($a, $_POST['password']) !== false) {
        $password_boloon = true;
    } else {
        $password_boloon = false;
    }

    //$password = var_export($password_boloon,false);

    //echo $password;


    //check user login 


    //echo $password;

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      header('Location: success.php');     
    }

    if (isset($_POST['lastname']) && isset($_POST['password'])) {
        if (true == $lastname_boloon && true == $password_boloon) {
            
            $_SESSION['loggedin'] = true;
            header('Location: success.php');
            
        } 
    }

?>


<html>
    
  <head>
    <title>Secert Door</title>   
  </head>
  
  <body>
      <form method="POST" action="indexTest.php">
        Last name: <br/>
        <input type="text" name="lastname"><br/>
        Password: <br/>
        <input type="password" name="password"><br/>
        <input type="submit" value="Login">
      </form>
  </body>
 
</html>
