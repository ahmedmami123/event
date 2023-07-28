<?php
$title='Success';


require_once '../controller/user_controller.php' ;


insert_user($_user);

?>

<div class="card" style="width: 18rem;">


    <div class="card-body">
        <h5 class="card-title"><?php echo $_POST['firstname'] .' '. $_POST['lastname']; ?></h5>

        <p class="card-text"> <?php echo 'Date of birth: '. $_POST['dob'];?></p>
        <p class="card-text"> <?php echo 'Email: '. $_POST['email'];?></p>



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