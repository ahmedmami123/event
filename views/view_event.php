<?php
$title='Success';
require_once 'includes/header.php';


require_once '../controller/event_controller.php' ;




?>
<h1 class="text-center">View Records</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th> Titre d'evenement </th>
        <th>Description</th>
        <th>Date de debut</th>
        <th>Date de fin</th>
        <th>Actions</th>

    </tr>

    <?php 
view_evenment($event);

?>




</table>



<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php' ;
?>