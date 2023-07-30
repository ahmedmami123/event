<?php
$title='Success';

require_once 'includes/header.php';

require_once '../controller/event_controller.php' ;


insert_event($event)

?>

<div class="card" style="width: 18rem;">


    <div class="card-body">
        <h5 class="card-title"><?php echo $_POST['eventname'] ; ?></h5>

        <p class="card-text"> <?php echo 'Date de debut: '. $_POST['d_debut'].'Date de fin: '. $_POST['d_fin'];?></p>
        <p class="card-text"> <?php echo 'Description: '. $_POST['description'];?></p>



    </div>
</div>



<br>
<br>
<br>
<br>
<br>
<br>
<?php
?>
<?php
require_once 'includes/footer.php' ;
?>