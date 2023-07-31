<?php
$title='Success';
require_once 'includes/header.php';


require_once '../controller/event_controller.php' ;
require_once '../controller/user_controller.php' ;





?>
<div class="viewstext">Views evenement</div>

<table class="table">
    <tr>
        <th>#</th>
        <th> Titre d'evenement </th>

        <th>Date de debut</th>
        <th>Date de fin</th>
        <th>Actions</th>

    </tr>

    <?php 
view_evenment($event,$_user);

?>




</table>


<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php' ;
?>