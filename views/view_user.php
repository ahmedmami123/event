<?php
$title='Success';
require_once 'includes/header.php';


require_once '../controller/event_controller.php' ;
require_once '../controller/user_controller.php' ;





?>
<div class="viewstext">Views Users</div>

<table class="table">
    <tr>
        <th>#</th>
        <th> Firs name </th>

        <th>Last name</th>
        <th>Date de naissance</th>
        <th>Email</th>
        <th>Action</th>


    </tr>

    <?php 
affichaheUser($_user);

?>




</table>


<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php' ;
?>