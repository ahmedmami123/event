<?php 
require_once '../db/config.php' ;
require_once '../models/inscription.php' ;
include_once '../views/includes/session.php';
require_once '../models/user.php' ;

function view_iscri($inscri,$_user,$event){

    $id=$_GET['id'];
    
    $result=$inscri->getInscriByEevnt_id($id);
    
    if($result){
        echo 'succ';
    
    
    }
    else{
       echo 'error';
    
    
    } 
    while($r = $result->fetch(PDO::FETCH_ASSOC)){
        $id=$r['user_id'];
      
        ?>
<tr>

    <?php 
        $result1=$_user->getUserByUser_id($id);
       
        $result2=$event->getEventDetails($id);
        ?>
<tr>
    <th><?php echo $result1['user_id']?></th>
    <th><?php echo $result1['firstname']?> </th>
    <th><?php echo $result1['lastname']?> </th>
    <th><?php echo $result1['dob']?> </th>
    <th><?php echo $result1['email']?> </th>
    <th>
        <?php 
        $id1=$_GET['id'];
        $result2=$event->getEventDetails($id1);
        ?>
        <a onclick="return confirm('Are you sure you want to delete this record?');"
            href="../views/delInscri.php?id=<?php echo $result2['event_id']?>" class="btn btn-dark"> Annuler
            Reservation</a>
    </th>





</tr>






<?php }    
    
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