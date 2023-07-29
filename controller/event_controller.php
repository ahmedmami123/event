<?php 
require_once '../db/config.php' ;
require_once '../models/event.php' ;

function insert_event($_event){
    
    if(isset($_POST['submit'])){
    
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $dob=$_POST['dob'];
        $user_type=$_POST['user_type'];
    $result=$_event->InsertUser($fname,$lname,$email,$password,$dob,$user_type);
       
    
        if($result){
            echo 'succ';
        
        
        }
        else{
           echo 'error';
        
        
        } 
    }
}

?>