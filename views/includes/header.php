<?php 
//This includes the session file. This file contains code that starts/resumes a session. 
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php';
require_once '../controller/user_controller.php' ;

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css" />
    <link href="style.css" rel="stylesheet">
    <title>Event - <?php echo $title ?></title>
</head>

<body>
    <div class="ahmed">
        <div class="nav1">
            <h1>Evenement</h1>
        </div>
        <div class="nav2">

            <?php
           
            if(isset( $_SESSION['user_id'])){
                $id=$_SESSION['user_id'];

                $reslut=$_user->getUserByUser_id($id);
              if($reslut['user_type']=='admin'||$reslut['user_type']=='user'){?>
            <a href="AddEvent.php">ajouter evenement</a>

            <a href="view_event.php">View evenement</a>






            <?php }}
              if(!isset($_SESSION['user_id'])){
          ?>
            <a href="register.php">Inscription</a>
            <a href="Login.php">Login <span class="sr-only">(current)</span></a>
            <?php } else {
  if(isset( $_SESSION['user_id'])){
                if($reslut['user_type']=='admin'){
                ?>
            <a href="view_user.php">View Users</a>
            <?php  }}?>
            <a href="../views/veiwUser.php?id=<?php echo $id?>"><span>Hello !
                    <?php echo $reslut['firstname'] ?></span> <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
            <?php } ?>
        </div>

    </div>

    <div class="container_ahmed">

        <br />