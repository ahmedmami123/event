<?php 
require_once '../db/config.php' ;
require_once '../models/user.php' ;

function insert_user($_user){
    
    if(isset($_POST['submit'])){
    
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $dob=$_POST['dob'];
        $user_type=$_POST['user_type'];
    $result=$_user->InsertUser($fname,$lname,$email,$password,$dob,$user_type);
       
    
        if($result){
            echo 'succ';
        
        
        }
        else{
           echo 'error';
        
        
        } 
    }
}
function affichaheUser($_user){
    
    $result=$_user->getUserByUser_id();
    
    if($result){
        echo 'succ';
    
    
    }
    else{
       echo 'error';
    
    
    } 
    while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
<tr>
    <td><?php echo $r['user_id']?></td>

    <td><?php echo $r['firstname']?></td>
    <td><?php echo $r['lastname']?></td>
    <td><?php echo $r['dob']?></td>
    <td><?php echo $r['email']?></td>







</tr><?php }}
function Login($_user){
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = strtolower(trim($_POST['email']));
$password = $_POST['password'];
$new_password = md5($password.$email);
$result = $_user->GettUser($email,$new_password);
if(!$result){
echo "<div class='alert alert-danger'>Username or Password are incorrect</div>";
}else{
$_SESSION['email'] = $email;
$_SESSION['user_id'] = $result['user_id'];
header("location: test.php");

}
}
}

?>