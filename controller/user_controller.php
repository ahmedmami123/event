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
        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = '../UploadsUserPath/';
        if($orig_file!=null){
            $UploadsUserPath = "$target_dir$email.$ext";

        }else{
            $UploadsUserPath =null;
          

        }

        move_uploaded_file($orig_file,$UploadsUserPath);
    $result=$_user->InsertUser($fname,$lname,$email,$password,$dob,$user_type,$UploadsUserPath);
       
    
        if($result){
            header("location:Login.php");
        
        
        }
        else{
           echo 'error';
        
        
        } 
    }
}
function view_User($_user){
    $result=$_user->GetTousUser();
    
    
    while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
<tr>
    <td><?php echo $r['event_id']?></td>

    <td><?php echo $r['eventname']?></td>

    <td><?php echo $r['date_debut']?></td>
    <td><?php echo $r['date_fin']?></td>

    <td>
        <a href="../views/veiw.php?id=<?php echo $r['event_id']?>" class="btn btn-primary">View</a>
        <?php $user_id=$_SESSION['user_id'];
    
    
    $rt2=$_user->getUserByUser_id($user_id);
    if($rt2['user_type']=='admin'){?>
        <a href="../views/Edit.php?id=<?php echo $r['event_id']?>" class="btn btn-warning">Edit</a>
        <?php }?>
    </td>





</tr>
<?php
        }}
        function upadtUser($_user){
            if(isset($_POST['submit'])){
                $id=$_POST['id'];
    
                $fname=$_POST['firstname'];
                $lname=$_POST['lastname'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $dob=$_POST['dob'];
                $user_type=$_POST['user_type'];
               
            $result=$_user->EditUser($id,$fname,$lname,$email,$password,$dob,$user_type);
                if($result){
            header("location:veiwUser.php?id=$id.php");
        }
            else
            {
            echo 'error';}}
            else{
            echo 'error';
            }
            
            }



            
            function delete_User($_user,$inscri)
{
if(!$_GET['id']){

echo 'error';
header("location:veiw_user.php");

}else{
//get id values
$id=$_GET['id'];
// Call Crud Function

//Redirct TO index.php


$result=$_user->DeleteUser($id);

if($result){

header("location:view_user.php");}
else
{
echo 'error';
}
}
}
function affichaheUser($_user){
    
    $result=$_user->GetTousUser();
    
    
    
    while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
<tr>



    <?php 
        
            
            ?>
    <td><?php echo $r['user_id']?></td>

    <td><?php echo $r['firstname']?></td>

    <td><?php echo $r['lastname']?></td>
    <td><?php echo $r['dob']?></td>
    <td><?php echo $r['email']?></td>


    <td>





        <a href="../views/delreservbyuser.php?id=<?php echo $r['user_id']?>"
            onclick="return confirm('Are you sure you want to delete this record?');" href="#"
            class="btn btn-danger">Delete</a>

    </td>








</tr>
<?php
                    }
           
        
        
        
        
        
        
        
        
        
        
         }    
            
         function UserDet($event,$inscri,$_user){
            if(!isset($_GET['id'])){
                echo "<h1 class='text-danger'>Please check details and tray again</h1>";
            
            }
            else{
            $id=$_GET['id'];
            $result=$_user->getUserDetails($id);
            $user_id=$_SESSION['user_id'];
            
            ?>

<div class="viewstext">View User details </div>

<div class="viewD" style="margin-top:-100px;">
    <div class="d1">
        <img src=<?php echo empty($result['user_Path']) ? "Uploads\av.jpg" :$result['user_Path']; ?>
            style="width:80%;" />
    </div>
    <div class="d2">

        <div class="h1"><?php echo $result['firstname'].' '.$result['lastname']?></div>
        <div class="h3"> <?php echo 'Date de naissance : '. $result['dob']?>
            <div class="h3"> <?php echo 'Date de naissance : '. $result['email']?>



            </div>


            <br>
            <div class="btns">

                <?php 
      
        
        
        
 ?>
                <a href="../views/EditUser.php?id=<?php echo $id?>" class="btn btn-warning"
                    style="width: 187px; margin-top: 10px;">Edit</a>

                <?php 
        
      
        }?>
            </div>
        </div>


    </div>
</div>

<?php }
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
$id=$_SESSION['user_id'];
header("location: veiwUser.php?id=$id");

}
}
}

?>