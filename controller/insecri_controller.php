<?php 
require_once '../db/config.php' ;
require_once '../models/inscription.php' ;
include_once '../views/includes/session.php';
require_once '../models/user.php' ;




function view_iscri($inscri,$_user,$event){

    $id=$_GET['id'];
    $result=$inscri->GetReservation($id);
   

    
    
    while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
<tr>



    <?php 
    $user_id=$r['user_id'];
    $reslut1=$_user->getUserByUser_id($user_id);
    ?>
    <td><?php echo $reslut1['user_id']?></td>

    <td><?php echo $reslut1['firstname']?></td>

    <td><?php echo $reslut1['lastname']?></td>
    <td><?php echo $reslut1['dob']?></td>
    <td><?php echo $reslut1['email']?></td>


    <td><a onclick="return confirm('Are you sure you want to delete this record?');"
            href="../views/delAdminInscri.php?id=<?php echo $r['inscri_id']?>" class="btn btn-dark"
            style="width: 187px; margin-top: 10px;">Annuler
            Reservation</a></td>









</tr>
<?php
            }
   










 }    
    



function delete_Inscri($inscri)
{
    if(!$_GET['id']){
       
        echo 'error';
        header("location:view_event.php");
    
    }else{
    //get id values    
        $event_id=$_GET['id'];
        $user_id=$_SESSION['user_id'];

    // Call Crud Function
        $result=$inscri->DelInscription($user_id,$event_id);
        //Redirct TO index.php
    if($result){
        header("location:view_event.php");}
        else
        {
            echo 'error';
    }
    }
}
function delete_re($inscri)
{
    if(!$_GET['id']){
       
        echo 'error';
        header("location:view_event.php");
    
    }else{
    //get id values    
        $id=$_GET['id'];
    // Call Crud Function
        $result=$inscri->DeleteReservationbyid($id);
        //Redirct TO index.php
    if($result){
        header("location:deletUser.php?id=$id");
    }
        else
        {
            echo 'error';
    }
    }
}
function Admin_delete_Res($inscri)
{
    if(!$_GET['id']){
       
        echo 'error';
        // header("location:view_event.php");
    
    }else{
    //get id values    
        $reser_id=$_GET['id'];
$r=$inscri->getInscriByuser_id($reser_id);
$user_id=$r['user_id'];

    // Call Crud Function;
        $result=$inscri->DeleteReservation($reser_id,$user_id);
        //Redirct TO index.php
    if($result){
        header("location:view_reserv.php?id=$reser_id");
    }
        else
        {
            echo 'error';
    }
    }
}
function insert_inscri($inscri){
    if(!$_GET['id']){
       
        echo 'error';
        header("location:view_event.php");
    
    }else{
$user_id=$_SESSION['user_id'];

$id=$_GET['id'];
$result=$inscri->insert_inscription($user_id,$id);
if($result){
echo 'succ';
header("location:view_event.php");

}

    }

   









// </tr>
// <?php
//     }}




}
?>