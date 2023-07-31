<?php
$title='View details';
require_once '../views/includes/header.php' ;
require_once '../controller/event_controller.php' ;
require_once '../controller/insecri_controller.php' ;
require_once '../controller/user_controller.php' ;




require_once '../db/config.php' ;

insert_inscri($inscri);

?>


<?php 
$user_id=$_SESSION['user_id'];
$result=$_user->getUserByUser_id($user_id);
if($result['user_type']=='admin'){
?>
<h1 class="text-center">View Records</h1>
<table class="table">
    <tr>
        <th>#</th>
        <th> First Name </th>
        <th>Last Name</th>
        <th>Date de naissance</th>
        <th>Email</th>
        <th>Action</th>


    </tr>

    <?php
view_iscri($inscri,$_user,$event);
}
else{
header('Location: ../views/view_event.php');
    
}
?>
</table>
<br>

<br>
<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php' ;
?>