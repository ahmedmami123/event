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
if($result){



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